<?php
$product = loadModel('product');
$pt = loadClass('phantrang');

$limit = 8;
$category = loadModel('category');
$cat = $_REQUEST['cat'];
$rowcat = $category->category_rowslug($cat);
$catid = $rowcat['category_id'];

$current = $pt->pageCurrent();
$first = $pt->pageFirst($current,$limit);
$total = $product->product_category_count($catid);
$list = $product->product_category($catid,$first,$limit);
$title = $rowcat['category_name'];
?>
<?php require_once('views/header.php'); ?>

<div class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title"><?=$rowcat['category_name']?></h3>
					<div id="slick-nav-1" class="products-slick-nav"></div>
				</div>
			</div>
			<?php foreach($list as $row): ?>
				<div class="col-md-3 col-xs-6">
					<div class="product">
						<div class="product-img">
							<img src="/public/images/product/<?=$row['product_img']?>">
							<div class="product-label">
								<?php
								if($row['product_pricesale'] > 0) {
									echo '<span class="sale">SALE</span>';
								}
								?>
								<span class="new">NEW</span>
							</div>
						</div>
						<div class="product-body">
							<h3 class="product-name"><a href="index.php?option=product&id=<?=$row['product_slug']?>"><?=$row['product_name']?></a></h3>
							<h4 class="product-price">
								<?=money($row['product_price'])?>
								<?php
								if($row['product_pricesale']) {
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
			<?=$pt->pageLink($total,$limit,'index.php?option=product&cat='.$cat); ?>
			</ul>
		</div>
	</div>
</div>


<?php require_once('views/footer.php'); ?>