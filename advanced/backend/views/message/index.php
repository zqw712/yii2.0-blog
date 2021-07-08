<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '留言审核';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                    'attribute'=>'id',
                    'contentOptions'=>['width'=>'30px'],
                    ],
            [
                    'attribute'=>'content',
                    'value'=>function($model)
                    {
                        $tmpStr=strip_tags($model->content);
                        $tmpLen=mb_strlen($tmpStr);

                        return mb_substr($tmpStr,0,15,'utf-8').(($tmpLen>15)?'...':'');
                    }

                ],
            //'status',
            [
                'attribute'=>'status',
                'value'=>'status0.name',
                'filter'=>\common\models\Messagestatus::find()
                    ->select(['name','id'])
                    ->orderBy('position')
                    ->indexBy('id')
                    ->column(),
                'contentOptions'=>
                    function($model)
                    {
                        return ($model->status==1)?['class'=>'bg-success']:[];
                    }
                ],

            //'create_time:datetime',
            [
                'attribute'=>'create_time',
                'format'=>['date','php:m-d H:i'],
            ],
            //'userid',
            [
                'attribute'=>'user.username',
                'label'=>'留言者',
                'value'=>'user.username',
            ],

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{approve}  {view}  {delete} ',
                'buttons'=>
                    [
                        'approve'=>function($url,$model,$key)
                        {
                            $options=[
                                'title'=>Yii::t('yii', '通过'),
                                'aria-label'=>Yii::t('yii','通过'),
                                'data-confirm'=>Yii::t('yii','审核通过该条留言？'),
                                'data-method'=>'post',
                                'data-pjax'=>'0',
                            ];
                            return Html::a('<span class="glyphicon glyphicon-send"></span>',$url,$options);

                        },
                    ],
            ],
        ],
    ]); ?>
</div>
