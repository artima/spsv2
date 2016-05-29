PHP PSR-4 Autoloading
=====================

Struggling to understand PSR-4 autoloading?
How you *might* load in classes, and then autoload classes in using Composer, following the PSR-4 specification from PHP-FIG.

1. Create 'composer.json' and configure it
2. Install composer.php : https://getcomposer.org/download/
3. Do the following command : php composer.phar dump-autoload -o, it install 'vendor/composer' (autoloader) folder
4. Create 'start.php' in app folder
5. require_once start.php in the index.php
6. Create the namespaces for your classes
7. Use 'use <namespace>\className' in the index.php
8. Don't forget to do the following command : php composer.phar dump-autoload -o every time when you modify 'composer.json'