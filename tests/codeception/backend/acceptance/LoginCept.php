<?php

namespace tests\codeception\backend\acceptance;

use Yii;
use tests\codeception\backend\AcceptanceTester;
use tests\codeception\common\_pages\LoginPage;
use common\models\LoginForm;

/* @var $scenario \Codeception\Scenario */

$loginForm = new LoginForm;

$I = new AcceptanceTester($scenario);
$I->wantTo(Yii::t('test', 'ensure login page works'));

$loginPage = LoginPage::openBy($I);

$I->amGoingTo(Yii::t('test', 'submit login form with no data'));
$loginPage->login('', '');
if (method_exists($I, 'wait')) {
    $I->wait(3); // only for selenium
}
$I->expectTo(Yii::t('test', 'see validations errors'));
$I->see(Yii::t('yii', '{attribute} cannot be blank.', ['attribute' => $loginForm->getAttributeLabel('username')]), '.help-block');
$I->see(Yii::t('yii', '{attribute} cannot be blank.', ['attribute' => $loginForm->getAttributeLabel('password')]), '.help-block');

$I->amGoingTo(Yii::t('test', 'try to login with wrong credentials'));
$I->expectTo(Yii::t('test', 'see validations errors'));
$loginPage->login('admin', 'wrong1');
if (method_exists($I, 'wait')) {
    $I->wait(3); // only for selenium
}
$I->expectTo(Yii::t('test', 'see validations errors'));
$I->see(Yii::t('app', 'Incorrect username or password.'), '.help-block');

$I->amGoingTo(Yii::t('test', 'try to login with correct credentials'));
$loginPage->login('erau', 'password_0');
if (method_exists($I, 'wait')) {
    $I->wait(3); // only for selenium
}
$I->expectTo(Yii::t('test', 'see that user is logged'));
$I->see(Yii::t('app', 'Logout ({username})', ['username' => 'erau']), 'form button[type=submit]');
$I->dontSeeLink(Yii::t('app', 'Login'));
$I->dontSeeLink(Yii::t('app', 'Signup'));
/** Uncomment if using WebDriver
 * $I->click(Yii::t('app', 'Logout ({username})', ['username' => 'erau']);
 * $I->dontSeeLink(Yii::t('app', 'Logout ({username})', ['username' => 'erau']);
 * $I->seeLink(Yii::t('app', 'Login'));
 */
