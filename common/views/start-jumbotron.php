<?php
use yii\helpers\Html;

/* @var $this yii\web\View */

?>

<h1><?= Yii::t('start', 'Congratulations!') ?></h1>

<p class="lead"><?= Yii::t('start', 'You have successfully created your Yii-powered application.') ?></p>

<p><?= Html::a(Yii::t('start', 'Get started with Yii'),
        'http://www.yiiframework.com',
        ['class' => 'btn btn-lg btn-success', 'target' => '_blank']) ?></p>
