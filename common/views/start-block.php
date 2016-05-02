<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $link string */
/* @var $linkText string */
?>

<div class="col-lg-4">
    <h2><?= Yii::t('start', 'Heading') ?></h2>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
        fugiat nulla pariatur.</p>

    <p><?= Html::a($linkText . ' &raquo;', $link, ['class' => 'btn btn-default', 'target' => '_blank']) ?></p>
</div>
