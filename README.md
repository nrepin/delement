https://docs.google.com/document/d/1_-TBp4KQ57aDYv-4gsCIxN0TArZCh1R5l2u7Ukil_2g/edit

прочитать ТЗ можно по ссылке
===========================================

Задание #1. 

Интеграция Блога. 
Вызов комплексного компонента находится в /blog/index.php
Сами компоненты:
/local/templates/delement/components/bitrix/news/
/local/templates/delement/components/bitrix/news.list/
/local/templates/delement/components/bitrix/news.detail/
/local/templates/delement/components/bitrix/system.pagenavigation/

обработка 404 ошибки вынесена в local/php_interface/init.php

Реализацию можно посмотреть на сайте http://web-repin.ru/blog/

===============================================================
Задание #2.

Форма обратной связи находится в /contacts/index.php

сам шаблон в /local/templates/delement/components/bitrix/form.result.new

Реализацию можно посмотреть на сайте http://web-repin.ru/contacts/

==============================================================

Задание №3. 

Не совсем понял про агента в задании, поэтому реализовал через событие "OnAfterUserLogin"

смортреть в local/php_interface/init.php

Любая попытка авторизации пишется в инфоблок "Авторизация пользователей" (ID = 11)

Собственный компонент реализован на урле /report/
/local/components/repin/main.reports

