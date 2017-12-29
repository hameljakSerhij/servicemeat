<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TransportsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transports-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'beg') ?>

    <?= $form->field($model, 'end') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'trc') ?>

    <?php // echo $form->field($model, 'class') ?>

    <?php // echo $form->field($model, 'place') ?>

    <?php // echo $form->field($model, 'townfr') ?>

    <?php // echo $form->field($model, 'townto') ?>

    <?php // echo $form->field($model, 'cnt') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
