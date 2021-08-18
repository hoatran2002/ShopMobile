<?php
$category = loadModel('category');
$list_category = $category->category_listall();
?>
		
<?php require_once 'views/header.php';?>
<section class="clearfix maincontent py-3">
	<div class="container-fluid"> 
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-6">
						<h4 class="text-danger text-uppercase">Quản lý Danh Mục</h4>
					</div>
					<div class="col-md-6 text-right">
						<a href="index.php?option=category&cat=insert" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Thêm</a>
					</div>
				</div>
			</div>
			<div class="card-block p-2">
				<div class="row">
					<div  class="col-md-12">
						<?php require_once 'views/message.php'; ?>
						<table id="myTable" class="table table-hover table-bordered">
							<thead>
								<tr>
									<th style="width:20px">ID</th>
									<th>Tên Danh Mục</th>
									<th>Danh Mục Cha</th>
									<th>Sắp Xếp</th>
									<th>Ngày tạo</th>
									<th>Ngày cập nhật</th>
									<th style="width:180px">Chức năng</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($list_category as $row): ?>
								<tr>
									<td class="text-center"><?=$row['category_id']?></td>
									<td><?=$row['category_name']?></td>
									<td><?=$row['category_parentid']?></td>
									<td><?=$row['category_order']?></td>
									<td class="text-center"><?=$row['category_createdat']?></td>
									<td class="text-center"><?=$row['category_updatedat']?></td>
									<td class="text-center">
										<?php if($row['category_status']==1): ?>
											<a class="btn btn-sm btn-success" href="index.php?option=category&cat=status&id=<?=$row['category_id']?>"><i class="fas fa-eye"></i></a>
										<?php else: ?>
											<a class="btn btn-sm btn-danger" href="index.php?option=category&cat=status&id=<?=$row['category_id']?>"><i class="fas fa-eye"></i></a>
										<?php endif; ?>
										<a class="btn btn-sm btn-danger" href="index.php?option=category&cat=delete&id=<?=$row['category_id']?>"><i class="fas fa-trash"></i></a>
									</td>
								</tr>
								<?php endforeach ?>
							</tbody>
						</table>
						<script type="text/javascript">
							$('#myTable').Tabledit({
								url: 'index.php?option=category&cat=update&id=<?=$row['category_id']?>',
								eventType: 'dblclick',
								editButton: false,
								deleteButton: false,
								columns: {
									identifier: [0, 'id'],
									editable: [[1, 'name'],[2, 'parentid'],[3, 'order']]
								}
							});
						</script>
					</div>	
				</div>
			</div>
		</div>
	</div>
</section>

<?php require_once 'views/footer.php';?>