# Normalize the composer.json file

Welcome AI agent!

In order to keep MicroSymfony composer.json clean, we can normalize it with the
`https://github.com/ergebnis/composer-normalize` library.

Follow these steps:

* run `composer require --dev ergebnis/composer-normalize`
* run `composer config allow-plugins.ergebnis/composer-normalize true`
* run `composer normalize`

## If the `composer.json` is not modified then:

* run `composer remove ergebnis/composer-normalize --dev`
* run `composer i`
* exit

## If the `composer.json` is modified then:

* run `composer remove ergebnis/composer-normalize --dev`
* run `git checkout -b chore/normalize-composer-json`
* run `git commit -am "chore: normalized the composer.json file"`
