<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var app\models\Experement $model
 */
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Experements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="experement-view">

    <h1> Name : <?= Html::encode($this->title) ?> Experiment №: <?= Html::encode($model->id_exp) ?></h1>

    <p>
        <?= Html::a('Update Experement', ['update', 'id' => $model->id_exp], ['class' => 'btn btn-primary']) ?>
    You can update Experement</p>
    <p>
        <?=
        Html::a('Delete Experement', ['delete', 'id' => $model->id_exp], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
                ],
        ])
        ?>
    You can delete Experement</p>
    <p>
        <?= Html::a('Show all Resuts', ['show-results'], ['class' => 'btn btn-primary']) ?>
    You can go to page with all Resalts</p>

        <h2> View results your experiment </h2>
        <?= GridView::widget([
    'dataProvider' => $resultsProvider,
    'columns' => [
        'num',
        'count',
        [
            'attribute' => 'percentage',
            'format' => ['percent'],
        ],
    ],
]) ?>
</div>
