<!DOCTYPE html>
<html>

<head>
	<title>Absensi</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<!-- CSS Files -->
	<link href="<?php echo base_url("assets/frontend/css/bootstrap.min.css"); ?>" rel="stylesheet" media="screen">
	<link href="<?php echo base_url("assets/frontend/css/font-awesome.min.css"); ?>" rel="stylesheet">
	<link href="<?php echo base_url("assets/frontend/fonts/icon-7-stroke/css/pe-icon-7-stroke.css"); ?>" rel="stylesheet">
	<link href="<?php echo base_url("assets/frontend/css/animate.css"); ?>" rel="stylesheet" media="screen">
	<link href="<?php echo base_url("assets/frontend/css/owl.theme.css"); ?>" rel="stylesheet">
	<link href="<?php echo base_url("assets/frontend/css/owl.carousel.css"); ?>" rel="stylesheet">
	<!-- Colors -->
	<link href="<?php echo base_url("assets/frontend/css/css-index.css"); ?>" rel="stylesheet" media="screen">

	<!-- Google Fonts -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic" />
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body data-spy="scroll" data-target="#navbar-scroll">
	<!-- /.preloader -->
	<div id="preloader"></div>
	<div id="top"></div>

	<!-- /.parallax full screen background image -->
	<div class="fullscreen landing parallax" style="background-image:url('<?= base_url('assets/frontend/images/empy.jpg'); ?>');" data-img-width="2000" data-img-height="1333" data-diff="100">

		<div class="overlay">
			<div class="container">
				<div class="row">
					<div class="col-md-7">

						<!-- /.logo -->
						<!-- <div class="logo wow fadeInDown"> <a href=""><img src="<?= base_url('assets/frontend/images/logo.png'); ?>" alt="logo"></a></div> -->
						<div class="logo wow fadeInDown"> &nbsp;</div>
						<h1 class="fadeInLeft">
							Absensi Karyawan
						</h1>

						<!-- /.header paragraph -->
						<div class="landing-text wow fadeInUp">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						</div>

						<!-- /.header button -->
						<!-- <div class="head-btn wow fadeInLeft">
							<a href="#feature" class="btn-primary">Features</a>
							<a href="#download" class="btn-default">Download</a>
						</div> -->

					</div>

					<!-- /.signup form -->
					<div class="col-md-5">
						<div class="signup-header wow fadeInUp">
							<h3 class="form-title text-center">Register Sekarang !</h3>
							<form class="form-header" role="form" method="post">
								<?php echo $this->session->flashdata('msg'); ?>
								<?php if (!empty($failed)): ?>
									<div class="alert alert-danger" role="alert"><?php echo $failed; ?></div>
									<?php endif ?>
									<div class="form-group">
										<input class="form-control input-lg" name="perusahaan_nama" id="name" type="text" placeholder="Nama Perusahaan" required>
									</div>
									<div class="form-group">
										<input class="form-control input-lg" name="perusahaan_email" type="email" placeholder="Email Perusahaan" required>
									</div>
									<div class="form-group">
										<input class="form-control input-lg" name="perusahaan_password" type="password" placeholder="Password" required>	
									</div>
									<div class="form-group">
										<input class="form-control input-lg" name="perusahaan_bidang" type="text" placeholder="Bidang Perusahaan" required>
									</div>
									<div class="form-group last">
										<button type="submit" class="btn btn-success btn-lg">Daftar</button>
									</div>
									<p class="privacy text-center">Sudah punya akun? Login <a href="<?= base_url('mastercms'); ?>">disini</a></p>
								</form>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- modal -->
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Modal Header</h4>
					</div>
					<div class="modal-body">
						<p>This is a small modal.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<!-- modal -->

		<!-- NAVIGATION -->


	<!-- <div id="menu">
		<div class="navbar-wrapper navbar-light bg-light" role="navigation">
			<div class="container">
				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target=".navbar-backyard"> <span class="sr-only">Toggle navigation</span>
