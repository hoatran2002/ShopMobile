<?php
$topic = loadModel('topic');
$list_topic = $topic->topic_list();
?>
		
<?php require_once 'views/header.php';?>
<section class="clearfix maincontent py-3">
	<div class="container-fluid"> 
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-6">
						<h4 class="text-danger text-uppercase">Quản lý Chủ Đề</h4>
					</div>
					<div class="col-md-6 text-right">
						<a href="index.php?option=topic&cat=insert" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Thêm</a>
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
									<th>Tên Chủ Đề</th>
									<th>Chủ Đề Cha</th>
									<th>Ngày tạo</th>
									<th>Ngày cập nhật</th>
									<th style="width:180px">Chức năng</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($list_topic as $row): ?>
								<tr>
									<td class="text-center"><?=$row['topic_id']?></td>
									<td><?=$row['topic_name']?></td>
									<td><?=$row['topic_parentid']?></td>
									<td class="text-center"><?=$row['topic_createdat']?></td>
									<td class="text-center"><?=$row['topic_updatedat']?></td>
									<td class="text-center">
										<?php if($row['topic_status']==1): ?>
											<a class="btn btn-sm btn-success" href="index.php?option=topic&cat=status&id=<?=$row['topic_id']?>"><i class="fas fa-eye"></i></a>
										<?php else: ?>
											<a class="btn btn-sm btn-danger" href="index.php?option=topic&cat=status&id=<?=$row['topic_id']?>"><i class="fas fa-eye"></i></a>
										<?php endif; ?>
										<a class="btn btn-sm btn-danger" href="index.php?option=topic&cat=delete&id=<?=$row['topic_id']?>"><i class="fas fa-trash"></i></a>
									</td>
								</tr>
								<?php endforeach ?>
							</tbody>
						</table>
						<script type="text/javascript">
							$('#myTable').Tabledit({
								url: 'index.php?option=topic&cat=update&id=<?=$row['topic_id']?>',
								eventType: 'dblclick',
								editButton: false,
								deleteButton: false,
								columns: {
									identifier: [0, 'id'],
									editable: [[1, 'name'],[2, 'parentid']]
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