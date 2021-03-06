<?php
use app\models\Coursescategory;
use SebastianBergmann\CodeCoverage\Report\PHP;
use yii\bootstrap4\LinkPager;
use yii\helpers\Url;
use yii\widgets\ListView;

$this->title = "Cours list";
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = $this->title;
$categorys = Coursescategory::find()->all();



?>

		<div id="two-columns" class="container">
				<div class="row">
					<!-- content -->
					<article id="content" class="col-xs-12 col-md-9">
						<!-- show head -->
						<!-- <header class="show-head">
							<p> Showing 1–9 of 15 results</p>
							<select  class="chosen-select-no-single">
								<?php foreach($categorys as $categry){ ?>
								<option value="<?=$categry->id?>"><?=$categry->title?></option>
								<?php } ?>
							</select>
						</header> -->
						<div class="row flex-wrap">
							

						<?php
							echo ListView::widget([
								'dataProvider' => $courses,
								'itemView' => 'course_item',
								'layout' => "'<div class='row'>{items}</div>\n'",
								'itemOptions' => [
									'tag' => false
								]
							]);
					?>

						</div>
					
						<?php
						echo LinkPager::widget([
							'pagination' => $courses->pagination,
							'options' => [
									'class' => 'page-numbers'
							],
							'disableCurrentPageButton' => true
						]);
           			 ?>

					</article>
					<!-- sidebar -->
					<aside class="col-xs-12 col-md-3" id="sidebar">
						<!-- widget search -->
						<section class="widget widget_search">
							<h3>Course Search</h3>
							<!-- search form -->
							<form class="search-form">
								<fieldset>
									<input placeholder=" Search&hellip;" class="form-control" name="s" type="search" value="<?=isset($_GET['s'])?$_GET['s']:''?>">
									<button type="button" class="fas fa-search"><span class="sr-only">search</span></button>
								</fieldset>
							</form>
						</section>
						<!-- widget categories -->
						<?php
							include_once __DIR__.'/categoryfunc.php';
						?>
						<!-- widget intro -->
						<section class="widget widget_intro">
							<h3>Course Intro</h3>
							<div class="aligncenter overlay">
								<a href="http://www.youtube.com/embed/9bZkp7q19f0?autoplay=1" class="btn-play far fa-play-circle lightbox fancybox.iframe"></a>
								<img src="http://picsum.photos/262/220" alt="image description">
							</div>
						</section>
						<!-- widget popular posts -->
						<section class="widget widget_popular_posts">

						<?php
							include_once "populacours.php";
						?>
						
					</section>
					</aside>
				</div>
			</div>