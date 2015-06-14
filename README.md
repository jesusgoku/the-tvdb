The TVDB
========

PHP library to consume The TVDB XML API

Tests
-----

- Copy `phpunit.dist.xml` to `phpunit.xml`
- Added your TheTVDB API key `phpunit.xml`

    ```xml
    <php>
        <ini name="error_reporting" value="-1"/>
        <const name="THE_TV_DB_API_KEY" value="COPY_YOUR_API_KEY_HERE"/>
    </php>
    ```

- Run test `vendor/bin/phpunit`
