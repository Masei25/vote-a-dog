# Vote for a dog

> This is a laravel project that let you upload a dog image and also allows users to vote for any dog of their choice,

Firstly, you'll need to get the application up and running. There are a couple of prerequisites
you'll need to install:

* [PHP](https://www.php.net/manual/en/install.php)
* [Composer](https://getcomposer.org/doc/00-intro.md)
* [Git](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git)
* [Sqlite](https://www.sqlite.org/download.html) (default) or [MySQL](https://dev.mysql.com/doc/mysql-installation-excerpt/8.0/en/) - feel free to choose whichever database you want, though the .env.example file is configured to use sqlite. You can see docs on how to [change your database config here](https://laravel.com/docs/8.x/database)

Once you've got these, clone this repository (`git clone https://github.com/Masei25/vote-a-dog.git`), and then run the following commands in your terminal:

```
composer install
cp .env.example .env
php artisan app:setup
```

You should then be able to run `php artisan serve`, and open up [http://localhost:8000](http://localhost:8000) 
in your browser to see the application.

