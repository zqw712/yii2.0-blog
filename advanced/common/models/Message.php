<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property integer $id
 * @property string $content
 * @property integer $status
 * @property integer $create_time
 * @property integer $userid
 *
 * @property User $user
 * @property Messagestatus $status0
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'status', 'userid'], 'required'],
            [['status', 'create_time', 'userid'], 'integer'],
            [['content'], 'string'],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userid' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => Messagestatus::className(), 'targetAttribute' => ['status' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '序号',
            'content' => '留言内容',
            'status' => '状态',
            'create_time' => '留言时间',
            'userid' => '留言者',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(Messagestatus::className(), ['id' => 'status']);
    }

    public function approve()
    {
        $this->status = 2; //设置评论状态为已审核
        return ($this->save()?true:false);
    }

    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert))
        {
            if($insert)
            {
                $this->create_time=time();
            }
            return true;
        }
        else  return false;

    }

    public static function getPengdingMessageCount()
    {
        return Message::find()->where(['status'=>1])->count();
    }

    public static function findRecentMessages($limit=10)
    {
        return Message::find()->where(['status'=>2])->orderBy('create_time DESC')
            ->limit($limit)->all();
    }
}
