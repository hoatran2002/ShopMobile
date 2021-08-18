<?php
$order = loadModel('order');
$input = filter_input_array(INPUT_POST);
$data = array(
	'order_updatedat' => date('Y-m-d H:i:s'),
	'order_updatedby' => $_SESSION['user_id']
);
if (isset($input['name'])) {
	$data['order_name'] = $input['name'];
}
if (isset($input['email'])) {
	$data['order_email'] = $input['email'];
}
if (isset($input['phone'])) {
	$data['order_phone'] = $input['phone'];
}
if (isset($input['address'])) {
	$data['order_address'] = $input['address'];
}
if (isset($input['status'])) {
	$data['order_status'] = $input['status'];
}

$order->order_update($data, $input['id']);
?>