<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Problem $model */

$this->title = 'Решиаем заявку';
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="problem-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="problem-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'photoAfter')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-dark']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


</div>
