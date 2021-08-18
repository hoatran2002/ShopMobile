<?php
$product = loadModel('product');
$category = loadModel('category');
$pt = loadClass('phantrang');

$limit = 9;
$current = $pt->pageCurrent();
$first= $pt->pageFirst($current,$limit);

$rowcat = $category->category_parentid();
$total = $product->product_all_count();
$list = $product->product_all($first,$limit);
$title = 'Cửa Hàng';
?>

<?php require_once('views/header.php'); ?>

<div class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title text-center">
					<h3 class="title">Tất Cả Sản Phẩm</h3>
				</div>
			</div>
			<div id="aside" class="col-md-3">
				<div class="aside">
					<h3 class="aside-title">Danh Mục</h3>
					<div class="checkbox-filter">

					<?php foreach($rowcat as $row): ?>
						<div class="input-checkbox">
							<input type="checkbox" id="cat-<?=$row['category_id']?>">
							<label for="cat-<?=$row['category_id']?>">
								<span></span>
								<?=$row['category_name']?>
							</label>
						</div>
					<?php endforeach ?>

					</div>
				</div>

				<div class="aside">
					<h3 class="aside-title">Giá</h3>
					<div class="price-filter">
						<div id="price-slider"></div>
						<div class="input-number price-min">
							<input id="price-min" type="number">
							<span class="qty-up">+</span>
							<span class="qty-down">-</span>
						</div>
						<span>-</span>
						<div class="input-number price-max">
							<input id="price-max" type="number">
							<span class="qty-up">+</span>
							<span class="qty-down">-</span>
						</div>
					</div>
				</div>
			</div>

			<div id="store" class="col-md-9">
				<div class="row">
					<?php foreach($list as $row): ?>
						<div class="col-md-4 col-xs-6">
							<div class="product">
								<div class="product-img">
									<img src="/public/images/product/<?=$row['product_img']?>">
									<div class="product-label">
										<?php
										if($row['product_pricesale']) {
											echo '<span class="sale">SALE</span>';
										}
										?>
									</div>
								</div>
								<div class="product-body">
									<h3 class="product-name"><a href="index.php?option=product&id=<?=$row['product_slug']?>"><?=$row['product_name']?></a></h3>
									<h4 class="product-price">
										<?=money($row['product_price'])?>
										<?php
										if($row['product_pricesale'] > 0) {
											echo '<del class="product-old-price">'.money($row['product_pricesale']).'</del>';
										}
										?>
									</h4>
									<div class="product-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div>
								<div class="add-to-cart">
									<button class="add-to-cart-btn" data-id="<?=$row['product_id']?>" data-price="<?=$row['product_price']?>"><i class="fa fa-shopping-cart"></i> add to cart</button>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="store-filter clearfix">
					<ul class="store-pagination">
					<?=$pt->pageLink($total,$limit,'index.php?option=product'); ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require_once('views/footer.php'); ?>