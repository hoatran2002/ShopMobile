<?php
$menu = loadModel('menu');
$input = filter_input_array(INPUT_POST);
$data = array(
	'menu_updatedat' => date('Y-m-d H:i:s'),
	'menu_updatedby' => $_SESSION['user_id']
);
if (isset($input['name'])) {
	$data['menu_name'] = $input['name'];
}
if (isset($input['link'])) {
	$data['menu_link'] = $input['link'];
}
if (isset($input['order'])) {
	$data['menu_order'] = $input['order'];
}

$menu->menu_update($data, $input['id']);
?>