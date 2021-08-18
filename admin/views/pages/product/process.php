<?php
$product = loadModel('product');
if (isset($_POST['THEM'])) {
    $slug = str_slug($_POST['name']);
    if ($product->product_slug_exists($slug, $id) == TRUE) {
        $data = array('product_catid' => $_POST['catid'], 'product_name' => $_POST['name'], 'product_slug' => $slug, 'product_detail' => $_POST['detail'], 'product_number' => $_POST['number'], 'product_price' => $_POST['price'], 'product_pricesale' => $_POST['pricesale'], 'product_metakey' => $_POST['metakey'], 'product_metadesc' => $_POST['metadesc'], 'product_createdat' => date('Y-m-d H:i:s'), 'product_createdby' => $_SESSION['user_id'], 'product_updatedat' => date('Y-m-d H:i:s'), 'product_updatedby' => $_SESSION['user_id'], 'product_status' => $_POST['status']);
        $file_name = $_FILES['img']['name'];
        $file_tmp_name = $_FILES['img']['tmp_name'];
        $name_img = $slug . '.' . get_duoi($file_name);
        move_uploaded_file($file_tmp_name, "../public/images/product/" . $name_img);
        $data['product_img'] = $name_img;
        $product->product_insert($data);
        set_flash('mesage', ['type' => 'success', 'msg' => 'Thêm thành công']);
    } else {
        set_flash('mesage', ['type' => 'success', 'msg' => 'Tên sản phẩm đã tồn tại']);
    }
    redirect('index.php?option=product');
}
if (isset($_POST['CAPNHAT'])) {
    $id = $_POST['id'];
    $row = $product->product_rowid($id);
    $slug = str_slug($_POST['name']);
    if ($product->product_slug_exists($slug) == TRUE) {
        $data = array('product_catid' => $_POST['catid'], 'product_name' => $_POST['name'], 'product_slug' => $slug, 'product_detail' => $_POST['detail'], 'product_number' => $_POST['number'], 'product_price' => $_POST['price'], 'product_pricesale' => $_POST['pricesale'], 'product_metakey' => $_POST['metakey'], 'product_metadesc' => $_POST['metadesc'], 'product_updatedat' => date('Y-m-d H:i:s'), 'product_updatedby' => $_SESSION['user_id'], 'product_status' => $_POST['status']);
        if (strlen($_FILES['img']['name']) != 0) {
            $hinh = '../public/images/product/' . $row['product_img'];
            if (file_exists($hinh)) {
                unlink($hinh);
            }
            $file_name = $_FILES['img']['name'];
            $file_tmp_name = $_FILES['img']['tmp_name'];
            $name_img = $slug . '.' . get_duoi($file_name);
            move_uploaded_file($file_tmp_name, "../public/images/product/" . $name_img);
            $data['product_img'] = $name_img;
        }
        $product->product_update($data, $id);
        set_flash('mesage', ['type' => 'success', 'msg' => 'Cập nhật thành công']);
    } else {
        set_flash('mesage', ['type' => 'success', 'msg' => 'Tên sản phẩm đã tồn tại']);
    }
    redirect('index.php?option=product');
}
?>