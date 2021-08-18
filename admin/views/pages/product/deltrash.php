<?php
$product = loadModel('product');
$id = $_REQUEST['id'];
$data = array(
	'product_status' => 0,
	'product_updatedat' => date('Y-m-d H:i:s'),
	'product_updatedby' => $_SESSION['user_id']
);

$product->product_update($data,$id);
set_flash('mesage',['type'=>'success','msg'=>'Đưa vào thùng rác thành công']);
redirect('index.php?option=product');
?>