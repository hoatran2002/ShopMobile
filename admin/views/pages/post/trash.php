<?php 
$post = loadModel('post');
$topic = loadModel('topic');
$list = $post->post_list(false);
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
						<a href="index.php?option=post" class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Thoát</a>
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
							<th>Tên bài viết</th>
							<th>Chủ đề</th>
							<th>Ngày đăng</th>
							<th style="width:180px;">Chức năng</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($list as $row): ?>
							<?php
								$id = $row['post_id'];
								$topicname = $topic->topic_rowid($row['post_topid']);
							?>
						<tr>
							<td class="text-center"><?=$id?></td>
							<td class="text-center">
								<img src="/public/images/post/<?=$row['post_img']?>" class="img-fluid" alt="SP">
							</td>
							<td><?=$row['post_title']?></td>
							<td><?=$topicname['topic_name']?></td>
							<td class="text-center"><?=$row['post_createdat']?></td>
							<td class="text-center">
								<a class="btn btn-sm btn-info" href="index.php?option=post&cat=retrash&id=<?=$id?>"><i class="fas fa-undo"></i></a>
								<a class="btn btn-sm btn-danger" href="index.php?option=post&cat=delete&id=<?=$id?>"><i class="fas fa-trash"></i></a>
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
