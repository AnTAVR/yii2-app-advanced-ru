<?php

namespace tests\codeception\frontend\acceptance;

use Yii;
use tests\codeception\frontend\AcceptanceTester;

/* @var $scenario \Codeception\Scenario */

$I = new AcceptanceTester($scenario);
$I->wantTo(Yii::t('test', 'ensure that home page works'));
$I->amOnPage(Yii::$app->homeUrl);
$I->see(Yii::$app->params['brandLabel']);
$I->seeLink(Yii::t('app', 'About'));
$I->click(Yii::t('app', 'About'));
$I->see(Yii::t('app', 'About'), 'h1');
