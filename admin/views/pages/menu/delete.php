<?php
$menu= loadModel('menu');
$id=$_REQUEST['id'];
$row=$menu->menu_rowid($id);

$hinh='../public/images/menu/'.$row['menu_img'];
if(file_exists($hinh))
{
	unlink($hinh);
}

$menu->menu_delete($id);
set_flash('mesage',['type'=>'success','msg'=>'Xóa thành công']);
redirect('index.php?option=menu&cat=trash');
?>