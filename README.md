# About DB-Manipulator

DB-Manipualtor this is a PHP package which help you to manage your data in database. And 
do it really easy. In couple clicks you can get, update, insert and delete your data. 
This package oriented at databases like MySQL and PostgreSQL. 

# First actions

Before starting you have to create some files. In root directory you have to create `/env.ini`
file where you will display your data for database connection. The second file `settings.php` will be display in `config` directory in root directory of your project. The `config/settings.php` it's just
a file where will be display needed for successfull connection with database.

# Second actions

The second actions will be passing our database connection information. Add this lines into `env.ini`
file which was created in root directory:

    DB_DRIVER=mysql
    DB_HOST=localhost
    DB_USER=root
    DB_PASSWORD=password

The first parameter is `DB_DRIVER` can be mysql or pgsql. Host by default can be localhost. And user wih password will be according to name and password of your database.

# Third action

When we have created our configuration files and filled out it our database data we can access 
`rubyqorn/db-manipualtor` package for manipulating your database.

    composer require rubyqorn/db-manipulator

# Finnal actions

You can create classes which will be manipulate you database data. You can create class where you want
or create a directory and name it like `models` and there create a files which will be extends from basic class. 

So I was create a class named like `Model` in models directory

    '/models/Model.php'

    <?php

    namespace App\Models;

    use Manipulator\DatabaseManager;

    class Model extends DatabaseManager
    {
        //
    }

> {tip} All I have to do it's just to create a protected property table and pass there the name of table which you will be use with this model. Remember, for one table you have to create a single class and pass there protected property table with name.

And finnaly your model class have looks like:
    
    '/models/Model.php'

    <?php

    namespace App\Models;

    use Manipulator\DatabaseManager;

    class Model extends DatabaseManager
    {
        protected $table = 'users';
    }

If you want to use database manipulator methods you just have to create an object of 
your `Model` class.

    <?php

    require_once './vendor/autoload.php';

    use App\Models;

    $model = new Model();
    $users = $model->select()->all();

And thats all. You will get all users from database.