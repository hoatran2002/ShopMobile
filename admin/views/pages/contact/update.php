<?php
$contact = loadModel('contact');
$input = filter_input_array(INPUT_POST);
$data = array(
	'contact_updatedat' => date('Y-m-d H:i:s'),
	'contact_updatedby' => $_SESSION['user_id']
);
if (isset($input['fullname'])) {
	$data['contact_fullname'] = $input['fullname'];
}
if (isset($input['email'])) {
	$data['contact_email'] = $input['email'];
}
if (isset($input['phone'])) {
	$data['contact_phone'] = $input['phone'];
}

$contact->contact_update($data, $input['id']);
?>