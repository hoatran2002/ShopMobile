<?php
$post = loadModel('post');
$topic = loadModel('topic');

$post_slug = $_REQUEST['id'];
$post_detail = $post->post_detail($post_slug);
$title = $post_detail['post_title'];

$rowtop = $topic->topic_rowid($post_detail['post_topid']);
$post_relate = $post->post_relate($post_detail['post_topid']);
?>
<?php require_once('views/header.php'); ?>

<div id="breadcrumb" class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb-tree">
					<li><a href="/">Trang Chủ</a></li>
					<li><a href="index.php?option=post&cat=<?=$rowtop['topic_slug']?>"><?=$rowtop['topic_name']?></a></li>
					<li class="active"><?=$post_detail['post_title']?></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="section">
	<div class="container">
		<div class="col-sm-12">
			<div class="text-center">
				<img src="/public/images/post/<?=$post_detail['post_img']?>">
			</div>
			<hr>
			<h3><?=$post_detail['post_title']?></h3>
			<p><span class="fa fa-clock-o"></span> Post bởi <b>Admin</b>, <?=$post_detail['post_createdat']?></p>
			<h5><span class="label label-danger">Tin</span> <span class="label label-primary">Tức</span></h5>
			<br>
			<p><?=nl2br($post_detail['post_detail'])?></p>
		</div>
	</div>
</div>


<?php require_once('views/footer.php'); ?>