# With Laragon server

Laragon is a simple, modern and powerful Windows local web server. [Download](https://laragon.org/download/) 
and install it in `C:\laragon` directory.

To make MicroSymfony work with Laragon, install the [Apache Pack Component](https://symfony.com/components/Apache%20Pack) 
by launching the `composer require symfony/apache-pack` command in the Laragon Terminal;
it will create a `.htaccess` file in the `./public` directory.

You can install `make` by launching the `scoop install make` command in the Laragon
Terminal.

You can install the Symfony CLI by launching the `scoop install symfony-cli` command
in the Laragon Terminal.

If it does not work, you can also install Laragon Symfony CLI by downloading the
`symfony.exe` binary file from [Symfony binary](https://symfony.com/download#step-1-install-symfony-cli)
(click on `386` or `amd64` link), and by putting this `symfony.exe` file in `C:\laragon\bin`
directory.
