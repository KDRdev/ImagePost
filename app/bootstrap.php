<?php

//  Load config
require_once 'config/config.php';

require_once 'helpers/session.php';

// Autoload Core Libraries
spl_autoload_register(function($className) {
    require_once 'libraries/' . $className . '.php';
});
