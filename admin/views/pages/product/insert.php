<?php
$category = loadModel('category');
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
							<h4 class="text-danger text-uppercase">Thêm sản phẩm</h4>
						</div>
						<div class="col-md-6 text-right">
							<button class="btn btn-sm btn-success" name="THEM" type="submit"><i class="fas fa-check"></i> Lưu</button>
							<a class="btn btn-sm btn-danger" href="index.php?option=product"><i class="fas fa-times"></i> Thoát</a>
						</div>
					</div>
				</div>
				<div class="card-block p-3">
					<div class="row">
						<div class="col-md-9">
							<fieldset class="form-group">
								<label>Tên sản phẩm</label>
								<input type="text" name="name" class="form-control" placeholder="Tên sản phẩm" required>
							</fieldset>
							<fieldset class="form-group">
								<label>Chi tiết sản phẩm</label>
								<textarea id="editor" name="detail" class="form-control" rows="6"></textarea>
								<script>ClassicEditor.create(document.querySelector('#editor'));</script>
							</fieldset>
							<fieldset class="form-group">
								<label>Mô tả(SEO)</label>
								<textarea name="metadesc" class="form-control" rows="2"></textarea>
							</fieldset>
							<fieldset class="form-group">
								<label>Từ khóa(SEO)</label>
								<textarea name="metakey" class="form-control" rows="2"></textarea>
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
											<option value="<?=$cat['category_id']; ?>"><?=$cat['category_name']?></option>
										<?php endforeach; ?>
									<?php endforeach; ?>
								</select>
							</fieldset>
							<fieldset class="form-group">
								<label>Giá sản phẩm</label>
								<input type="number" name="price" class="form-control" placeholder="Giá sản phẩm">
							</fieldset>
							<fieldset class="form-group">
								<label>Giá khuyến mãi</label>
								<input type="number" name="pricesale" class="form-control" placeholder="Giá khuyến mãi">
							</fieldset>
							<fieldset class="form-group">
								<label>Số lượng</label>
								<input type="text" name="number" class="form-control" placeholder="Số lượng">
							</fieldset>
							<fieldset class="form-group">
								<label>Trạng thái</label>
								<select name="status" class="form-control">
									<option value="1">Xuất bản</option>
									<option value="2">Chưa xuất bản</option>
								</select>
							</fieldset>
							<fieldset class="form-group">
								<label>Hình đại diện</label>
								<input type="file" name="img" class="form-control-file" required>
							</fieldset>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</section>


<?php require_once 'views/footer.php'; ?>