<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Offers */

$this->title = $model->operator;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Offers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offers-view">

    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>-->
<!--        --><?//= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--        --><?//= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
//                'method' => 'post',
//            ],
//        ]) ?>
<!--    </p>-->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'operator',
            'spo',
            'date',
            'tour:ntext',
            'adl',
            'chd',
            'inf',
            'currency',
            'country',
        ],
    ]) ?>
    <h1>Hotels</h1>
    <?
    foreach($modelHotels as $modelHotel){
   echo DetailView::widget([
        'model' => $modelHotel,
        'attributes' => [

            'beg',
            'end',
            'name',
            'htc',
            'star',
            'room',
            'rmc',
            'place',
            'plc',
            'meal',
            'mlc',
            'town',
            'cnt',
        ],
    ]);
    }
    echo '<h1>Transports</h1>';
    foreach($modelTransports as $modelTransport){
    echo  DetailView::widget([
        'model' => $modelTransport,
        'attributes' => [

            'beg',
            'end',
            'type',
            'name',
            'trc',
            'class',
            'place',
            'townfr',
            'townto',
            'cnt',
        ],
    ]);
}    echo '<h1>Services</h1>';
    foreach($modelServices as $modelService){
    echo  DetailView::widget([
        'model' => $modelService,
        'attributes' => [

            'beg',
            'end',
            'type',
            'name',
            'cnt',
        ],
    ]);
}    echo '<h1>Prices</h1>';
    foreach($modelPrises as $modelPrise){
    echo  DetailView::widget([
        'model' => $modelPrise,
        'attributes' => [

            'idn',
            'date',
            'n',
            'val',
        ],
    ]);
} ?>
</div>
