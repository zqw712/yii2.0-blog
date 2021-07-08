<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "disscuss".
 *
 * @property int $id
 * @property string|null $contents
 * @property string $email
 */
class Disscuss extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'disscuss';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'email'], 'required'],
            [['id'], 'integer'],
            [['contents'], 'string'],
            [['email'], 'string', 'max' => 128],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'contents' => 'Contents',
            'email' => 'Email',
        ];
    }
}
