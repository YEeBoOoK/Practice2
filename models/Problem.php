<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\models\User;

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
class Problem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'problem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_problem', 'description_problem', 'user_id', 'category_id', 'photoBefore'], 'required'],
            [['description_problem', 'status'], 'string'],
            [['date'], 'safe'],
            [['user_id', 'category_id'], 'integer'],
            [['name_problem', 'photoBefore', 'photoAfter'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id_category']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id_user']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_problem' => 'Id',
            'name_problem' => 'Название',
            'description_problem' => 'Описание',
            'date' => 'Временная метка',
            'user_id' => 'Пользователь',
            'category_id' => 'Категория',
            'status' => 'Статус',
            'photoBefore' => 'Фото',
            'photoAfter' => 'Фото "После"',
            'reason'=>'Причина отказа',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id_category' => 'category_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id_user' => 'user_id']);
    }
}
