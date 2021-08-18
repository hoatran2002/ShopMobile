<?php
$post = loadModel('post');
$topic = loadModel('topic');
$id = $_REQUEST['id'];
$listcat = $topic->topic_list();
$row = $post->post_rowid($id);
?>
<?php require_once 'views/header.php'; ?>

<section class="clearfix maincontent py-2">
	<form name="form1" method="post" action="index.php?option=post&cat=process" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?=$id?>">
		<div class="container-fluid">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-md-6">
							<h4 class="text-danger text-uppercase">Sửa bài viết</h4>
						</div>
						<div class="col-md-6 text-right">
							<button class="btn btn-sm btn-success" name="CAPNHAT" type="submit"><i class="fas fa-check"></i> Lưu</button>
							<a class="btn btn-sm btn-danger" href="index.php?option=post"><i class="fas fa-times"></i> Thoát</a>
						</div>
					</div>
				</div>
				<div class="card-block p-3">
					<div class="row">
						<div class="col-md-9">
							<fieldset class="form-group">
								<label>Tiêu đề bài viết</label>
								<input type="text" name="title" class="form-control" value="<?=$row['post_title']?>" placeholder="Tiêu đề bài viết" required>
							</fieldset>
							<fieldset class="form-group">
								<label>Nội dung</label>
								<textarea id="editor" name="detail" class="form-control" rows="6"><?=$row['post_detail']?></textarea>
								<script>ClassicEditor.create(document.querySelector('#editor'));</script>
							</fieldset>
							<fieldset class="form-group">
								<label>Mô tả (SEO)</label>
								<textarea name="metadesc" class="form-control" rows="2"></textarea>
							</fieldset>
							<fieldset class="form-group">
								<label>Từ khóa (SEO)</label>
								<textarea name="metakey" class="form-control" rows="2"></textarea>
							</fieldset>
						</div>
						<div class="col-md-3">
							<fieldset class="form-group">
								<label>Chủ đề</label>
								<select name="topid" class="form-control">
									<option value="">[-Chọn chủ đề-]</option>
									<?php foreach ($listcat as $cat): ?>
									<option value="<?=$cat['topic_id']?>"><?=$cat['topic_name']?></option>
									<?php endforeach; ?>
								</select>
							</fieldset>
							<fieldset class="form-group">
								<label>Loại</label>
								<select name="type" class="form-control" required>
									<option value="post">Bài Viết</option>
									<option value="page">Trang Đơn</option>
								</select>
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
								<p><img src="/public/images/post/<?=$row['post_img']?>" width="100px"></p>
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