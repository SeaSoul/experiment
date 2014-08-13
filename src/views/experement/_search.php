<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\search\ExperementSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="experement-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_exp') ?>

    <?= $form->field($model, 'data') ?>

    <?= $form->field($model, 'time') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'bones_num') ?>

    <?php // echo $form->field($model, 'throws') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
