<?php
$product = loadModel('product');
$category = loadModel('category');
$post = loadModel('post');
$topic = loadModel('topic');
$order = loadModel('order');
$n_product = count($product->product_all());
$n_cat = count($category->category_listall());
$n_post = count($post->post_all());
$n_topic = count($topic->topic_all());
$n_order = count($order->order_list());
?>

<?php require_once 'views/header.php';?>

<section class="clearfix maincontent py-3">
	<div class="container-fluid"> 
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-6">
						<h4 class="text-danger text-uppercase">Thống Kê</h4>
					</div>
				</div>
			</div>
			<div class="card-block p-2">
				<div class="col-md-12">
					<ul class="list-group">
						<li class="list-group-item">Số sản phẩm: <span class="badge badge-danger"><?=$n_product?></span></li>
						<li class="list-group-item">Số danh mục: <span class="badge badge-danger"><?=$n_cat?></span></li>
						<li class="list-group-item">Số bài viết: <span class="badge badge-danger"><?=$n_post?></span></li>
						<li class="list-group-item">Số chủ đề: <span class="badge badge-danger"><?=$n_topic?></span></li>
						<li class="list-group-item">Số đơn hàng: <span class="badge badge-danger"><?=$n_order?></span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<?php require_once 'views/footer.php';?>