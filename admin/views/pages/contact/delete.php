<?php
$contact = loadModel('contact');
$id = $_REQUEST['id'];
$data = array(
	'contact_status' => 0,
	'contact_updatedat' => date('Y-m-d H:i:s'),
	'contact_updatedby' => $_SESSION['user_id']
);

$contact->contact_update($data,$id);
set_flash('mesage',['type'=>'success','msg'=>'Cập nhật thành công']);
redirect('index.php?option=contact');
?>