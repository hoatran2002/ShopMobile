<?php
$title = 'Liên Hệ';
if (isset($_POST['GUILIENHE'])) {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $contact = loadModel('contact');
    $data = array('contact_fullname' => $_POST['fullname'], 'contact_email' => $_POST['email'], 'contact_phone' => $_POST['phone'], 'contact_detail' => $_POST['detail'], 'contact_createdat' => date('Y-m-d H:i:s'), 'contact_updatedat' => date('Y-m-d H:i:s'), 'contact_updatedby' => 1, 'contact_status' => 1);
    $contact->contact_insert($data);
}
?>

<?php require_once ('views/header.php'); ?>

<section class="breadcrumb p-0 m-0">
	<div class="container">
		<div class="row">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
					<li class="breadcrumb-item active" aria-current="page">Liên hệ</li>
				</ol>
			</nav>
		</div>
	</div>
</section>

<section class="clearfix maincontent py-3">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h3>Bản Đồ</h3>
				<div>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d979.6711026999558!2d106.77627122922605!3d10.835445616712063!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175270421bc101b%3A0xd8cce5669a0f2540!2zVW5uYW1lZCBSb2FkLCBUxINuZyBOaMahbiBQaMO6IEIsIFF14bqtbiA5LCBI4buTIENow60gTWluaCwgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1561187712149!5m2!1sen!2s" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>
			<div class="col-md-5">
				<h3>Thông tin liên hệ</h3>
				<form action="" name="fromcontact" method="post">
					<fieldset class="form-group">
						<label for="hoten">Họ và tên</label>
						<input  type="text" name="fullname" class="form-control" id="hoten" placeholder="Họ tên" required>
					</fieldset>
					<fieldset class="form-group">
						<label for="emailth">Email</label>
						<input  type="email" name="email" class="form-control" id="emailth" placeholder="Email" required>
					</fieldset>
					<fieldset class="form-group">
						<label for="phone">Điện thoại</label>
							<input  type="text" name="phone" class="form-control" id="phone" placeholder="Điện thoại" required>
					</fieldset>
					<fieldset class="form-group">
						<label for="noidung">Nội dung</label>
						<textarea name="detail" class="form-control" id="noidung" placeholder="Nội dung" required></textarea>
					</fieldset>
					<fieldset class="form-group">
						<button name="GUILIENHE" type="submit" class="btn btn-danger px-3">Gửi Liên Hệ</button>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</section>

<?php require_once ('views/footer.php'); ?>