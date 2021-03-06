<?php

use frontend\assets\Sayt2Asset;
use yii\bootstrap\Modal;

use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use yii\helpers\Html;
use lavrentiev\widgets\toastr\Notification;

Sayt2Asset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
	<link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <?php $this->head() ?>

</head>
<body>
<?php $this->beginBody() ?>

<?php


Modal::begin([
    'header' => '<h2>Siz tanlagan maxsulotlar</h2>',
	'id'=>"myModal",
    'size'=>'modal-lg',
    'footer'=>"<a href='".url::to(['card/checkout'])."' class='btn btn-success'>Zakaz qilish</a><a href='".url::to(['card/clear'])."' class='btn btn-danger clear'>Tozalash</a>",

]);

echo "<div id='blok'></div>";

Modal::end();



Modal::begin([
	'id'=>"loginModal",
    'size'=>'modal-md',
]);
echo "<div id='blok1'></div>";
Modal::end();


Modal::begin([
	'id'=>"signupModal",
    'size'=>'modal-md',
]);
echo "<div id='blok2'></div>";
Modal::end();


?>


<div id="wrapper">
		<!-- header of the page -->
		<header id="page-header">
			<!-- top bar -->
			<div class="top-bar bg-dark text-gray">
				<div class="container">
					<div class="row top-bar-holder">
						<div class="col-xs-9 col">
							<!-- bar links -->
							<ul class="font-lato list-unstyled bar-links">
								<li>
									<a href="tel:+611234567890">
										<strong class="dt element-block text-capitalize hd-phone">Call :</strong>
										<strong class="dd element-block hd-phone">+(61) 123 456 7890</strong>
										<i class="fas fa-phone-square hd-up-phone hidden-sm hidden-md hidden-lg"><span class="sr-only">phone</span></i>
									</a>
								</li>
								<li>
									<a href="mailto:&#069;&#120;&#097;&#109;&#112;&#108;&#101;&#064;&#100;&#111;&#109;&#097;&#105;&#110;&#046;&#099;&#111;&#109;">
										<strong class="dt element-block text-capitalize hd-phone">Email :</strong>
										<strong class="dd element-block hd-phone">&#069;&#120;&#097;&#109;&#112;&#108;&#101;&#064;&#100;&#111;&#109;&#097;&#105;&#110;&#046;&#099;&#111;&#109;</strong>
										<i class="fas fa-envelope-square hd-up-phone hidden-sm hidden-md hidden-lg"><span class="sr-only">email</span></i>
									</a>
								</li>
							</ul>
						</div>
						<div class="col-xs-3 col justify-end">
							<!-- user links -->
							<ul class="list-unstyled user-links fw-bold font-lato">
								<li><a href="#"  class="loginModal" id='login' onclick="showLogin()" class="">Login</a> <span class="sep">|</span> <a href="#" class="" onclick="showSignup()" id='regster' >Register</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- header holder -->
			<div class="header-holder">
				<div class="container">
					<div class="row">
						<div class="col-xs-6 col-sm-3">
							<!-- logo -->
							<div class="logo">
								<a href="<?=url::to(['index/index'])?>">
									<img src="<?=url::to('/frontend/web/images/logo-dark.png')?>" alt="studylms">
								</a>
							</div>
						</div>
						<div class="col-xs-6 col-sm-9 static-block">
							<!-- nav -->
							<nav id="nav" class="navbar navbar-default">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<!-- navbar collapse -->
								<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav navbar-right main-navigation text-uppercase font-lato">
										<li class="dropdown">
											<a href="<?=url::to(['index/index'])?>" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">home</a>
										</li>
										<li class="dropdown">
											<a href="<?=url::to(['index/courseslist'])?>" class="dropdown-toggle">Courses</a>
										</li>
										<li class="dropdown">
											<a href="<?=url::to(['index/eventslist'])?>" class="dropdown-toggle">Events</a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>
											<ul class="dropdown-menu">
												<li><a href="<?=url::to(['index/instructorslist'])?>">Instructors List</a></li>
												<?php if(Yii::$app->user->isGuest){?>
												<li><a href="<?=url::to(['site/login'])?>">Login</a></li>
												<li><a href="<?=url::to(['site/signup'])?>">Register</a></li>
												<?php } ?>

											</ul>
										</li>
										<li class="dropdown">
											<a href="<?=url::to(['index/blog'])?>" class="dropdown-toggle" >Blog</a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shop</a>
											<ul class="dropdown-menu">
												<li><a href="<?=url::to(['index/shop'])?>">Shop List</a></li>
												<li><a href="#" onclick="showcard()">Cart Page</a></li>
												<li><a href="<?=url::to(['card/checkout'])?>">Checkout</a></li>
											</ul>
										</li>
										<li class="dropdown"><a href="<?=url::to(['index/contact'])?>">CONTACT</a></li>
										<li>
										<?php if(!Yii::$app->user->isGuest):?>
											<form action="<?=Url::to(['site/logout'])?>" method="post" class="d-none">
											  <input type="hidden" name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->csrfToken?>">
												<?=Html::submitInput(strtoupper("Chiqish {".yii::$app->user->identity->username."}"),['style'=>'color: inherit; font-size: 13px;line-height: 1.15385;padding: 0;display: inline; background-color: transparent; border:none'])?>
										</form>
										<?php endif; ?>

										</li>
									</ul>
								</div>
								<!-- navbar form -->
								<form action="<?=url::to(['index/shop'])?>" class="navbar-form navbar-search-form navbar-right">
									<a class="fas fa-search search-opener" role="button" data-toggle="collapse" href="#searchCollapse" aria-expanded="false" aria-controls="searchCollapse"><span class="sr-only">search opener</span></a>
									<!-- search collapse -->
									<div class="collapse search-collapse" id="searchCollapse">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Search &hellip;" name="s">
											<button type="submit" class="fas fa-search btn"><span class="sr-only">Qidirish</span></button>
										</div>
									</div>
								</form>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- contain main informative part of the site -->
		<main id="main">
			<!-- heading banner -->
			<header class="heading-banner text-white bgCover" style="background-image: url(<?=url::to("/backend/web/photos/ah0eIVP2VA-TE3u5ScsTjIq6CyGlbjLg.jpg")?>);">
				<div class="container holder">
					<div class="align">
						<h1><?=$this->params['title']??"Hello world"?></h1>
					</div>
				</div>
			</header>
			<!-- breadcrumb nav -->
			
				<div class="container">
				<?= Breadcrumbs::widget([
					'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
				]) ?>
				</div>
		
			<!-- <div id="two-columns" class="container">
            <div class="row"> -->
            <?=$content?>


		</main>
		<!-- footer area container -->
		<div class="footer-area bg-dark text-gray">
			<!-- aside -->
			<aside class="aside container">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-3 col">
					<div class="logo"><a href="<?=url::to(['index/index'])?>"><img src="<?=url::to('@web/images/logo.png')?>" alt="studyLMS"></a></div>
						<p>We have over 20 years experience providing expert Educational both businesses and individuals. Our Investment Committee brings cades the industry expertise in driving our investment approach. portfolio constructor and allocation</p>
						<a href="#" class="btn btn-default text-uppercase">Start Leaning Now</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 col hidden-xs">
						<h3>Popular Courses</h3>
						<!-- widget cources list -->
						<ul class="widget-cources-list list-unstyled">
						<li>
								<a href="<?=url::to(['index/courseslist'])?>">
									<div class="alignleft">
										<img src="https://picsum.photos/60/60" alt="image description">
									</div>
									<div class="description-wrap">
										<h4>Introduction to Mobile Apps Development</h4>
										<strong class="price text-primary element-block font-lato text-uppercase">$99.00</strong>
									</div>
								</a>
							</li>
							<li>
								<a href="<?=url::to(['index/courseslist'])?>">
									<div class="alignleft">
										<img src="https://picsum.photos/60/60" alt="image description">
									</div>
									<div class="description-wrap">
										<h4>Become a Professional Film Maker</h4>
										<strong class="price text-success element-block font-lato text-uppercase">Free</strong>
									</div>
								</a>
							</li>
							<li>
								<a href="<?=url::to(['index/courseslist'])?>">
									<div class="alignleft">
										<img src="https://picsum.photos/60/60" alt="image description">
									</div>
									<div class="description-wrap">
										<h4>Swift Programming For Beginners</h4>
										<strong class="price text-primary element-block font-lato text-uppercase">$75.00</strong>
									</div>
								</a>
							</li>
						</ul>
					</div>
					<nav class="col-xs-12 col-sm-6 col-md-3 col">
						<h3>Quick Links</h3>
						<!-- fooer navigation -->
						<ul class="fooer-navigation list-unstyled">
							<li><a href="#">All Courses</a></li>
							<li><a href="#">Summer Sessions</a></li>
							<li><a href="#">Recent Exams</a></li>
							<li><a href="#">Professional Courses</a></li>
							<li><a href="#">Privacy Policy</a></li>
							<li><a href="#">Terms of Use</a></li>
							<li><a href="#">All Courses</a></li>
							<li><a href="#">Contact Us</a></li>
						</ul>
					</nav>
					<div class="col-xs-12 col-sm-6 col-md-3 col">
						<h3>contact us</h3>
						<p>If you want to contact us about any issue our support available to help you 8am-7pm Monday to saturday.</p>
						<!-- ft address -->
						<address class="ft-address">
							<dl>
								<dt><span class="fas fa-map-marker"><span class="sr-only">marker</span></span></dt>
								<dd>Address: 9015 Sunset Boulevard United Kingdom</dd>
								<dt><span class="fas fa-phone-square"><span class="sr-only">phone</span></span></dt>
								<dd>Call: <a href="tel:+2156237532">+ 215 623 7532</a></dd>
								<dt><span class="fas fa-envelope-square"><span class="sr-only">email</span></span></dt>
								<dd>Email: <a href="mailto:info@Studylms.com">info@Studylms.com</a></dd>
							</dl>
						</address>
					</div>
				</div>
			</aside>
			<!-- page footer -->
			<footer id="page-footer" class="font-lato">
				<div class="container">
					<div class="row holder">
						<div class="col-xs-12 col-sm-push-6 col-sm-6">
							<ul class="socail-networks list-unstyled">
								<li><a href="#"><span class="fab fa-facebook"></span></a></li>
								<li><a href="#"><span class="fab fa-twitter"></span></a></li>
								<li><a href="#"><span class="fab fa-instagram"></span></a></li>
								<li><a href="#"><span class="fab fa-linkedin"></span></a></li>
							</ul>
						</div>
						<div class="col-xs-12 col-sm-pull-6 col-sm-6">
							<p><a href="#">Studylms</a> | &copy; 2018 <a href="#">DesignFalls</a>, All rights reserved</p>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<!-- back top of the page -->
		<span id="back-top" class="text-center fa fa-caret-up"></span>
		<!-- loader of the page -->
		<!-- <div id="loader" class="loader-holder">
			<div class="block"><img src="<?=url::to('/images/svg/hearts.svg')?>" width="100" alt="loader"></div>
		</div> -->
	</div>
	<div class="popup-holder">
		<div id="popup1" class="lightbox-demo">
			<form action="#" class="user-log-form">
				<h2>Login Form</h2>
				<div class="form-group">
					<input type="text" class="form-control element-block" placeholder="Username or email address *">
				</div>
				<div class="form-group">
					<input type="password" class="form-control element-block" placeholder="Password *">
				</div>
				<div class="btns-wrap">
					<div class="wrap">
						<label for="rem" class="custom-check-wrap fw-normal font-lato">
							<input type="checkbox" id="rem" class="customFormReset">
							<span class="fake-label element-block">Remember me</span>
						</label>
						<button type="submit" class="btn btn-theme btn-warning fw-bold font-lato text-uppercase">Login</button>
					</div>
					<div class="wrap text-right">
						<p>
							<a href="#" class="forget-link">Lost your Password?</a>
						</p>
					</div>
				</div>
			</form>
		</div>
		<div id="popup2" class="lightbox-demo">
			<form action="#" class="user-log-form">
				<h2>Register Form</h2>
				<div class="form-group">
					<input type="email" class="form-control element-block" placeholder="Email address *">
				</div>
				<div class="form-group">
					<input type="password" class="form-control element-block" placeholder="Password *">
				</div>
				<div class="btns-wrap">
					<div class="wrap">
						<button type="submit" class="btn btn-theme btn-warning fw-bold font-lato text-uppercase">Register</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<?= \lavrentiev\widgets\toastr\NotificationFlash::widget([
    'options' => [
        "closeButton" => true,
        "debug" => false,
        "newestOnTop" => false,
        "progressBar" => false,
        "positionClass" => \lavrentiev\widgets\toastr\NotificationFlash::POSITION_TOP_RIGHT,
        "preventDuplicates" => false,
        "onclick" => null,
        "showDuration" => "300",
        "hideDuration" => "1000",
        "timeOut" => "10000",
        "extendedTimeOut" => "1000",
        "showEasing" => "swing",
        "hideEasing" => "linear",
        "showMethod" => "fadeIn",
        "hideMethod" => "fadeOut"
    ]
]) ?>



    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();?>
