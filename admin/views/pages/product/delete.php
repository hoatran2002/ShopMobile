<?php
$product= loadModel('product');
$id = $_REQUEST['id'];
$row = $product->product_rowid($id);

$hinh = '../public/images/product/'.$row['product_img'];
if(file_exists($hinh)) {
	unlink($hinh);
}

$product->product_delete($id);
set_flash('mesage',['type'=>'success','msg'=>'Xóa thành công']);
redirect('index.php?option=product&cat=trash');
?>