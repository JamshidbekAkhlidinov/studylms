<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = $this->title;

?>

    <section class="contact-block">
				<div class="container">
					<header class="seperator-head text-center">
						<h2>Contact Details</h2>
						<p>Welcome to our Website. We are glad to have you around.</p>
					</header>
					<div class="row">
						<div class="col-xs-12 col-sm-4">
							<!-- detail column -->
							<div class="detail-column">
								<span class="icn-wrap no-shrink element-block">
									<img src="<?=url::to('/images/icon11.png')?>" alt="icon">
								</span>
								<div class="descr-wrap">
									<h3 class="text-uppercase">give us a call</h3>
									<p><a href="tel:+618006592684">+61 (800) 659-2684</a>, <a href="tel:+618006595214">+61 (800) 659-5214</a></p>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4">
							<!-- detail column -->
							<div class="detail-column">
								<span class="icn-wrap no-shrink element-block">
									<img src="<?=url::to('/images/icon12.png')?>" alt="icon">
								</span>
								<div class="descr-wrap">
									<h3 class="text-uppercase">send us a message</h3>
									<p><a href="mailto:Exampleid@cyberlms.com">Exampleid@cyberlms.com</a></p>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4">
							<!-- detail column -->
							<div class="detail-column">
								<span class="icn-wrap no-shrink element-block">
									<img src="<?=url::to('/images/icon13.png')?>" alt="icon">
								</span>
								<div class="descr-wrap">
									<h3 class="text-uppercase">visit our location</h3>
									<p>9015 Sunset Boulevard United Kingdom</p>
								</div>
							</div>
						</div>
					</div>
					<hr class="sep-or element-block" data-text="or">
					<!-- contact form -->
					<?php $form = ActiveForm::begin(['options'=>['class'=>'contact-form']])?>
						<h3 class="text-center">Drop Us a Message</h3>
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<?=$form->field($model,'name')->textInput()?>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<!-- <input type="email" class="form-control element-block" placeholder="Email"> -->
								<?=$form->field($model,'email')->textInput()?>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="form-group">
									<!-- <textarea class="form-control element-block" placeholder="Message"></textarea> -->
									<?=$form->field($model,'message')->textarea(['class'=>'form-control element-block'])?>

								</div>
							</div>
						</div>
						<div class="text-center">
							<button type="submit" class="btn btn-theme btn-warning text-uppercase font-lato fw-bold">send message</button>
						</div>
					<?php ActiveForm::end()?>
				</div>
				<!-- mapHolder -->
				<div class="mapHolder">
					<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d13607.729903367896!2d74.30893281977539!3d31.498539800000007!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1530737870558" style="border:0" allowfullscreen="" width="100%" height="400" frameborder="0"></iframe>
					<span class="mapMarker">
						<img src="<?=url::to('/images/map-marker.png')?>" alt="marker">
					</span>
				</div>
				<!-- btn aside block -->
				<aside class="btn-aside-block container">
					<div class="row">
						<div class="col-xs-12 col-sm-8 col">
							<h3>Have Any Questions?</h3>
							<p>Various versions years, sometimes by accident, sometimes on purpose</p>
						</div>
						<div class="col-xs-12 col-sm-4 text-right col">
							<a href="#" class="btn btn-warning btn-theme text-capitalize font-lato fw-normal">Ask Question Now</a>
						</div>
					</div>
				</aside>
			</section>