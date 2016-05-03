<?php

namespace tests\codeception\common\_pages;

use yii\codeception\BasePage;
use common\models\LoginForm;

/**
 * Represents loging page
 * @property \tests\codeception\frontend\AcceptanceTester|\tests\codeception\frontend\FunctionalTester|\tests\codeception\backend\AcceptanceTester|\tests\codeception\backend\FunctionalTester $actor
 */
class LoginPage extends BasePage
{
    public $route = 'site/login';

    /**
     * @param string $username
     * @param string $password
     * @param string $verifyCode
     */
    public function login($username, $password, $verifyCode)
    {
        $loginForm = new LoginForm;

        $this->actor->fillField('input[name="' . $loginForm->formName() . '[username]"]', $username);
        $this->actor->fillField('input[name="' . $loginForm->formName() . '[password]"]', $password);
        $this->actor->fillField('input[name="' . $loginForm->formName() . '[verifyCode]"]', $verifyCode);
        $this->actor->click('login-button');
    }
}
