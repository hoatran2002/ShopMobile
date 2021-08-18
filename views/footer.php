	<div id="newsletter" class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="newsletter">
						<p>Đăng ký nhận thông báo</p>
						<form>
							<input class="input" type="email" placeholder="Email">
							<button class="newsletter-btn"><i class="fa fa-envelope"></i> Đăng ký</button>
						</form>
						<ul class="newsletter-follow">
							<li>
								<a href="#"><i class="fa fa-facebook"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-twitter"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-instagram"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-pinterest"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<footer id="footer">
		<div class="section">
			<div class="container">
				<div class="col-md-6 col-xs-12">
					<div class="footer">
						<h3 class="footer-title">About Us</h3>
						<p>Trang web thuộc đồ án môn Phân tích thiết kết</p>
						<ul class="footer-links">
							<li><a href="#"><i class="fa fa-map-marker"></i>99 đường 11, Tăng Nhơn Phú B</a></li>
							<li><a href="#"><i class="fa fa-phone"></i>08.6969.5431</a></li>
							<li><a href="#"><i class="fa fa-envelope-o"></i>hotboyld99@gmail.com</a></li>
						</ul>
					</div>
				</div>

				<div class="clearfix visible-xs"></div>

				<div class="col-md-3 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">Danh Mục</h3>
						<ul class="footer-links">
							<?php foreach ($listcat1 as $row) { ?>
								<li><a href="#"><?=$row['category_name']?></a></li>
							<?php } ?>
						</ul>
					</div>
				</div>

				<div class="col-md-3 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">Liên Kết</h3>
						<ul class="footer-links">
							<?php foreach ($listmenu1 as $row) { ?>
								<li><a href="#"><?=$row['menu_name']?></a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div id="bottom-footer" class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<ul class="footer-payments">
							<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
							<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
						</ul>
						<span class="copyright">
							<p>Copyright &copy; 2019 All rights reserved.</p>
							<b>Designed with all <i class="fa fa-heart-o"></i> by <a href="https://fb.com/hotboyld99" target="_blank">Trung Hiếu</a></b>
						</span>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<div id="cart-load"><i class="fa fa-spinner fa-spin"></i></div>
	<script src="/public/js/jquery.min.js"></script>
	<script src="/public/js/bootstrap.min.js"></script>
	<script src="/public/js/slick.min.js"></script>
	<script src="/public/js/nouislider.min.js"></script>
	<script src="/public/js/jquery.zoom.min.js"></script>
	<script src="/public/js/wNumb.js"></script>
	<script src="/public/js/main.js"></script>
	<script type="text/javascript">
		$("img").each(function() {
			if(this.complete) {
				$(this).attr('src', $(this).data('original'));
			}
		});
	</script>
	</body>
</html>