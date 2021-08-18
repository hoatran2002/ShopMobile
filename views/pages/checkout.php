<?php
$detail = loadModel('detail');
$checkout = loadModel("checkout");
$title = "Thanh Toán";

if(isset($_POST['submit'])) {
	$data1 = [
		'name' => $_POST['name'],
		'email' => $_POST['email'],
		'phone' => $_POST['phone'],
		'address' => $_POST['address'],
		'another' => $_POST['another'],
		'deliveryname' => $_POST['deliveryname'],
		'deliveryemail' => $_POST['deliveryemail'],
		'deliveryphone' => $_POST['deliveryphone'],
		'deliveryaddress' => $_POST['deliveryaddress'],
		'notes' => $_POST['notes']
	];
	$order_id = $checkout->insert_order($data1);
	foreach ($_SESSION['cart'] as $k => $v) {
		$total = $v['q'] * $v['price'];
		$data2 = [
			'orderid' => $order_id,
			'productid' => $v['pid'],
			'price' => $v['price'],
			'quantity' => $v['q'],
			'amount' => $total,
		];
		$checkout->insert_orderdetail($data2);
	}
	unset($_SESSION['cart']);
	redirect("index.php?option=order&id=".$order_id);
	exit;
}
if(!isset($_SESSION['cart']) || count($_SESSION['cart']) < 1) {
	redirect("index.php");
	exit;
}
?>

<?php require_once('views/header.php'); ?>

<div class="section">
	<div class="container">
		<div class="row">
		<form action="" method="post">
			<div class="col-md-7">
				<div class="billing-details">
					<div class="section-title">
						<h3 class="title">Thông tin đặt hàng</h3>
					</div>
					<div class="form-group">
						<input class="input" type="text" name="name" placeholder="Họ Tên" required="">
					</div>
					<div class="form-group">
						<input class="input" type="email" name="email" placeholder="Email" required="">
					</div>
					<div class="form-group">
						<input class="input" type="tel" name="phone" placeholder="Số Điện Thoại" required="">
					</div>
					<div class="form-group">
						<input class="input" type="text" name="address" placeholder="Địa Chỉ" required="">
					</div>
				</div>

				<div class="shiping-details">
					<div class="section-title">
						<h3 class="title">Thông tin giao hàng</h3>
					</div>
					<div class="input-checkbox">
						<input type="checkbox" name="another" id="shiping-address" value="1">
						<label for="shiping-address">
							<span></span>
							Giao hàng ở nơi khác?
						</label>
						<div class="caption">
							<div class="form-group">
								<input class="input" type="text" name="deliveryname" placeholder="Họ Tên">
							</div>
							<div class="form-group">
								<input class="input" type="email" name="deliveryemail" placeholder="Email">
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="deliveryphone" placeholder="Số Điện Thoại">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="deliveryaddress" placeholder="Địa Chỉ">
							</div>
						</div>
					</div>
				</div>

				<div class="order-notes">
					<textarea class="input" name="notes" placeholder="Ghi chú giao hàng"></textarea>
				</div>
			</div>

			<div class="col-md-5 order-details">
				<div class="section-title text-center">
					<h3 class="title">Đơn hàng</h3>
				</div>
				<div class="order-summary">
					<div class="order-col">
						<div><strong>Sản Phẩm</strong></div>
						<div><strong>Giá</strong></div>
					</div>
					<div class="order-products">
						<?php
						$total = 0;
						foreach ($_SESSION['cart'] as $k => $v) {
							$prow = $detail->product_detailid($v['pid']);
							$total += $v['q'] * $v['price'];
						?>
							<div class="order-col">
								<div><?=$v['q']?> X <?=$prow['product_name']?></div>
								<div><?=money($v['price'])?></div>
							</div>
						<?php
						}
						?>
					</div>
					<div class="order-col">
						<div>Phí Giao Hàng</div>
						<div><strong>MIỄN PHÍ</strong></div>
					</div>
					<div class="order-col">
						<div><strong>Tổng</strong></div>
						<div><strong class="order-total"><?=money($total)?></strong></div>
					</div>
				</div>
				<div class="payment-method">
					<p><strong>Hình thức thanh toán</strong></p>
					<div class="input-radio">
						<input type="radio" name="payment" id="payment-1">
						<label for="payment-1">
							<span></span>
							Chuyển khoản ngân hàng
						</label>
						<div class="caption">
							<p>Gửi về số tài khoản: 100004148532007</p>
							<p>Ngân hàng Agribank chi nhánh Lâm Đồng</p>
						</div>
					</div>
					<div class="input-radio">
						<input type="radio" name="payment" id="payment-2">
						<label for="payment-2">
							<span></span>
							Visa/Mastercard
						</label>
						<div class="caption">
							<p>Thanh toán bằng thẻ quốc tế, thẻ ghi nợ.</p>
						</div>
					</div>
					<div class="input-radio">
						<input type="radio" name="payment" id="payment-3">
						<label for="payment-3">
							<span></span>
							Paypal
						</label>
						<div class="caption">
							<p>Cổng thanh toán online.</p>
						</div>
					</div>
					<div class="input-radio">
						<input type="radio" name="payment" id="payment-4" checked="">
						<label for="payment-4">
							<span></span>
							Thanh toán khi giao hàng
						</label>
					</div>
				</div>
				<div class="input-checkbox">
					<input type="checkbox" id="terms">
					<label for="terms">
						<span></span>
						Tôi đã đọc và chấp nhận <a href="index.php?option=post&id=terms">điều khoản</a>
					</label>
				</div>
				<button class="btn primary-btn order-submit" name="submit" disabled="">Đặt Hàng</button>
			</div>
		</form>
		</div>
	</div>
</div>

<?php require_once('views/footer.php'); ?>