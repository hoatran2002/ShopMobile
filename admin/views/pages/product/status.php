<?php
$product = loadModel('product');
$id = $_REQUEST['id'];
$row = $product->product_rowid($id);
$tt = ($row['product_status'] == 1) ? 2 : 1;
$data = array(
	'product_status' => $tt,
	'product_updatedat' => date('Y-m-d H:i:s'),
	'product_updatedby' => $_SESSION['user_id']
);
$product->product_update($data, $id);
set_flash('mesage', ['type' => 'success', 'msg' => 'Cập nhật thành công']);
redirect('index.php?option=product');
?>