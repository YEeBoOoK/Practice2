<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Problem $model */

$this->title = 'Отклонение заявки';
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="problem-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="problem-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'reason')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-dark']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


</div>
