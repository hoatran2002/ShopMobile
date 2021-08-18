<?php 
$post = loadModel('post');
$topic = loadModel('topic');
$list = $post->post_list(true);
$ntrash = count($post->post_list(false));
?>
		
<?php require_once 'views/header.php'?>
<section class="clearfix maincontent py-3">
	<div class="container-fluid"> 
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-6">
						<h4 class="text-danger text-uppercase">Quản lý bài viết</h4>
					</div>
					<div class="col-md-6 text-right">
						<a href="index.php?option=post&cat=insert" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Thêm</a>
						<a href="index.php?option=post&cat=trash" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Thùng rác (<?=$ntrash?>)</a>
					</div>
				</div>
			</div>
			<div class="card-block p-2">
				<?php require_once 'views/message.php'; ?>
				<table id="myTable" class="table table-hover table-bordered">
					<thead>
						<tr>
							<th style="width: 20px;" >ID</th>
							<th style="width: 90px;">Hình</th>
							<th>Tên bài viết</th>
							<th>Thể loại</th>
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
								<img src="/public/images/post/<?=$row['post_img']?>" class="img-fluid">
							</td>
							<td><?=$row['post_title']?></td>
							<td><?=($row['post_topid']==0)?"Trang đơn":$topicname['topic_name']?></td>
							<td class="text-center"><?=$row['post_createdat']?></td>
							<td class="text-center">
								<?php if($row['post_status']==1): ?>
									<a class="btn btn-sm btn-success" href="index.php?option=post&cat=status&id=<?=$id?>"><i class="fas fa-eye"></i></a>
								<?php else: ?>
									<a class="btn btn-sm btn-danger" href="index.php?option=post&cat=status&id=<?=$id?>"><i class="fas fa-eye"></i></a>
								<?php endif; ?>
								<a class="btn btn-sm btn-info" href="index.php?option=post&cat=update&id=<?=$id?>"><i class="fas fa-edit"></i></a>
								<a class="btn btn-sm btn-danger" href="index.php?option=post&cat=deltrash&id=<?=$id?>"><i class="fas fa-trash"></i></a>
							</td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>

<?php require_once 'views/footer.php'?>