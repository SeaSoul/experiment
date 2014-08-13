<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Experement $model
 */

$this->title = 'Update Experement: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Experements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id_exp]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="experement-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
