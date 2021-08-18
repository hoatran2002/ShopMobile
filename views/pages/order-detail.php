<?php
$order = loadModel('order');
$orderdetail = loadModel('orderdetail');
$product = loadModel('product');
$id = $_REQUEST['id'];
$rorder = $order->order_rowid($id);
$list_product = $orderdetail->orderdetail_listproduct($id);
$total = 0;
$title = 'Chi tiết đơn hàng';
?>

<?php require_once ('views/header.php'); ?>

<section class="breadcrumb p-0 m-0">
	<div class="container">
		<div class="row">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
					<li class="breadcrumb-item active" aria-current="page">Chi tiết đơn hàng</li>
				</ol>
			</nav>
		</div>
	</div>
</section>

<section class="clearfix maincontent py-3">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<p><h2>Mã đơn hàng: #<?=$rorder['order_id']?></h2></p>
				<p>
					<ul class="list-group">
						<h4>Người đặt hàng:</h4>
						<li class="list-group-item">Họ tên: <b><?=$rorder['order_name']?></b></li>
						<li class="list-group-item">Địa chỉ: <b><?=$rorder['order_address']?></b></li>
						<li class="list-group-item">SĐT: <b><?=$rorder['order_phone']?></b></li>
						<li class="list-group-item">Email: <b><?=$rorder['order_email']?></b></li>
					</ul>
				</p>
				<p>
					<ul class="list-group">
						<h4>Giao tới:</h4>
						<?php if($rorder['order_another'] == 0):?>
						<li class="list-group-item">Họ tên: <b><?=$rorder['order_name']?></b></li>
						<li class="list-group-item">Địa chỉ: <b><?=$rorder['order_address']?></b></li>
						<li class="list-group-item">SĐT: <b><?=$rorder['order_phone']?></b></li>
						<li class="list-group-item">Email: <b><?=$rorder['order_email']?></b></li>
						<?php else:?>
						<li class="list-group-item">Họ tên: <b><?=$rorder['order_deliveryname']?></b></li>
						<li class="list-group-item">Địa chỉ: <b><?=$rorder['order_deliveryaddress']?></b></li>
						<li class="list-group-item">SĐT: <b><?=$rorder['order_deliveryphone']?></b></li>
						<li class="list-group-item">Email: <b><?=$rorder['order_deliveryemail']?></b></li>
						<?php endif?>
					</ul>
				</p>
				<p>
					<ul class="list-group">
						<h4>Sản phẩm:</h4>
						<?php foreach($list_product as $row):?>
							<?php
							$rproduct = $product->product_rowid($row['orderdetail_productid']);
							$total += $row['orderdetail_amount'];
							?>
							<li class="list-group-item d-flex justify-content-between align-items-center">
								<b><?=$row['orderdetail_quantity']?>x <?=$rproduct['product_name']?></b>
								<span class="badge badge-primary badge-pill"><?=money($row['orderdetail_amount'])?></span>
							</li>
						<?php endforeach?>
					</ul>
				</p><hr>
				<div class="text-center">
					<h3>Tổng thanh toán: <?=money($total)?></h3>
					[<?php if($rorder['order_status'] == 0): ?>
						<b class="text-center text-danger">Đã hủy</b>
					<?php elseif($rorder['order_status'] == 1): ?>
						<b class="text-center text-warning">Đang lấy hàng</b>
					<?php elseif($rorder['order_status'] == 2): ?>
						<b class="text-center text-success">Đã giao hàng</b>
					<?php else: ?>
						<b class="text-center text-primary">Đang giao hàng</b>
					<?php endif ?>]
				</div>
			</div>
		</div>
	</div>
</section>

<?php require_once ('views/footer.php'); ?>