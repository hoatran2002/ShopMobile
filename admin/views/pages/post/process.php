<?php
$post = loadModel('post');
if (isset($_POST['THEM'])) {
    $slug = str_slug($_POST['title']);
    if ($post->post_slug_exists($slug, $id) == TRUE) {
        $data = array('post_topid' => $_POST['topid'], 'post_title' => $_POST['title'], 'post_slug' => $slug, 'post_detail' => $_POST['detail'], 'post_type' => $_POST['type'], 'post_metakey' => $_POST['metakey'], 'post_metadesc' => $_POST['metadesc'], 'post_createdat' => date('Y-m-d H:i:s'), 'post_createdby' => $_SESSION['user_id'], 'post_updatedat' => date('Y-m-d H:i:s'), 'post_updatedby' => $_SESSION['user_id'], 'post_status' => $_POST['status']);
        $file_name = $_FILES['img']['name'];
        $file_tmp_name = $_FILES['img']['tmp_name'];
        $name_img = $slug . '.' . get_duoi($file_name);
        move_uploaded_file($file_tmp_name, "../public/images/post/" . $name_img);
        $data['post_img'] = $name_img;
        $post->post_insert($data);
        set_flash('mesage', ['type' => 'success', 'msg' => 'Thêm thành công']);
    } else {
        set_flash('mesage', ['type' => 'success', 'msg' => 'Tên sản phẩm đã tồn tại']);
    }
    redirect('index.php?option=post');
}
if (isset($_POST['CAPNHAT'])) {
    $id = $_POST['id'];
    $row = $post->post_rowid($id);
    $slug = str_slug($_POST['title']);
    if ($post->post_slug_exists($slug) == TRUE) {
        $data = array('post_topid' => $_POST['topid'], 'post_title' => $_POST['title'], 'post_slug' => $slug, 'post_detail' => $_POST['detail'], 'post_type' => $_POST['type'], 'post_metakey' => $_POST['metakey'], 'post_metadesc' => $_POST['metadesc'], 'post_updatedat' => date('Y-m-d H:i:s'), 'post_updatedby' => $_SESSION['user_id'], 'post_status' => $_POST['status']);
        if (strlen($_FILES['img']['name']) != 0) {
            $hinh = '../public/images/post/' . $row['post_img'];
            if (file_exists($hinh)) {
                unlink($hinh);
            }
            $file_name = $_FILES['img']['name'];
            $file_tmp_name = $_FILES['img']['tmp_name'];
            $name_img = $slug . '.' . get_duoi($file_name);
            move_uploaded_file($file_tmp_name, "../public/images/post/" . $name_img);
            $data['post_img'] = $name_img;
        }
        $post->post_update($data, $id);
        set_flash('mesage', ['type' => 'success', 'msg' => 'Cập nhật thành công']);
    } else {
        set_flash('mesage', ['type' => 'success', 'msg' => 'Tên sản phẩm đã tồn tại']);
    }
    redirect('index.php?option=post');
}
?>