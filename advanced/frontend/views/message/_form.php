<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Message */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="message-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model,'userid')
        ->dropDownList(\common\models\User::find()
            ->select(['username','id'])
            ->indexBy('id')
            ->column(),
            ['prompt'=>'请选择作者']);?>





    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '提交留言' : 'update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
