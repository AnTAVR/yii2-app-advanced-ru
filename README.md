Yii 2 Улучшенный шаблон проекта
===============================

Yii 2 Улучшенный шаблон проекта это скелет [Yii 2](http://www.yiiframework.com/) приложения, лучше всего подходит для
 разработки сложных веб-приложений с несколькими уровнями.

Шаблон включает в себя три уровня: пользовательский (front end), административный (back end) и консольный (console),
 каждый из которых является отдельным приложением Yii.

Шаблон предназначен для командной разработки. Поддерживает развертывание приложения в различных средах.

Документация [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://poser.pugx.org/yiisoft/yii2-app-advanced/v/stable.png)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://poser.pugx.org/yiisoft/yii2-app-advanced/downloads.png)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-advanced.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-advanced)

Структура директорий
-------------------

```
common
    assets/              содержит общие прикладные средства, такие как JavaScript и CSS
    config/              содержит общую конфигурацию
    mail/                содержит файлы представлений для e-mails
    models/              содержит общие классы моделей
    widgets/             содержит общие виджеты
    messages/            содержит файлы с переводами
console
    config/              содержит конфигурацию для консольного приложения
    controllers/         содержит контроллеры (команды) консольного приложения
    migrations/          содержит миграции базы данных
    models/              содержит классы моделей только для консольного приложения
    runtime/             содержит файлы, созданные во время выполнения
backend
    assets/              содержит прикладные средства, такие как JavaScript и CSS
    config/              содержит конфигурацию административного приложения
    controllers/         содержит классы веб-контроллеров
    models/              содержит классы моделей только для административного приложения
    runtime/             содержит файлы, созданные во время выполнения
    views/               содержит файлы представлений для веб-приложения
    web/                 содержит входной скрипт и веб-ресурсы
frontend
    assets/              содержит прикладные средства, такие как JavaScript и CSS
    config/              содержит конфигурацию пользовательского приложения
    controllers/         содержит классы веб-контроллеров
    models/              содержит классы моделей только для пользовательского приложения
    runtime/             содержит файлы, созданные во время выполнения
    views/               содержит файлы представлений для веб-приложения
    web/                 содержит входной скрипт и веб-ресурсы
vendor/                  содержит зависимые пакеты
environments/            содержит предопределенные среды
tests                    содержит различные тесты
    codeception/         содержит тесты, разработанные с Codeception PHP Testing Framework
```
