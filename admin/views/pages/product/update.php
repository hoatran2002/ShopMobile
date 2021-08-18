<?php
$category = loadModel('category');
$product = loadModel('product');
$id = $_REQUEST['id'];
$row = $product->product_rowid($id);
$listcatp = $category->category_listp();
?>
<?php require_once 'views/header.php'; ?>
<section class="clearfix maincontent py-2">
	<form name="form1" method="post" action="index.php?option=product&cat=process" enctype="multipart/form-data">
		<div class="container-fluid">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-md-6">
							<h4 class="text-danger text-uppercase">Cập nhật sản phẩm</h4>
						</div>
						<div class="col-md-6 text-right">
							<button class="btn btn-sm btn-success" name="CAPNHAT" type="submit"><i class="fas fa-check"></i> Lưu</button>
							<a class="btn btn-sm btn-danger" href="index.php?option=product"><i class="fas fa-times"></i> Thoát</a>
						</div>
					</div>
				</div>
				<div class="card-block p-3">
					<div class="row">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<div class="col-md-9">
							<fieldset class="form-group">
								<label>Tên sản phẩm</label>
								<input type="text" name="name" class="form-control" value="<?php echo $row['product_name']; ?>" placeholder="Tên sản phẩm" required>
							</fieldset>
							<fieldset class="form-group">
								<label>Chi tiết sản phẩm</label>
								<textarea id="editor" name="detail" class="form-control" rows="6"><?php echo $row['product_detail']; ?></textarea>
								<script>ClassicEditor.create(document.querySelector('#editor'));</script>
							</fieldset>
							<fieldset class="form-group">
								<label>Mô tả(SEO)</label>
								<textarea name="metadesc" class="form-control" rows="2"><?php echo $row['product_metadesc']; ?></textarea>
							</fieldset>
							<fieldset class="form-group">
								<label>Từ khóa(SEO)</label>
								<textarea name="metakey" class="form-control" rows="2"><?php echo $row['product_metakey']; ?></textarea>
							</fieldset>
						</div>
						<div class="col-md-3">
							<fieldset class="form-group">
								<label>Loại sản phẩm</label>
								<select name="catid" class="form-control" required>
									<?php
									foreach ($listcatp as $catp):
										$listcat = $category->category_list($catp['category_id']);
									?>
									<optgroup label="<?=$catp['category_name']?>">
										<?php foreach ($listcat as $cat): ?>
										<?php if($row['product_catid'] == $cat['category_id']) { ?>
											<option selected="" value="<?=$cat['category_id']; ?>"><?=$cat['category_name']?></option>
										<?php } else { ?>
											<option value="<?=$cat['category_id']; ?>"><?=$cat['category_name']?></option>
										<?php } ?>
										<?php endforeach; ?>
									<?php endforeach; ?>
								</select>
							</fieldset>
							<fieldset class="form-group">
								<label>Giá sản phẩm</label>
								<input type="number" name="price" value="<?php echo $row['product_price']; ?>" class="form-control" placeholder="Giá sản phẩm">
							</fieldset>
							<fieldset class="form-group">
								<label>Giá khuyến mãi</label>
								<input type="number" name="pricesale" value="<?php echo $row['product_pricesale']; ?>" class="form-control" placeholder="Giá khuyến mãi">
							</fieldset>
							<fieldset class="form-group">
								<label>Số lượng</label>
								<input type="number" name="number" value="<?php echo $row['product_number']; ?>" class="form-control" placeholder="Số lượng">
							</fieldset>
							<fieldset class="form-group">
								<label>Trạng thái</label>
								<select name="status" class="form-control">
									<option value="1" <?php if($row['product_status']==1) {echo 'selected';} ?>>Xuất bản</option>
									<option value="2" <?php if($row['product_status']==2) {echo 'selected';} ?>>Chưa xuất bản</option>
								</select>
							</fieldset>
							<fieldset class="form-group">
								<label>Hình đại diện</label>
								<p><img src="/public/images/product/<?=$row['product_img']?>" width="100px"></p>
								<input type="file" name="img" class="form-control-file">
							</fieldset>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</section>


<?php require_once 'views/footer.php'; ?>