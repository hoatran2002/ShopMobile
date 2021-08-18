<?php 
$menu = loadModel('menu');
$topic = loadModel('topic');
$category = loadModel('category');
$list_menu = $menu->menu_list(true);
$list_category = $category->category_list(0);
$list_topic = $topic->topic_list(true);
$ntrash = count($menu->menu_list(false));
?>
		
<?php require_once 'views/header.php';?>

<section class="clearfix maincontent py-3">
	<div class="container-fluid"> 
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-6">
						<h4 class="text-danger text-uppercase">Quản lý Menu</h4>
					</div>
					<div class="col-md-6 text-right">
						<a href="index.php?option=menu&cat=trash" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Thùng rác (<?=$ntrash?>)</a>
					</div>
				</div>
			</div>
			<div class="card-block p-2">
				<div class="row">
					<div class="col-md-4">
						<div id="accordion">
							<div class="card">
								<?php require_once 'views/pages/menu/insert_category.php'; ?>
							</div>
							<div class="card">
								<?php require_once 'views/pages/menu/insert_topic.php'; ?>
							</div>
							<div class="card">
								<?php require_once 'views/pages/menu/insert_custom.php'; ?>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<?php require_once 'views/message.php'; ?>
						<?php require_once 'views/pages/menu/index_list.php'; ?>
					</div>	
				</div>
			</div>
		</div>
	</div>
</section>

<?php require_once 'views/footer.php';?>