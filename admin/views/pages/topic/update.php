<?php
$category = loadModel('category');
$input = filter_input_array(INPUT_POST);
$data = array(
	'category_updatedat' => date('Y-m-d H:i:s'),
	'category_updatedby' => $_SESSION['user_id']
);
if (isset($input['name'])) {
	$data['category_name'] = $input['name'];
}
if (isset($input['parentid'])) {
	$data['category_parentid'] = $input['parentid'];
}

$category->category_update($data, $input['id']);
?>