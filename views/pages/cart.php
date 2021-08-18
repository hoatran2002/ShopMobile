<?php
if(isset($_REQUEST['get'])) {
	if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
		$detail = loadModel('detail');
		?>
		<div class="cart-list">
		<?php
		$sp = 0;
		$total = 0;
		foreach ($_SESSION['cart'] as $k => $v) {
			$prow = $detail->product_detailid($v['pid']);
			$sp += $v['q'];
			$total += $v['q'] * $v['price'];
		?>
			<div class="product-widget">
				<div class="product-img">
					<img src="/public/images/product/<?=$prow['product_img']?>">
				</div>
				<div class="product-body">
					<h3 class="product-name"><a href="index.php?option=product&id=<?=$prow['product_slug']?>"><?=$prow['product_name']?></a></h3>
					<h4 class="product-price"><span class="qty"><?=$v['q']?>x</span><?=money($v['price'])?></h4>
				</div>
				<button class="delete" data-id="<?=$v['pid']?>"><i class="fa fa-close"></i></button>
			</div>
		<?php
		}
		?>
		</div>
		<div class="cart-summary">
			<b><?=$sp?> sản phẩm</b>
			<h5>Tổng giá: <?=money($total)?></h5>
		</div>
		<div class="cart-btns">
			<a href="#">Xem Giỏ Hàng</a>
			<a href="index.php?option=checkout">Thanh Toán  <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	<?php
	} else {
		echo '<h3>Giỏ hàng còn trống</h3>';
	}
	exit;
}

$type = $_REQUEST['type'];

switch ($type) {
	case 'insert':
		$pid = $_REQUEST['pid'];
		$price = $_REQUEST['price'];
		if(isset($_SESSION['cart'][$pid])) {
			$_SESSION['cart'][$pid]['pid'] = $pid;
			$_SESSION['cart'][$pid]['price'] = $price;
			$_SESSION['cart'][$pid]['q']++;
		} else {
			$_SESSION['cart'][$pid]['pid'] = $pid;
			$_SESSION['cart'][$pid]['price'] = $price;
			$_SESSION['cart'][$pid]['q'] = 1;
		}
		break;
	case 'delete':
		$pid = $_REQUEST['pid'];
		if($_SESSION['cart'][$pid]['q'] > 1) {
			$_SESSION['cart'][$pid]['q']--;
		} else {
			unset($_SESSION['cart'][$pid]);
		}
		break;
	
	default:
		echo '404';
		break;
}
?>
