<?php
$topic = loadModel('topic');
$id = $_REQUEST['id'];
$row = $topic->topic_rowid($id);
$tt = ($row['topic_status']==1) ? 2 : 1;
$data = array(
	'topic_status' => $tt,
	'topic_updatedat' => date('Y-m-d H:i:s'),
	'topic_updatedby' => $_SESSION['user_id']
);

$topic->topic_update($data,$id);
set_flash('mesage',['type'=>'success','msg'=>'Cập nhật thành công']);
redirect('index.php?option=topic');
?>