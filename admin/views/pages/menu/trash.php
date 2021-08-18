<?php 
$menu = loadModel('menu');
$list = $menu->menu_list(false);
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
							<a href="index.php?option=menu" class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Thoát</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<?php require_once 'views/message.php'; ?>
					<table id="myTable" class="table table-hover table-bordered">
						<thead>
							<tr>
								<th style="width: 20px;" >ID</th>
								<th>Tên Menu</th>
								<th>Link Menu</th>
								<th>Sắp Xếp</th>
								<th>Ngày đăng</th>
								<th style="width:180px;">Chức năng</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($list as $row_menu): ?>
							<tr>
								<td class="text-center"><?=$row_menu['menu_id']?></td>
								<td><?=$row_menu['menu_name'];?></td>
								<td><?=$row_menu['menu_link'];?></td>
								<td><?=$row_menu['menu_order'];?></td>
								<td class="text-center"><?=$row_menu['menu_createdat'];?></td>
								<td class="text-center">
									<a class="btn btn-sm btn-info" href="index.php?option=menu&cat=retrash&id=<?=$row_menu['menu_id']?>"><i class="fas fa-undo"></i></a>
									<a class="btn btn-sm btn-danger" href="index.php?option=menu&cat=delete&id=<?=$row_menu['menu_id']?>"><i class="fas fa-trash"></i></a>
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
