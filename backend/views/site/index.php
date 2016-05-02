<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->name;
?>
<div class="site-index">

    <div class="jumbotron">
        <?= $this->render('@common/views/start-jumbotron.php') ?>
    </div>

    <div class="body-content">

        <div class="row">
            <?= $this->render('@common/views/start-block.php', ['linkText' => Yii::t('start', 'Yii Documentation'),
                'link' => 'http://www.yiiframework.com/doc/']) ?>
            <?= $this->render('@common/views/start-block.php', ['linkText' => Yii::t('start', 'Yii Forum'),
                'link' => 'http://www.yiiframework.com/forum/']) ?>
            <?= $this->render('@common/views/start-block.php', ['linkText' => Yii::t('start', 'Yii Extensions'),
                'link' => 'http://www.yiiframework.com/extensions/']) ?>
        </div>

    </div>
</div>
