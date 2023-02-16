<?php

namespace app\models;

use Yii;
use yii\base\Model;


/**
 * This is the model class for table "category".
 *
 * @property int $id_category
 * @property string $name
 *
 * @property Problem[] $problems
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_category' => 'Идентификатор',
            'name' => 'Название категории',
        ];
    }

    /**
     * Gets query for [[Problems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProblems()
    {
        return $this->hasMany(Problem::class, ['category_id' => 'id_category']);
    }
}
