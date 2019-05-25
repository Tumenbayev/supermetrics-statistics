**Supermetrics Assignment Task**

_Following project will provide information about average posts length, maximum post length per month and so on_

_PSR-2 coding standards was used_

**How to test**

* Create your .env file based on `.env.example`
* Run `composer install` command
* Up server `php -S 127.0.0.1:9001 -t ./`

**Tests**

I've covered StatisticsLogicWrapper by one unit tests which test statistics data:

You can run tests by the following command:

`vendor\bin\phpunit run tests\LogicWrappers\StatisticsWrapperTest.php`
