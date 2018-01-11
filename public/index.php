<?php

require '../vendor/autoload.php';

require '../src/Application/Bootstrap/dependencies.php';
require '../src/Application/Bootstrap/routes.php';

try {
    $consoleApplication->run();
} catch (\Slim\Exception\MethodNotAllowedException $e) {
} catch (\Slim\Exception\NotFoundException $e) {
} catch (Exception $e) {
}