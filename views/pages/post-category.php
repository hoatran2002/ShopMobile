<?php
$topic = loadModel("topic");
$post = loadModel("post");
$pt = loadClass("phantrang");

$limit = 6;
$cat = $_REQUEST['cat'];
$rowcat = $topic->topic_rowslug($cat);
$catid = $rowcat['topic_id'];
$topic->topic_listid($catid);

$current = $pt->pageCurrent();
$first = $pt->pageFirst($current, $limit);
$total = $post->post_all_count();
$list = $post->post_topic($catid, $first, $limit);
$title = $rowcat['topic_name'];
?>
<?php require_once('views/header.php'); ?>

<div class="section">
	<div class="container">
		<div class="col-md-12">
			<div class="section-title">
				<h3 class="title"><?=$rowcat['topic_name']?></h3>
				<div id="slick-nav-1" class="products-slick-nav"></div>
			</div>
		</div>
		<?php
		$i = 0;
		foreach($list as $row):
		$i++;
		?>
		<div class="col-md-4 col-xs-6">
			<div class="panel panel-danger">
				<article class="panel-body">
					<a href="index.php?option=post&id=<?=$row['post_slug']?>">
						<img src="/public/images/post/<?=$row['post_img']?>" class="img-thumbnail">
						<h4><?=$row['post_title']?></h4>
					</a>
					<p><?=str_limit($row['post_detail'])?></p>
					<p><i class="fa fa-user"></i> Admin | <i class="fa fa-calendar"></i> <?=$row['post_createdat']?></p>
				</article>
			</div>
		</div>
		<?php if($i % 3 == 0): ?><div class="clearfix"></div><?php endif ?>
		<?php endforeach ?>
		<div class="store-filter clearfix">
			<ul class="store-pagination">
			<?=$pt->pageLink($total,$limit,'index.php?option=post'); ?>
			</ul>
		</div>
	</div>
</div>
<?php require_once('views/footer.php'); ?>