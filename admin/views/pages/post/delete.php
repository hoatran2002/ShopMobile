<?php
$post = loadModel('post');
$id = $_REQUEST['id'];
$row = $post->post_rowid($id);

$hinh = '../public/images/post/'.$row['post_img'];
if(file_exists($hinh)) {
	unlink($hinh);
}

$post->post_delete($id);
set_flash('mesage',['type'=>'success','msg'=>'Xóa thành công']);
redirect('index.php?option=post&cat=trash');
?>