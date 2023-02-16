<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Category $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_category',
            'name',
        ],
    ]) ?>
    
    
    <p>
        <?= Html::a('Редактировать', ['update', 'id_category' => $model->id_category], ['class' => 'btn btn-dark']) ?>
        <?= Html::a('Удалить', ['delete', 'id_category' => $model->id_category], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить данную категорию?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
