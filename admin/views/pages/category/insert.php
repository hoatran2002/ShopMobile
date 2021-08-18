<?php
$category = loadModel('category');
if (isset($_POST['THEM'])) {
    $slug = str_slug($_POST['name']);
    if ($category->category_slug_exists($slug) == TRUE) {
        $data = array('category_name' => $_POST['name'], 'category_slug' => $slug, 'category_parentid' => $_POST['parentid'], 'category_metakey' => $_POST['metakey'], 'category_metadesc' => $_POST['metadesc'], 'category_createdat' => date('Y-m-d H:i:s'), 'category_createdby' => $_SESSION['user_id'], 'category_updatedat' => date('Y-m-d H:i:s'), 'category_updatedby' => $_SESSION['user_id'], 'category_status' => $_POST['status']);
        $category->category_insert($data);
        set_flash('mesage', ['type' => 'success', 'msg' => 'Thêm thành công']);
    } else {
        set_flash('mesage', ['type' => 'success', 'msg' => 'Tên đanh mục đã tồn tại']);
    }
    redirect('index.php?option=category');
}

$listcat = $category->category_listall();
?>
<?php require_once 'views/header.php'; ?>
<section class="clearfix maincontent py-2">
	<form name="form1" method="post" action="index.php?option=category&cat=insert">
		<div class="container-fluid">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-md-6">
							<h4 class="text-danger text-uppercase">Thêm Danh Mục</h4>
						</div>
						<div class="col-md-6 text-right">
							<button class="btn btn-sm btn-success" name="THEM" type="submit"><i class="fas fa-check"></i> Lưu</button>
							<a class="btn btn-sm btn-danger" href="index.php?option=category"><i class="fas fa-times"></i> Thoát</a>
						</div>
					</div>
				</div>
				<div class="card-block p-3">
					<div class="row">
						<div class="col-md-9">
							<fieldset class="form-group">
								<label>Tên danh mục</label>
								<input type="text" name="name" class="form-control" placeholder="Tên danh mục" required>
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
								<label>Danh Mục Cha</label>
								<select name="parentid" class="form-control" required>
									<option value="0">Không</option>
									<?php foreach ($listcat as $cat): ?>
										<option value="<?=$cat['category_id']; ?>"><?=$cat['category_name']?></option>
									<?php endforeach; ?>
								</select>
							</fieldset>
							<fieldset class="form-group">
								<label>Trạng thái</label>
								<select name="status" class="form-control">
									<option value="1">Xuất bản</option>
									<option value="2">Chưa xuất bản</option>
								</select>
							</fieldset>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</section>

<?php require_once 'views/footer.php'; ?>