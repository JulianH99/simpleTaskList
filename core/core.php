<?php

# constantes de la app
define('APP_NAME', 'TaskList');

# constantes de la bd
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'tasklist');

# includes

include('models/connection.model.php');
include('models/task.model.php');
include('models/tasklist.model.php');
include('models/user.model.php');
