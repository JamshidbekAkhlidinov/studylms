<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->params['title'] = 'coursescategory';

/* @var $this yii\web\View */
/* @var $model app\models\CoursesCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="courses-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
