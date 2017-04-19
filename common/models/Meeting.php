<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "meeting".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $for_date
 * @property string $with_who
 * @property string $description
 *
 * @property User $user
 */
class Meeting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'meeting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'with_who', 'description'], 'required'],
            [['user_id'], 'integer'],
            [['for_date'], 'safe'],
            [['with_who'], 'string', 'max' => 30],
            [['description'], 'string', 'max' => 1023],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'for_date' => 'For Date',
            'with_who' => 'With Who',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
