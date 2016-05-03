<?php

namespace tests\codeception\frontend\functional;

use Yii;
use tests\codeception\frontend\_pages\SignupPage;
use common\models\User;
use frontend\models\SignupForm;

class SignupCest
{

    /**
     * This method is called before each cest class test method
     * @param \tests\codeception\frontend\FunctionalTester $I
     */
    public function _before($I)
    {
    }

    /**
     * This method is called after each cest class test method, even if test failed.
     * @param \tests\codeception\frontend\FunctionalTester $I
     */
    public function _after($I)
    {
        //reload default fixtures
        $I->loadFixtures();
    }

    /**
     * This method is called when test fails.
     * @param \tests\codeception\frontend\FunctionalTester $I
     */
    public function _failed($I)
    {

    }

    /**
     *
     * @param \tests\codeception\frontend\FunctionalTester $I
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

        $I->amGoingTo(Yii::t('test', 'submit signup form with not correct email'));
        $signupPage->submit([
            'username' => 'tester',
            'email' => 'tester.email',
            'password' => 'tester_password',
        ]);

        $I->expectTo(Yii::t('test', 'see that email address is wrong'));
        $I->dontSee(Yii::t('yii', '{attribute} cannot be blank.', ['attribute' => $signupForm->getAttributeLabel('username')]), '.help-block');
        $I->dontSee(Yii::t('yii', '{attribute} cannot be blank.', ['attribute' => $signupForm->getAttributeLabel('password')]), '.help-block');
        $I->see(Yii::t('yii', '{attribute} is not a valid email address.', ['attribute' => $signupForm->getAttributeLabel('email')]), '.help-block');

        $I->amGoingTo(Yii::t('test', 'submit signup form with correct email'));
        $signupPage->submit([
            'username' => 'tester',
            'email' => 'tester.email@example.com',
            'password' => 'tester_password',
        ]);

        $I->expectTo(Yii::t('test', 'see that user is created'));
        $I->seeRecord('common\models\User', [
            'username' => 'tester',
            'email' => 'tester.email@example.com',
        ]);

        $I->expectTo(Yii::t('test', 'see that user logged in'));
        $I->see(Yii::t('app', 'Logout ({username})', ['username' => 'tester']), 'form button[type=submit]');
    }
}
