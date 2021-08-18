<?php
$contact = loadModel('contact');
$list_contact = $contact->contact_list();
?>
		
<?php require_once 'views/header.php';?>
<section class="clearfix maincontent py-3">
	<div class="container-fluid"> 
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-6">
						<h4 class="text-danger text-uppercase">Quản lý Liên Hệ</h4>
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
									<th>Tên</th>
									<th>Email</th>
									<th>SĐT</th>
									<th>Ngày tạo</th>
									<th>Ngày cập nhật</th>
									<th style="width:180px">Chức năng</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($list_contact as $row): ?>
								<tr>
									<td class="text-center"><?=$row['contact_id']?></td>
									<td><?=$row['contact_fullname']?></td>
									<td><?=$row['contact_email']?></td>
									<td><?=$row['contact_phone']?></td>
									<td class="text-center"><?=$row['contact_createdat']?></td>
									<td class="text-center"><?=$row['contact_updatedat']?></td>
									<td class="text-center">
										<?php if($row['contact_status']==1): ?>
											<a class="btn btn-sm btn-success" href="index.php?option=contact&cat=status&id=<?=$row['contact_id']?>"><i class="fas fa-eye"></i></a>
										<?php else: ?>
											<a class="btn btn-sm btn-danger" href="index.php?option=contact&cat=status&id=<?=$row['contact_id']?>"><i class="fas fa-eye"></i></a>
										<?php endif; ?>
										<a class="btn btn-sm btn-danger" href="index.php?option=contact&cat=delete&id=<?=$row['contact_id']?>"><i class="fas fa-trash"></i></a>
									</td>
								</tr>
								<?php endforeach ?>
							</tbody>
						</table>
						<script type="text/javascript">
							$('#myTable').Tabledit({
								url: 'index.php?option=contact&cat=update&id=<?=$row['contact_id']?>',
								eventType: 'dblclick',
								editButton: false,
								deleteButton: false,
								columns: {
									identifier: [0, 'id'],
									editable: [[1, 'fullname'],[2, 'email'],[3, 'phone']]
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