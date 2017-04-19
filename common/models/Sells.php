<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sells".
 *
 * @property integer $id
 * @property string $sell_date
 * @property integer $client_id
 * @property integer $manager_id
 * @property integer $status_id
 *
 * @property SellItems[] $sellItems
 * @property Statuses $status
 * @property User $client
 * @property User $manager
 */
class Sells extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sells';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sell_date'], 'safe'],
            [['client_id', 'manager_id', 'status_id'], 'required'],
            [['client_id', 'manager_id', 'status_id'], 'integer'],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Statuses::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['client_id' => 'id']],
            [['manager_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['manager_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sell_date' => 'Sell Date',
            'client_id' => 'Client ID',
            'manager_id' => 'Manager ID',
            'status_id' => 'Status ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSellItems()
    {
        return $this->hasMany(SellItems::className(), ['sell_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Statuses::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(User::className(), ['id' => 'client_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManager()
    {
        return $this->hasOne(User::className(), ['id' => 'manager_id']);
    }
}
