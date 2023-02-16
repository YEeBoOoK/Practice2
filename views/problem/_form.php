<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Problem $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="problem-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_problem')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_problem')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'category_id')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Новая' => 'Новая', 'Решена' => 'Решена', 'Отклонена' => 'Отклонена', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'photoBefore')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photoAfter')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-dark']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
