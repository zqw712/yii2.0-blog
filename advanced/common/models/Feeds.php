<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "feeds".
 *
 * @property int $id
 * @property int $user_id 用户id
 * @property string $content 内容
 * @property int $created_at 创建时间
 */
class Feeds extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feeds';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'content', 'created_at'], 'required'],
            [['user_id', 'created_at'], 'integer'],
            [['content'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'content' => 'Content',
            'created_at' => 'Created At',
        ];
    }
}
