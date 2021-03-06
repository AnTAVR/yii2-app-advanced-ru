<?php

namespace tests\codeception\frontend\acceptance;

use Yii;
use tests\codeception\frontend\_pages\SignupPage;
use common\models\User;
use frontend\models\SignupForm;

class SignupCest
{

    /**
     * This method is called before each cest class test method
     * @param \Codeception\Event\TestEvent $event
     */
    public function _before($event)
    {
    }

    /**
     * This method is called after each cest class test method, even if test failed.
     * @param \Codeception\Event\TestEvent $event
     */
    public function _after($event)
    {
        User::deleteAll([
            'email' => 'tester.email@example.com',
            'username' => 'tester',
        ]);
    }

    /**
     * This method is called when test fails.
     * @param \Codeception\Event\FailEvent $event
     */
    public function _fail($event)
    {
    }

    /**
     * @param \tests\codeception\frontend\AcceptanceTester $I
     * @param \Codeception\Scenario $scenario
     */
    public function testUserSignup($I, $scenario)
    {
        $signupForm = new SignupForm();

        $I->wantTo(Yii::t('test', 'ensure that signup works'));

        $signupPage = SignupPage::openBy($I);
        $I->see(Yii::t('app', 'Signup'), 'h1');
        $I->see(Yii::t('app', 'Please fill out the following fields to signup:'));

        $I->amGoingTo(Yii::t('test', 'submit signup form with no data'));

        $signupPage->submit([]);

        $I->expectTo(Yii::t('test', 'see validations errors'));
        $I->see(Yii::t('yii', '{attribute} cannot be blank.', ['attribute' => $signupForm->getAttributeLabel('username')]), '.help-block');
        $I->see(Yii::t('yii', '{attribute} cannot be blank.', ['attribute' => $signupForm->getAttributeLabel('email')]), '.help-block');
        $I->see(Yii::t('yii', '{attribute} cannot be blank.', ['attribute' => $signupForm->getAttributeLabel('password')]), '.help-block');
        $I->see(Yii::t('yii', '{attribute} cannot be blank.', ['attribute' => $signupForm->getAttributeLabel('password_repeat')]), '.help-block');
        $I->see(Yii::t('yii', 'The verification code is incorrect.'), '.help-block');

        $I->amGoingTo(Yii::t('test', 'submit signup form with not correct email'));
        $signupPage->submit([
            'username' => 'tester',
            'email' => 'tester.email',
            'password' => 'tester_password',
            'password_repeat' => 'tester_password',
            'verifyCode' => 'testme',
        ]);

        $I->expectTo(Yii::t('test', 'see that email address is wrong'));
        $I->dontSee(Yii::t('yii', '{attribute} cannot be blank.', ['attribute' => $signupForm->getAttributeLabel('username')]), '.help-block');
        $I->dontSee(Yii::t('yii', '{attribute} cannot be blank.', ['attribute' => $signupForm->getAttributeLabel('password')]), '.help-block');
        $I->dontSee(Yii::t('yii', '{attribute} cannot be blank.', ['attribute' => $signupForm->getAttributeLabel('password_repeat')]), '.help-block');
        $I->see(Yii::t('yii', '{attribute} is not a valid email address.', ['attribute' => $signupForm->getAttributeLabel('email')]), '.help-block');
        $I->dontSee(Yii::t('yii', 'The verification code is incorrect.'), '.help-block');

        $I->amGoingTo(Yii::t('test', 'submit signup form with correct email'));
        $signupPage->submit([
            'username' => 'tester',
            'email' => 'tester.email@example.com',
            'password' => 'tester_password',
            'password_repeat' => 'tester_password',
            'verifyCode' => 'testme',
        ]);

        $I->expectTo(Yii::t('test', 'see that user logged in'));
        $I->see(Yii::t('app', 'Logout ({username})', ['username' => 'tester']), 'form button[type=submit]');
    }
}
