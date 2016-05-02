Этот каталог содержит различные тесты.

Тесты в каталоге `codeception` разработаны с помощью [Codeception PHP Testing Framework](http://codeception.com/).

После создания и настройки приложения, выполните следующие действия для подготовки к тестам:

1. Установите Codeception, если он еще не установлен:

   ```
   composer global require "codeception/codeception=2.1.*" "codeception/specify=*" "codeception/verify=*"
   ```

   Если вы никогда не использовали Composer для глобальных пакетов запустите `composer global status`. должно вывести:

   ```
   Changed current directory to <directory>
   ```

   Затем добавьте `<directory>/vendor/bin` в Вашу переменную окружения `PATH`. Теперь вы можете использовать `codecept`
   из командной строки в глобальном масштабе.

2. Установите расширение faker выполнив следующие из корневого каталога с `composer.json`:

   ```
   composer require --dev yiisoft/yii2-faker:*
   ```

3. Создайте базу данных для тестов, настройте `components['db']` в `tests/codeception/config/config-local.php`,
   затем обновите применив миграцию:

   ```
   codeception/bin/yii migrate
   ```

4. Для того, чтобы иметь возможность запускать приемочные тесты вам нужно запустить веб-сервер.
   Самый простой способ заключается в использовании PHP встроенный в веб-сервер.
   В корневом каталоге с `common`, `frontend` и др. выполните следующее:

   ```
   php -S localhost:8080
   ```

5. Теперь вы можете запустить тесты с помощью следующих команд, предполагая, что вы находитесь в `tests/codeception` каталоге:

   ```
   # frontend tests
   cd frontend
   codecept build
   codecept run
   
   # backend tests
   
   cd backend
   codecept build
   codecept run
    
   # etc.
   ```

  Если Вы уже запускали `codecept build` для каждого приложения, можете пропустить этот шаг и запускать все тесты `codecept run`.
