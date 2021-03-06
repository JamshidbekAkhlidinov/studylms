<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Coment */

$this->title = 'Update Coment: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Coments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="coment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
