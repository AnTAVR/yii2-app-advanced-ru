<?php

namespace tests\codeception\frontend\functional;

use yii;
use tests\codeception\frontend\FunctionalTester;

/* @var $scenario \Codeception\Scenario */

$I = new FunctionalTester($scenario);
$I->wantTo(Yii::t('test', 'ensure that home page works'));
$I->amOnPage(Yii::$app->homeUrl);
$I->see('My Company');
$I->seeLink(Yii::t('app', 'About'));
$I->click(Yii::t('app', 'About'));
$I->see(Yii::t('app', 'About'), 'h1');
