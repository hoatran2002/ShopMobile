<?php
$menu = loadModel('menu');
$category = loadModel('category');
$topic = loadModel('topic');
if (isset($_POST['THEM'])) {
	$order = $menu->menu_count_all();
	if($_POST['type'] == 'category') {
		$crow = $category->category_rowid($_POST['itemcat']);
		$name = $crow['category_name'];
		$link = 'index.php?option=product&cat='.$crow['category_slug'];
	}
	if($_POST['type'] == 'topic') {
		$trow = $topic->topic_rowid($_POST['itemtopic']);
		$name = $trow['topic_name'];
		$link = 'index.php?option=post&cat='.$trow['topic_slug'];
	}
	if($_POST['type'] == 'custom') {
		$name = $_POST['name'];
		$link = $_POST['link'];
	}
    $data = array('menu_name' => $name, 'menu_link' => $link, 'menu_order' => $order, 'menu_position' => 'mainmenu', 'menu_parentid' => '0', 'menu_createdat' => date('Y-m-d H:i:s'), 'menu_createdby' => $_SESSION['user_id'], 'menu_updatedat' => date('Y-m-d H:i:s'), 'menu_updatedby' => $_SESSION['user_id'], 'menu_status' => '1');
    $menu->menu_insert($data);
    set_flash('mesage', ['type' => 'success', 'msg' => 'Thêm thành công']);
    redirect('index.php?option=menu');
}
?>