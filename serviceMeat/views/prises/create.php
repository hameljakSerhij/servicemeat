<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Prises */

$this->title = Yii::t('app', 'Create Prises');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Prises'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prises-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
