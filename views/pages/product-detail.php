<?php
$detail = loadModel('detail');
$category = loadModel('category');

$product_slug = $_REQUEST['id'];
$product_detail = $detail->product_detail($product_slug);
$title = $product_detail['product_name'];
$rowcat = $category->category_rowid($product_detail['product_catid']);
$rowpcat = $category->category_rowid($rowcat['category_parentid']);
$product_relate = $detail->product_relate($product_detail['product_catid']);
?>
<?php require_once('views/header.php'); ?>

<div id="breadcrumb" class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb-tree">
					<li><a href="/">Trang Chủ</a></li>
					<?php if($rowcat['category_parentid'] != 0): ?>
					<li><a href="index.php?option=product&cat=<?=$rowpcat['category_slug']?>"><?=$rowpcat['category_name']?></a></li>
					<?php endif ?>
					<li><a href="index.php?option=product&cat=<?=$rowcat['category_slug']?>"><?=$rowcat['category_name']?></a></li>
					<li class="active"><?=$product_detail['product_name']?></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-md-push-2">
				<div id="product-main-img">
					<div class="product-preview">
						<img src="/public/images/product/<?=$product_detail['product_img']?>" alt="">
					</div>

					<div class="product-preview">
						<img src="/public/images/product/<?=$product_detail['product_img']?>" alt="">
					</div>
				</div>
			</div>

			<div class="col-md-2 col-md-pull-5">
				<div id="product-imgs">
					<div class="product-preview">
						<img src="/public/images/product/<?=$product_detail['product_img']?>" alt="">
					</div>

					<div class="product-preview">
						<img src="/public/images/product/<?=$product_detail['product_img']?>" alt="">
					</div>
				</div>
			</div>

			<div class="col-md-5">
				<div class="product-details">
					<h2 class="product-name"><?=$product_detail['product_name']?></h2>
					<div>
						<div class="product-rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o"></i>
						</div>
					</div>
					<div>
						<h3 class="product-price">
							<?=money($product_detail['product_price'])?>
							<?php if($product_detail['product_pricesale'] > 0):?>
							<del class="product-old-price"><?=money($product_detail['product_pricesale'])?></del>
							<?php endif ?>
						</h3>
						<?php if($product_detail['product_number'] > 0):?>
						<span class="product-available">Còn hàng</span>
						<?php endif ?>
					</div>
					<div class="add-to-cart">
						<button class="add-to-cart-btn" data-id="<?=$product_detail['product_id']?>" data-price="<?=$product_detail['product_price']?>"><i class="fa fa-shopping-cart"></i> add to cart</button>
					</div>
					<ul class="product-links">
						<li>Category:</li>
						<li><a href="index.php?option=product&cat=<?=$rowcat['category_slug']?>"><?=$rowcat['category_name']?></a></li>
					</ul>
					<ul class="product-links">
						<li>Share:</li>
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-envelope"></i></a></li>
					</ul>
				</div>
			</div>

			<div class="col-md-12">
				<div id="product-tab">
					<ul class="tab-nav">
						<li class="active"><a data-toggle="tab" href="#tab1">Mô tả</a></li>
					</ul>
					<div class="row">
						<div class="col-md-12">
							<p><?=nl2br($product_detail['product_detail'])?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title text-center">
					<h3 class="title">Sản Phẩm Liên Quan</h3>
				</div>
			</div>
			<?php foreach($product_relate as $row): ?>
			<div class="col-md-3 col-xs-6">
				<div class="product">
					<div class="product-img">
						<img src="/public/images/product/<?=$row['product_img']?>">
						<div class="product-label">
							<?php
							if($row['product_pricesale']) {
								echo '<span class="sale">SALE</span>';
							}
							?>
							<span class="new">NEW</span>
						</div>
					</div>
					<div class="product-body">
						<h3 class="product-name"><a href="index.php?option=product&id=<?=$row['product_slug']?>"><?=$row['product_name']?></a></h3>
						<h4 class="product-price">
							<?=number_format($row['product_price'])?>
							<?php
							if($row['product_pricesale']) {
								echo '<del class="product-old-price">'.number_format($row['product_price']).'</del>';
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
						<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
	</div>
</div>

<?php require_once('views/footer.php'); ?>