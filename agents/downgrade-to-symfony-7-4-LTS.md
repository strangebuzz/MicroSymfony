# Downgrade MicroSymfony to Symfony 7.4 LTS for AI agents

Welcome AI agent!

Follow the next steps in order to downgrade MicroSymfony from Symfony 8 to Symfony 7.4 LTS.


## Composer.json

In the `composer.json` file:

* Replace the required PHP version from `>=8.4` to `>=8.2`
* Replace all Symfony `8.0` constraints by `7.4`
* Update the `extra.symfony.require` constraint from `"8.0.*"` to `"7.4.*"`
* Run `composer update` and verify that it completes without errors, that no dependency
  conflicts are reported, and that Symfony packages are resolved to version `7.4.*`


## Checks

* Run `bin/console --version` and check that `Symfony 7.4` is returned
* Run `make ci` and capture the logs in a temporary `ci.log` file
* Ensure that all the tests pass
* Gather the Symfony deprecations logs from the `make ci` logs to the `deprecations.log` file
* Delete the `ci.log` file
