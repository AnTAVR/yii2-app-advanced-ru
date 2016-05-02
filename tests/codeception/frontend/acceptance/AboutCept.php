<?php

namespace tests\codeception\frontend\acceptance;

use yii;
use tests\codeception\frontend\AcceptanceTester;
use tests\codeception\frontend\_pages\AboutPage;

/* @var $scenario \Codeception\Scenario */

$I = new AcceptanceTester($scenario);
$I->wantTo('ensure that about works');
AboutPage::openBy($I);
$I->see(Yii::t('app', 'About'), 'h1');
