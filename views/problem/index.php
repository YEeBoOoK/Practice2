<?php

use app\models\Problem;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProblemSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="problem-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <?= Html::a('Добавить проблему', ['create'], ['class' => 'btn btn-durk']) ?>
    </p> -->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_problem',
            'name_problem',
            'description_problem:ntext',
            'date',
            //'user_id',
            //'category_id',
            'status',
            //'photoBefore',
            //'photoAfter',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{cancel} {solve}',
                'buttons' => [
                    'cancel' => function ($url, $model) {
                        if ($model -> status == 'Новая') {
                            return Html::a('Отклонить', ['/problem/cancel', 'id_problem'=>$model->id_problem]);
                        }
                    },

                    'solve' => function ($url, $model) {
                        if ($model -> status == 'Новая') {
                            return Html::a('Решить', ['/problem/solve', 'id_problem'=>$model->id_problem]);
                        }
                    },
                ],
            ],
        ],
    ]); ?>


</div>
