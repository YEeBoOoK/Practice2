<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Problem $model */

$this->title = $model->id_problem;
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="problem-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id_problem' => $model->id_problem], ['class' => 'btn btn-dark']) ?>
        <?= Html::a('Удалить', ['delete', 'id_problem' => $model->id_problem], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить данную заявку?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_problem',
            'name_problem',
            'description_problem:ntext',
            'date',
            'user_id',
            'category_id',
            'status',
            'photoBefore',
            'photoAfter',
        ],
    ]) ?>

</div>
