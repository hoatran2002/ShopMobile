<?php
$topic = loadModel('topic');
$id = $_REQUEST['id'];
$data = array(
	'topic_status' => 0,
	'topic_updatedat' => date('Y-m-d H:i:s'),
	'topic_updatedby' => $_SESSION['user_id']
);

$topic->topic_update($data,$id);
set_flash('mesage',['type'=>'success','msg'=>'Cập nhật thành công']);
redirect('index.php?option=topic');
?>