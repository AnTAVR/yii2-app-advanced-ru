<?php

namespace tests\codeception\frontend\functional;

use yii;
use tests\codeception\frontend\FunctionalTester;
use tests\codeception\frontend\_pages\ContactPage;
use frontend\models\ContactForm;

/* @var $scenario \Codeception\Scenario */

$contactForm = new ContactForm;

$I = new FunctionalTester($scenario);
$I->wantTo(Yii::t('test', 'ensure that contact works'));

$contactPage = ContactPage::openBy($I);

$I->see(Yii::t('app', 'Contact'), 'h1');

$I->amGoingTo(Yii::t('test', 'submit contact form with no data'));
$contactPage->submit([]);
$I->expectTo(Yii::t('test', 'see validations errors'));
$I->see(Yii::t('app', 'Contact'), 'h1');
$I->see(Yii::t('yii', '{attribute} cannot be blank.', ['attribute' => $contactForm->getAttributeLabel('name')]), '.help-block');
$I->see(Yii::t('yii', '{attribute} cannot be blank.', ['attribute' => $contactForm->getAttributeLabel('email')]), '.help-block');
$I->see(Yii::t('yii', '{attribute} cannot be blank.', ['attribute' => $contactForm->getAttributeLabel('subject')]), '.help-block');
$I->see(Yii::t('yii', '{attribute} cannot be blank.', ['attribute' => $contactForm->getAttributeLabel('body')]), '.help-block');
$I->see(Yii::t('yii', 'The verification code is incorrect.'), '.help-block');

$I->amGoingTo(Yii::t('test', 'submit contact form with not correct email'));
$contactPage->submit([
    'name' => 'tester',
    'email' => 'tester.email',
    'subject' => 'test subject',
    'body' => 'test content',
    'verifyCode' => 'testme',
]);
$I->expectTo(Yii::t('test', 'see that email address is wrong'));
$I->dontSee(Yii::t('yii', '{attribute} cannot be blank.', ['attribute' => $contactForm->getAttributeLabel('name')]), '.help-block');
$I->see(Yii::t('yii', '{attribute} is not a valid email address.', ['attribute' => $contactForm->getAttributeLabel('email')]), '.help-block');
$I->dontSee(Yii::t('yii', '{attribute} cannot be blank.', ['attribute' => $contactForm->getAttributeLabel('subject')]), '.help-block');
$I->dontSee(Yii::t('yii', '{attribute} cannot be blank.', ['attribute' => $contactForm->getAttributeLabel('body')]), '.help-block');
$I->dontSee(Yii::t('yii', 'The verification code is incorrect.'), '.help-block');

$I->amGoingTo(Yii::t('test', 'submit contact form with correct data'));
$contactPage->submit([
    'name' => 'tester',
    'email' => 'tester@example.com',
    'subject' => 'test subject',
    'body' => 'test content',
    'verifyCode' => 'testme',
]);
$I->see(Yii::t('app', 'We will respond to you as soon as possible.'));
