<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ProblemSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="problem-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_problem') ?>

    <?= $form->field($model, 'name_problem') ?>

    <?= $form->field($model, 'description_problem') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'category_id') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'photoBefore') ?>

    <?php // echo $form->field($model, 'photoAfter') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-dark']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
