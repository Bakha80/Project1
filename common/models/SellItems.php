<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sell_items".
 *
 * @property integer $id
 * @property integer $sell_id
 * @property integer $item_id
 *
 * @property Items $item
 * @property Sells $sell
 */
class SellItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sell_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sell_id', 'item_id'], 'required'],
            [['sell_id', 'item_id'], 'integer'],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Items::className(), 'targetAttribute' => ['item_id' => 'id']],
            [['sell_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sells::className(), 'targetAttribute' => ['sell_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sell_id' => 'Sell ID',
            'item_id' => 'Item ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Items::className(), ['id' => 'item_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSell()
    {
        return $this->hasOne(Sells::className(), ['id' => 'sell_id']);
    }
}
