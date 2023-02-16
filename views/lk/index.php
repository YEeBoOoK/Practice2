<?php

use app\models\Problem;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProblemSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Личный кабинет';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="problem-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать заявку', ['create'], ['class' => 'btn btn-dark']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id_problem',
            'date',
            'name_problem',
            'description_problem:ntext',
            // ['attribute' => 'Категория', 'value' => function($data){return $data->getCategory()->One()->name;}],
            [
                'attribute' => 'Категория', 
                'value' => 'category.name',
            ],
            'status',
            //'user_id',
            //'category_id',
            //'photoBefore',
            //'photoAfter',


            [
                'class' => 'yii\grid\ActionColumn', 
                'template' => '{view} {delete}',

                'urlCreator' => function ($action, Problem $model, $key, $index) 
                {
                    return Url::toRoute([$action, 'id_user' => $model->id_problem]);
                }
            ]
        ],
    ]); ?>


</div>
