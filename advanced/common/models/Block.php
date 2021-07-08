<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "block".
 *
 * @property int $id
 * @property string $content
 * @property int $status
 * @property int|null $create_time
 * @property int $userid
 * @property string|null $email
 * @property string|null $url
 * @property int|null $post_id
 * @property int|null $remind 0:未提醒1：已提醒
 */
class Block extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'block';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content', 'status', 'userid'], 'required'],
            [['content'], 'string'],
            [['status', 'create_time', 'userid', 'post_id', 'remind'], 'integer'],
            [['email', 'url'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'status' => 'Status',
            'create_time' => 'Create Time',
            'userid' => 'Userid',
            'email' => 'Email',
            'url' => 'Url',
            'post_id' => 'Post ID',
            'remind' => 'Remind',
        ];
    }
}
