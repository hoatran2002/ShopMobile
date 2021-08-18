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
		<?php foreach($list_menu as $row_menu): ?>
		<tr>
			<td class="text-center"><?=$row_menu['menu_id']?></td>
			<td><?=$row_menu['menu_name'];?></td>
			<td><?=$row_menu['menu_link'];?></td>
			<td><?=$row_menu['menu_order'];?></td>
			<td class="text-center"><?=$row_menu['menu_createdat'];?></td>
			<td class="text-center">
				<?php if($row_menu['menu_status']==1): ?>
					<a class="btn btn-sm btn-success" href="index.php?option=menu&cat=status&id=<?=$row_menu['menu_id']?>"><i class="fas fa-eye"></i></a>
				<?php else: ?>
					<a class="btn btn-sm btn-danger" href="index.php?option=menu&cat=status&id=<?=$row_menu['menu_id']?>"><i class="fas fa-eye"></i></a>
				<?php endif; ?>
				<a class="btn btn-sm btn-danger" href="index.php?option=menu&cat=deltrash&id=<?=$row_menu['menu_id']?>"><i class="fas fa-trash"></i></a>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>
<script type="text/javascript">
	$('#myTable').Tabledit({
		url: 'index.php?option=menu&cat=update&id=<?=$row_menu['menu_id']?>',
		eventType: 'dblclick',
		editButton: false,
		deleteButton: false,
		columns: {
			identifier: [0, 'id'],
			editable: [[1, 'name'],[2, 'link'],[3, 'order']]
		}
	});
</script>