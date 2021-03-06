<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->params['title'] = 'xabarlar';


/* @var $this yii\web\View */
/* @var $model common\models\Xabarlar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="xabarlar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'text')->textarea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
