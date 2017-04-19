<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "message_attachment".
 *
 * @property integer $id
 * @property integer $message_id
 * @property string $file_type
 * @property string $file_url
 *
 * @property Messages $message
 */
class MessageAttachment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message_attachment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message_id', 'file_type', 'file_url'], 'required'],
            [['message_id'], 'integer'],
            [['file_type'], 'string', 'max' => 10],
            [['file_url'], 'string', 'max' => 255],
            [['message_id'], 'exist', 'skipOnError' => true, 'targetClass' => Messages::className(), 'targetAttribute' => ['message_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'message_id' => 'Message ID',
            'file_type' => 'File Type',
            'file_url' => 'File Url',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessage()
    {
        return $this->hasOne(Messages::className(), ['id' => 'message_id']);
    }
}
