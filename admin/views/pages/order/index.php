<?php
$order = loadModel('order');
$list_order = $order->order_list();
?>
		
<?php require_once 'views/header.php';?>

<section class="clearfix maincontent py-3">
	<div class="container-fluid"> 
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-6">
						<h4 class="text-danger text-uppercase">Quản lý Đơn Hàng</h4>
					</div>
				</div>
			</div>
			<div class="card-block p-2">
				<div class="row">
					<div class="col-md-12">
						<?php require_once 'views/message.php'; ?>
						<table id="myTable" class="table table-hover table-bordered">
							<thead>
								<tr>
									<th style="width:20px">ID</th>
									<th>Tên</th>
									<th>Email</th>
									<th>SĐT</th>
									<th>Địa Chỉ</th>
									<th>Ngày tạo</th>
									<th>Trạng thái</th>
									<th>Xem thông tin</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($list_order as $row): ?>
								<tr>
									<td class="text-center"><?=$row['order_id']?></td>
									<td><?=$row['order_name']?></td>
									<td><?=$row['order_email']?></td>
									<td><?=$row['order_phone']?></td>
									<td><?=$row['order_address']?></td>
									<td><?=$row['order_createdat']?></td>
									<?php if($row['order_status'] == 0): ?>
										<td class="text-center text-danger">Đã hủy</td>
									<?php elseif($row['order_status'] == 1): ?>
										<td class="text-center text-warning">Đang lấy hàng</td>
									<?php elseif($row['order_status'] == 2): ?>
										<td class="text-center text-success">Đã giao hàng</td>
									<?php else: ?>
										<td class="text-center text-primary">Đang giao hàng</td>
									<?php endif ?>
									<td class="text-center">
										<a class="btn btn-sm btn-success btn-view" href="#" data-id="<?=$row['order_id']?>" data-toggle="modal" data-target="#myModal"  data-backdrop="static" data-keyboard="false"><i class="fas fa-eye"></i></a>
									</td>
								</tr>
								<?php endforeach ?>
							</tbody>
						</table>
						<div class="modal fade" id="myModal">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Xem thông tin</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
								<div class="modal-body" id="viewInfo"></div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								</div>
							</div>
							</div>
						</div>
						<script type="text/javascript">
							$(document).ready(function () {
								$('#myTable').Tabledit({
									url: 'index.php?option=order&cat=update&id=<?=$row['order_id']?>',
									eventType: 'dblclick',
									editButton: false,
									deleteButton: false,
									columns: {
										identifier: [0, 'id'],
										editable: [[1, 'name'],[2, 'email'],[3, 'phone'],[4, 'address'],[6, 'status', '{"0": "Đã hủy", "1": "Đang lấy hàng", "2": "Đã giao hàng", "3": "Đang giao hàng"}']]
									}
								});
								$('.btn-view').on('click', function(e) {
									let btn = $(this);
									$.get('index.php?option=order&cat=view&id='+btn.data('id'), function(data) {
										$("#myModal").find('#viewInfo').html(data);
									});
								});
							});
						</script>
					</div>	
				</div>
			</div>
		</div>
	</div>
</section>

<?php require_once 'views/footer.php';?>