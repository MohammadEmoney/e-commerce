<footer class="py-1 bg-secondary" id="footer">
    <div class="container">
    	<div class="row">

				<div class="col-lg-4 col-md-6">
					<div class="footer-section">

						<a class="logo" href="{{url("/home")}}"><img src="{{asset('m-logo.png')}}" alt="Logo Image" width="30px"></a>
						<p class="copyright">MM @ 2017. All rights reserved.</p>
						<p class="copyright">Designed by <a href="https://www.instagram.com/eminay_mandi/" target="_blank">Mohammad</a></p>
						<ul class="icons">
							<li><a href="https://twitter.com/eminay_mandi/"><ion-icon name="logo-twitter" style="margin-top:5px"></ion-icon></a></li>
							<li><a href="#"><ion-icon name="logo-facebook" style="margin-top:5px"></ion-icon></a></li>
							<li><a href="https://www.instagram.com/eminay_mandi/"><ion-icon name="logo-instagram" style="margin-top:5px"></ion-icon></a></li>
							<li data-toggle="modal" data-target=".bd-example-modal-sm"><a href="#"><ion-icon name="call" style="margin-top:5px"></ion-icon></a></li>
							<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
							  <div class="modal-dialog modal-sm">
							    <div class="modal-content">
							      <p class="text-primary">+98 - 935 420 91 09</p>
							    </div>
							  </div>
							</div>
							<li data-toggle="modal" data-target=".bd-email-modal-sm"><a href="#"><ion-icon name="mail" style="margin-top:5px"></ion-icon></a></li>
							<div class="modal fade bd-email-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
							  <div class="modal-dialog modal-sm">
							    <div class="modal-content">
							     <p class="text-primary"> memoney026@gmail.com</p>
							    </div>
							  </div>
							</div>
						</ul>

					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->

				<div class="col-lg-4 col-md-6">
						
				</div><!-- col-lg-4 col-md-6 -->

				<div class="col-lg-4 col-md-6">
					<div class="footer-section">

						<h4 class="title"><b>SUBSCRIBE</b></h4>
						<div class="input-area">
							<form action="{{route('Confirmation.email')}}" method="post">
								@csrf
								<input class="email-input" type="text" name="email" placeholder="Enter your email">
								<button class="submit-btn" type="submit"><ion-icon name="mail"></ion-icon></button>
							</form>
						</div>

					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->

			</div><!-- row -->
        <p class="m-0 text-center text-white">Copyright &copy; Online Shop {{ date('Y-m-d') }}</p>     
    </div>
    <!-- /.container -->
</footer>