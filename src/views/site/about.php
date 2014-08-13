<?php
use yii\helpers\Html;
use yii\helpers\Image;

/**
 * @var yii\web\View $this
 */
$this->title = 'About our company PHPCAVE';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h3><?= Html::encode($this->title) ?></h3>

    <p>
       Our company prepares professionals in PHP. Each our student when ended our courses will take diplom a PHPCAVE worker.
    </p>

	<p><img src="assets\image\php-dummies.jpg" height="120px" width="120px"> Our company logo</p>
    <!--code><?= __FILE__ ?></code>-->
</div>
