<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HotelsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hotels-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'beg') ?>

    <?= $form->field($model, 'end') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'htc') ?>

    <?php // echo $form->field($model, 'star') ?>

    <?php // echo $form->field($model, 'room') ?>

    <?php // echo $form->field($model, 'rmc') ?>

    <?php // echo $form->field($model, 'place') ?>

    <?php // echo $form->field($model, 'plc') ?>

    <?php // echo $form->field($model, 'meal') ?>

    <?php // echo $form->field($model, 'mlc') ?>

    <?php // echo $form->field($model, 'town') ?>

    <?php // echo $form->field($model, 'cnt') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
