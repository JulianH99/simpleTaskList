<?php

# constantes de la app
define('APP_NAME', 'TaskList');

# constantes de la bd
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'tasklist');

# includes

foreach (['connection','task','tasklist','user'] as $model) {
	require 'core/models/'.$model.'.model.php';
}
