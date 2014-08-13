<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\Experement $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="experement-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- = $form->field($model, 'data')->textInput(['maxlength' => 30])

    = $form->field($model, 'time')->textInput(['maxlength' => 30]) -->

    <?= $form->field($model, 'name')->textInput(['maxlength' => 30]) ?>

    <!-- = $form->field($model, 'bones_num')->textInput(['maxlength' => 30]) -->

    <?= $form->field($model, 'throws')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
