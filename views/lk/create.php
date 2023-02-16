<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Problem $model */

$this->title = 'Создание заявки';
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="problem-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="problem-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); 
    
    
    $li=[];
    $categories = \app\models\Category::find()->all();
    foreach ($categories as $category)
    { 
        $li[$category->id_category]=$category->name; 
    }

    ?>

    

    <?= $form->field($model, 'name_problem')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_problem')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'category_id')->dropDownList($li) ?>

    <?= $form->field($model, 'photoBefore')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-dark']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
