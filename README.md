<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Advanced Project Template</h1>
    <br>
</p>

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```

Реализация
-------------------
Реализовал систему, которую бы сам мог использовать для работы с параметрами.
Перевёл фронт на бекенд - так, как работа с параметрами не должна быть во фронте. Однако убрал с бекенда проверку доступа.
Для обеспечения защиты он XSS атак, я предпочитаю использовать при выводе twig, но в данном случае мне немного нехватает времени.
Считаю, что при работе с большими объёмами в GRUD целесообразнее не вынимать данные из кеша, а запрашивать из БД в админке с пагинацией (частями).
Обработку параметров - изменение или получение параметра уже переложил на кеш.