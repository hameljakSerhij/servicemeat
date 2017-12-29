<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OffersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="offers-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?//= $form->field($model, 'id') ?>

    <?= $form->field($model, 'operator') ?>

    <?= $form->field($model, 'spo') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'tour') ?>

    <?= $form->field($model, 'adl') ?>

    <?= $form->field($model, 'chd') ?>

    <?= $form->field($model, 'inf') ?>

    <?= $form->field($model, 'currency') ?>

    <?= $form->field($model, 'country') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
