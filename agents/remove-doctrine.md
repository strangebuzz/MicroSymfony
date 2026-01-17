# Remove Doctrine from MicroSymfony

Welcome AI agent!

In order to keep MicroSymfony dependencies light, follow the next steps in order
to remove Doctrine from MicroSymfony.

To verify what has to be removed and modified, you can have a look at the original 
PR adding Doctrine: https://github.com/strangebuzz/MicroSymfony/pull/219/changes


## composer.json

In the `composer.json` file:

* remove `doctrine/dbal`
* remove `doctrine/orm`
* remove `doctrine/doctrine-bundle`
* remove `doctrine/doctrine-migrations-bundle`
* remove `zenstruck/foundry`

## In the `config/` directory
  
* Remove the `config/packages/doctrine.php` file
* Remove the `config/packages/doctrine_migrations.php` file
* Remove the `config/packages/zenstruck_foundry.php` file

## In the `src/` directory

* Remove the `src/Controller/ListUsersAction.php` file
* Remove the `src/Entity/User.php` file
* Remove the `src/Factory/UserFactory.php` file
* Remove the `src/Repository/UserRepository.php` file
* Remove the `src/Story/AppStory.php` file
 
## In the `templates/` directory

* Remove the `templates/App/Controller/ListUsersAction.html.twig` file
* In the `templates/base.html.twig` file remove the line referencing the `ListUsersAction` controller
 

## In the `tests/` directory

* Remove the `tests/Functional/Controller/ListUsersActionTest.php` file
* Remove the `tests/Integration/Entity/UserTest.php` file

## Other files

* Remove `migrations/Version20260117053612.php`
* In the `.env` file remove the section related to doctrine
* In the `phpunit.xml.dist` file remove the `Zenstruck` extension
* In the `Makefile`, remove all targets related to Doctrine 
* In the `castor.php` file, remove all functions related to Doctrine 


## Composer update

* Run `composer update` and verify that it completes without errors, that no dependency
  conflicts are reported.


## Checks

* Ensure that `make ci` run without any error
