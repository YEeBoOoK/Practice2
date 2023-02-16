<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Problem $model */

$this->title = $model->name_problem;
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="problem-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <?= Html::a('Update', ['update', 'id_problem' => $model->id_problem], ['class' => 'btn btn-dark']) ?>
        <?= Html::a('Delete', ['delete', 'id_problem' => $model->id_problem], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить данную запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p> -->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_problem',
            'name_problem',
            'description_problem:ntext',
            'date',
            //'user_id',
            [
                'attribute' => 'Категория',
                'value' => function ($data) {
                return $data->getCategory()->One()->name;
            }
            ],
            'status',
            [
                 'attribute'=>'Фото "До"', 
                 'format'=>'html',
                 'value'=>function($data){
                     return"<img src='/web/uploads/{$data->photoBefore}' alt='Фото до' style='height: 100%; min-height: 150px; max-height: 200px;'>";
             }],

             [
                'attribute'=>'Фото "После"', 
                'format'=>'html',
                'value'=>function($data){
                    return"<img src='/web/uploads/{$data->photoAfter}' alt='Фото после' style='height: 100%; min-height: 150px; max-height: 200px;'>";
            }],
            'reason',
        ],
    ]) ?>

</div>
