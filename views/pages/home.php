<?php
$product = loadModel('product');
$post = loadModel("post");

$list_lastnews = $product->product_home_lastnews(8);
$list_lastsale = $product->product_home_lastsale(8);
$list_post = $post->post_new();
$title = 'Trang Chủ';
?>

<?php require_once('views/header.php'); ?>

<div class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">SẢN PHẨM MỚI</h3>
					<div id="slick-nav-1" class="products-slick-nav"></div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="row">
					<div class="products-tabs">
						<div id="tab1" class="tab-pane active">
							<div class="products-slick" data-nav="#slick-nav-1">
							<?php foreach($list_lastnews as $row): ?>
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
							<?php endforeach; ?> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="hot-deal" class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hot-deal">
					<ul class="hot-deal-countdown">
						<li>
							<div>
								<h3>02</h3>
								<span>Days</span>
							</div>
						</li>
						<li>
							<div>
								<h3>10</h3>
								<span>Hours</span>
							</div>
						</li>
						<li>
							<div>
								<h3>34</h3>
								<span>Mins</span>
							</div>
						</li>
						<li>
							<div>
								<h3>60</h3>
								<span>Secs</span>
							</div>
						</li>
					</ul>
					<h2 class="text-uppercase">hot deal this week</h2>
					<p>New Collection Up to 50% OFF</p>
					<a class="primary-btn cta-btn" href="index.php?option=product">CỬA HÀNG</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">SẢN PHẨM KHUYẾN MÃI</h3>
					<div id="slick-nav-2" class="products-slick-nav"></div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="row">
					<div class="products-tabs">
						<div id="tab1" class="tab-pane active">
							<div class="products-slick" data-nav="#slick-nav-2">
							<?php foreach($list_lastsale as $row): ?>
								<div class="product">
									<div class="product-img">
										<img src="/public/images/product/<?=$row['product_img']?>">
										<div class="product-label">
											<span class="sale">SALE</span>
										</div>
									</div>
									<div class="product-body">
										<h3 class="product-name"><a href="index.php?option=product&id=<?=$row['product_slug']?>"><?=$row['product_name']?></a></h3>
										<h4 class="product-price">
											<?=money($row['product_price'])?>đ
											<del class="product-old-price"><?=money($row['product_pricesale'])?>đ</del>
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
							<?php endforeach; ?> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="section">
	<div class="container">
		<div class="col-md-12">
			<div class="section-title">
				<h3 class="title">Tin Tức Mới</h3>
				<div id="slick-nav-1" class="products-slick-nav"></div>
			</div>
		</div>
		<?php
		$i = 0;
		foreach($list_post as $row):
		$i++;
		?>
		<div class="col-md-4 col-xs-6">
			<div class="panel panel-danger">
				<article class="panel-body">
					<a href="index.php?option=post&id=<?=$row['post_slug']?>">
						<img src="/public/images/post/<?=$row['post_img']?>" class="img-thumbnail">
						<h4><?=$row['post_title']?></h4>
					</a>
					<p><?=str_limit($row['post_detail'])?></p>
					<p><i class="fa fa-user"></i> Admin | <i class="fa fa-calendar"></i> <?=$row['post_createdat']?></p>
				</article>
			</div>
		</div>
		<?php if($i % 3 == 0): ?><div class="clearfix"></div><?php endif ?>
		<?php endforeach ?>
	</div>
</div>

<?php require_once('views/footer.php'); ?>