<?php 
$product = loadModel('product');
$category = loadModel('category');
$list = $product->product_list(false);
?>
<?php require_once 'views/header.php';?>
<section class="header maincontent py-3">
	<div class="container-fluid"> 
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-6">
						<h4 class="text-danger text-uppercase">Quản lý thùng rác</h4>
					</div>
					<div class="col-md-6 text-right">
						<a href="index.php?option=product" class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Thoát</a>
					</div>
				</div>
			</div>
			<div class="card-body">
				<?php require_once 'views/message.php'; ?>
				<table id="mytable" class="table table-hover table-bordered">
					<thead>
						<tr>
							<th style="width: 20px;" >ID</th>
							<th style="width: 90px;">Hình</th>
							<th>Tên sản phẩm</th>
							<th>Loại sản phẩm</th>
							<th>Ngày đăng</th>
							<th style="width:180px;">Chức năng</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($list as $row): ?>
							<?php
								$id=$row['product_id'];
								$catrow = $category->category_rowid($row['product_catid']);
							?>
						<tr>
							<td class="text-center"><?=$id;?></td>
							<td class="text-center">
								<img src="/public/images/product/<?=$row['product_img']?>" class="img-fluid">
							</td>
							<td><?=$row['product_name']?></td>
							<td><?=$catrow['category_name']?></td>
							<td class="text-center"><?=$row['product_createdat']?></td>
							<td class="text-center">
								<a class="btn btn-sm btn-info" href="index.php?option=product&cat=retrash&id=<?=$id?>"><i class="fas fa-undo"></i></a>
								<a class="btn btn-sm btn-danger" href="index.php?option=product&cat=delete&id=<?=$id?>"><i class="fas fa-trash"></i></a>
							</td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>

<?php require_once 'views/footer.php';?>
