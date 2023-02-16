<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "problem".
 *
 * @property int $id_problem
 * @property string $name_problem
 * @property string $description_problem
 * @property string $date
 * @property int $user_id
 * @property int $category_id
 * @property string $status
 * @property string $photoBefore
 * @property string|null $photoAfter
 *
 * @property Category $category
 * @property User $user
 */
class ProblemSolveForm extends Problem
{ 
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['photoAfter'], 'required'],
            [['photoAfter'], 'file', 'extensions' => 'png, jpg, jpeg, bmp', 'maxSize' => 10*1024*1024],
            // [['name_problem', 'description_problem', 'category_id', 'photoBefore'], 'required'],
            // [['description_problem', 'status'], 'string'],
            // [['date'], 'safe'],
            // [['user_id', 'category_id'], 'integer'],
            // [['photoBefore'], 'file', 'extensions' => 'png, jpg, jpeg, bmp', 'maxSize' => 10*1024*1024],
            // [['name_problem', 'photoBefore', 'photoAfter'], 'string', 'max' => 255],
            // [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id_category']],
            // [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id_user']],
        ];
    }
}