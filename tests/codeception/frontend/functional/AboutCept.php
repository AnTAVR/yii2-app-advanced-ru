<?php

namespace tests\codeception\frontend\functional;

use Yii;
use tests\codeception\frontend\FunctionalTester;
use tests\codeception\frontend\_pages\AboutPage;

/* @var $scenario \Codeception\Scenario */

$I = new FunctionalTester($scenario);
$I->wantTo(Yii::t('test', 'ensure that about works'));
AboutPage::openBy($I);
$I->see(Yii::t('app', 'About'), 'h1');