&#x2630;</button> <a class="navbar-brand site-name" href="#top"><img src="images/logo2.png" alt="logo"></a>
				<div id="navbar-scroll" class="collapse navbar-collapse navbar-backyard ml-auto">
					<ul class="nav navbar-nav">
						<li><a href="#intro" class="nav-link">About</a>
						</li>
						<li><a href="#feature" class="nav-link">Features</a>
						</li>
						<li><a href="#download" class="nav-link">Download</a>
						</li>
						<li><a href="#package" class="nav-link">Pricing</a>
						</li>
						<li><a href="#testi" class="nav-link">Reviews</a>
						</li>
						<li><a href="#contact" class="nav-link">Contact</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div> -->



	<!-- /.intro section -->
	<div id="intro">
		<div class="container">
			<div class="row">

				<!-- /.intro image -->
				<div class="col-lg-6 intro-pic wow slideInLeft">
					<img src="<?= base_url('assets/frontend/images/intro-image.jpg'); ?>" alt="image" class="img-fluid">
				</div>

				<!-- /.intro content -->
				<div class="col-lg-6 wow slideInRight">
					<h2>Optimize performance through advanced targeting solutions</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. </p>

					<!-- <div class="btn-section"><a href="#feature" class="btn-default">Learn More</a></div> -->

				</div>
			</div>
		</div>
	</div>




	<!-- /.feature section -->
	<div id="feature">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 mr-lg-auto ml-lg-auto col-12 text-lg-center feature-title">

					<!-- /.feature title -->
					<h2>Recreate your ideas and gain more success</h2>
					<p>Increase your user loyalty by maintaining mutual communication and nurturing your online community.</p>
				</div>
			</div>

			<div class="row row-feat">
				<div class="col-lg-4 text-lg-center">

					<!-- /.feature image -->
					<div class="feature-img">
						<img src="<?= base_url('assets/frontend/images/feature-image.jpg'); ?>" alt="image" class="img-fluid wow fadeInLeft">
					</div>
				</div>

				<div class="col-lg-8">
					<div class="row">

						<!-- /.feature 1 -->
						<div class="col-lg-6 feat-list">
							<i class="pe-7s-notebook pe-5x pe-va wow fadeInUp"></i>
							<div class="inner">
								<h4>Marketing Strategy</h4>
								<p>Good marketing makes the company look smart. Great marketing makes the customer feel smart.
								</p>
							</div>
						</div>

						<!-- /.feature 2 -->
						<div class="col-lg-6 feat-list">
							<i class="pe-7s-cash pe-5x pe-va wow fadeInUp" data-wow-delay="0.2s"></i>
							<div class="inner">
								<h4>App Monetization</h4>
								<p>Content builds relationships. Relationships are built on trust. Trust drives revenue. - Andrew Davis</p>
							</div>
						</div>

						<!-- /.feature 3 -->
						<div class="col-lg-6 feat-list">
							<i class="pe-7s-cart pe-5x pe-va wow fadeInUp" data-wow-delay="0.4s"></i>
							<div class="inner">
								<h4>Store Optimization</h4>
								<p>Never doubt a small group of thoughtful, committed people can change the world. Indeed, it is the only thing that ever has.</p>
							</div>
						</div>

						<!-- /.feature 4 -->
						<div class="col-lg-6 feat-list">
							<i class="pe-7s-users pe-5x pe-va wow fadeInUp" data-wow-delay="0.6s"></i>
							<div class="inner">
								<h4>User Management</h4>
								<p>Instead of using technology to automate processes, think about using technology to enhance human interaction.</p>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- /.feature 2 section -->
	<div id="feature-2">
		<div class="container">
			<div class="row">

				<!-- /.feature content -->
				<div class="col-lg-6 wow fadeInLeft">
					<h2>Learn how to make your app marketing efficient</h2>
					<p>Good marketing makes the company look smart. <span class="highlight">Great marketing</span> makes the customer feel smart, - Joe Chernov. Never doubt a small group of thoughtful, committed people can change the world. Indeed, it is the only thing that ever has, - Margaret Mead. The best way to predict the future is to create it, - Peter Drucker.
					</p>

					<!-- <div class="btn-section"><a href="#download" class="btn-default">Download Now</a></div> -->

				</div>

				<!-- /.feature image -->
				<div class="col-lg-6 feature-2-pic wow fadeInRight">
					<img src="<?= base_url('assets/frontend/images/feature2-image.jpg'); ?>" alt="macbook" class="img-fluid">
				</div>
			</div>

		</div>
	</div>


	<!-- /.download section -->
	<!-- <div id="download">
		<div class="action fullscreen parallax" style="background-image:url('<?= base_url('assets/frontend/images/empy.jpg'); ?>');" data-img-width="2000" data-img-height="1333" data-diff="100">
			<div class="overlay">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 mr-auto ml-auto col-sm-12 text-lg-center">
							<h2 class="wow fadeInRight">Would like to know more?</h2>
							<p class="download-text wow fadeInLeft">We'll research the market, identify the right target audience, analyze competitors and avoid users churn to increase retention. Download now for free and join with thousands happy clients.</p>

							<div class="download-cta wow fadeInLeft">
								<a href="#contact" class="btn-secondary">Get Connected</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->

	<!-- /.pricing section -->
	
	<!-- /.client section -->
	<!-- <div id="client">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<img alt="client" src="<?= base_url('assets/frontend/images/client1.png'); ?>" class="wow fadeInUp">
					<img alt="client" src="<?= base_url('assets/frontend/images/client2.png'); ?>" class="wow fadeInUp" data-wow-delay="0.2s">
					<img alt="client" src="<?= base_url('assets/frontend/images/client3.png'); ?>" class="wow fadeInUp" data-wow-delay="0.4s">
					<img alt="client" src="<?= base_url('assets/frontend/images/client4.png'); ?>" class="wow fadeInUp" data-wow-delay="0.6s">
				</div>
			</div>
		</div>
	</div> -->

	<!-- /.testimonial section -->
	<!--  -->

	<!-- /.contact section -->
	<div id="contact">
		<div class="contact fullscreen parallax" style="background-image:url('<?= base_url('assets/frontend/images/empy.jpg'); ?>');" data-img-width="2000" data-img-height="1334" data-diff="100">
			<div class="overlay">
				<div class="container">
					<div class="row">
						<div class="contact-row">

							<!-- /.address and contact -->
							<div class="col-lg-5 contact-left wow fadeInUp">
								<h2><span class="highlight">Get</span> in touch</h2>
								<ul class="ul-address">
									<li><i class="pe-7s-map-marker"></i>1600 Amphitheatre Parkway, Mountain View</br>
										California 55000
									</li>
									<li><i class="pe-7s-phone"></i>+1 (123) 456-7890</br>
										+2 (123) 456-7890
									</li>
									<li><i class="pe-7s-mail"></i><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
									<li><i class="pe-7s-look"></i><a href="#">www.yoursite.com</a></li>
								</ul>

							</div>

							<!-- /.contact form -->
							<div class="col-lg-7 contact-right">
								<form method="POST" id="contact-form" class="form-horizontal" action="contactengine.php" onSubmit="alert( 'Thank you for your feedback!' );">
									<div class="form-group">
										<input type="text" name="Name" id="Name" class="form-control wow fadeInUp" placeholder="Name" required/>
									</div>
									<div class="form-group">
										<input type="text" name="Email" id="Email" class="form-control wow fadeInUp" placeholder="Email" required/>
									</div>
									<div class="form-group">
										<textarea name="Message" rows="20" cols="20" id="Message" class="form-control input-message wow fadeInUp" placeholder="Message" required></textarea>
									</div>
									<div class="form-group">
										<input type="submit" name="submit" value="Submit" class="btn btn-success wow fadeInUp" />
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- /.footer -->
	<footer id="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 mr-auto ml-auto">
					<!-- /.social links -->
					<!-- <div class="social text-center">
						<ul>
							<li><a class="wow fadeInUp" href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
							<li><a class="wow fadeInUp" href="https://www.facebook.com/" data-wow-delay="0.2s"><i class="fa fa-facebook"></i></a></li>
							<li><a class="wow fadeInUp" href="https://plus.google.com/" data-wow-delay="0.4s"><i class="fa fa-google-plus"></i></a></li>
							<li><a class="wow fadeInUp" href="https://instagram.com/" data-wow-delay="0.6s"><i class="fa fa-instagram"></i></a></li>
						</ul>
					</div> -->
					<div class="text-center wow fadeInUp" style="font-size: 14px;">© PT OTRET DOT COM - 2018
						<a href="#" class="scrollToTop"><i class="pe-7s-up-arrow pe-va"></i></a>
					</div>
				</div>
			</div>
		</footer>

		<!-- google capcha -->
		<script src='https://www.google.com/recaptcha/api.js'></script>

		<!-- /.javascript files -->
		<script src="<?php echo base_url("assets/frontend/js/jquery.js"); ?>"></script>
		<script src="<?php echo base_url("assets/frontend/js/popper.min.js"); ?>"></script>
		<script src="<?php echo base_url("assets/frontend/js/bootstrap.min.js"); ?>"></script>
		<script src="<?php echo base_url("assets/frontend/js/jquery.sticky.js"); ?>"></script>
		<script src="<?php echo base_url("assets/frontend/js/wow.min.js"); ?>"></script>
		<script src="<?php echo base_url("assets/frontend/js/owl.carousel.min.js"); ?>"></script>
		<script src="<?php echo base_url("assets/frontend/js/custom.js"); ?>"></script>
		<script>
			new WOW().init();

		</script>
	</body>

	</html>
