<?php
$topic = loadModel('topic');
if (isset($_POST['THEM'])) {
    $slug = str_slug($_POST['name']);
    if ($topic->topic_slug_exists($slug) == TRUE) {
        $data = array('topic_name' => $_POST['name'], 'topic_slug' => $slug, 'topic_parentid' => $_POST['parentid'], 'topic_metakey' => $_POST['metakey'], 'topic_metadesc' => $_POST['metadesc'], 'topic_createdat' => date('Y-m-d H:i:s'), 'topic_createdby' => $_SESSION['user_id'], 'topic_updatedat' => date('Y-m-d H:i:s'), 'topic_updatedby' => $_SESSION['user_id'], 'topic_status' => $_POST['status']);
        $topic->topic_insert($data);
        set_flash('mesage', ['type' => 'success', 'msg' => 'Thêm thành công']);
    } else {
        set_flash('mesage', ['type' => 'success', 'msg' => 'Tên đanh mục đã tồn tại']);
    }
    redirect('index.php?option=topic');
}

$listcat = $topic->topic_list();
?>
<?php require_once 'views/header.php'; ?>
<section class="clearfix maincontent py-2">
	<form name="form1" method="post" action="index.php?option=topic&cat=insert">
		<div class="container-fluid">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-md-6">
							<h4 class="text-danger text-uppercase">Thêm Chủ Đề</h4>
						</div>
						<div class="col-md-6 text-right">
							<button class="btn btn-sm btn-success" name="THEM" type="submit"><i class="fas fa-check"></i> Lưu</button>
							<a class="btn btn-sm btn-danger" href="index.php?option=topic"><i class="fas fa-times"></i> Thoát</a>
						</div>
					</div>
				</div>
				<div class="card-block p-3">
					<div class="row">
						<div class="col-md-9">
							<fieldset class="form-group">
								<label>Tên chủ đề</label>
								<input type="text" name="name" class="form-control" placeholder="Tên chủ đề" required>
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
										<option value="<?=$cat['topic_id']; ?>"><?=$cat['topic_name']?></option>
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