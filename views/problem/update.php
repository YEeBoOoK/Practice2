<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Problem $model */

$this->title = 'Изменить заявку: №' . $model->id_problem;
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_problem, 'url' => ['view', 'id_problem' => $model->id_problem]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="problem-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
