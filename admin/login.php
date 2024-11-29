<?php 
include('../mail/conexion.php');
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/>
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	
	<title>Login</title>
	<!-- set your website meta description and keywords -->
	<meta name="description" content="Add your business website description here">
	<meta name="keywords" content="Add your business website keywords here">
	<!-- set your website favicon -->
	<!--<link href="favicon.html" rel="icon">-->
	
	<!-- Bootstrap Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/contact-form.css" type="text/css">
</head>

<body>
	<section id="contact-form-section" class="form-content-wrap">
		<div class="container">
			<div class="row">
				<div class="tab-content">
					<div class="col-sm-12">
						<div class="item-wrap">
							<div class="row">
								<div class="col-sm-12">
									<div class="item-content colBottomMargin">
										<div class="item-info">
											<h2 class="item-title text-center">Inicio Sesion</h2>
										</div><!--End item-info -->
								   </div><!--End item-content -->
								</div><!--End col -->
								<div class="col-md-12">
								<form name="contactform" action="backendLogin.php" method="POST" data-toggle="validator" class="popup-form">
								<div class="form-group col-sm-12">
			                            <div class="help-block with-errors"></div>
			                            <input name="users" id="users" placeholder="Usuario*"class="form-control" type="text" required data-error="Por favor ingresa el Usuario">
			                            <div class="input-group-icon"><i class="fa fa-user"></i></div>
			                          </div>
									   <div class="form-group col-sm-12">
			                            <div class="help-block with-errors"></div>
			                            <input name="password" id="password" placeholder="Contraseña*"class="form-control" type="password" required data-error="Por favor ingresa tu contraseña">
			                            <div class="input-group-icon"><i class="fa fa-solid fa-lock"></i></div>
			                          </div>
			                          <div class="form-group col-sm-12">
			                            <div class="help-block with-errors"></div>
										<button type="submit" id="submit" class="btn btn-custom"><i class='fa fa-envelope'></i> Enviar</button>
									  </div><!-- end form-group -->
			                          <div class="clearfix"></div>
			                        </div><!-- end row -->
                      			</form><!-- end form -->
								</div>
							</div><!--End row -->
							<!-- Popup end -->
						</div><!-- end item-wrap -->
					</div><!--End col -->
				</div><!--End tab-content -->
			</div><!--End row -->
		</div><!--End container -->		
			<div class="row">					
				<div class="footer-top col-sm-12">
					<p class="text-center copyright">&copy;  2024 El Altar del Gusto. Todos los derechos reservados.</p>
				</div><!-- end col --> 
			</div><!-- end row -->
			
		</div><!--End container -->
	</div>
	
	<a href="../index.php" class="scrollup"><i class="fa fa-arrow-circle-up"></i></a>
		
	<!-- jQuery Library -->
	<script src="js/jquery-3.2.1.min.js"></script>	
	<!-- Popper js -->
	<script src="js/popper.min.js"></script>
	<!-- Bootstrap Js -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Form Validator -->
	<script src="js/validator.min.js"></script>
	<!-- Contact Form Js -->
	
</body>
</html>
<?php
