<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::t('app', 'About');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= Yii::t('start', 'This is the About page.') ?>
        <?= Yii::t('start', 'You may modify the following file to customize its content:') ?></p>

    <code><?= __FILE__ ?></code>
</div>
