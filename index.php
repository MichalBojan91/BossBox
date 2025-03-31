<?php 

declare(strict_types=1);

namespace App;

require 'vendor/autoload.php';

use App\Controller\AbstractController;
use App\Exception\AppException;
use App\Controller\ObjectController;
use App\Request;
use Throwable;

require_once("src/Utils/debug.php");
require_once("src/Controller/AbstractController.php");
require_once('src/Controller/NoteController.php');
require_once('src/Controller/StaffController.php');
require_once('src/Controller/HoursController.php');
require_once('src/Controller/InvoiceController.php');
require_once('src/Controller/ObjectController.php');
require_once('src/Request.php');
require_once("src/View.php");


$configuration = require("config/config.php");

$request = new Request($_GET,$_POST, $_SERVER);
$get = $request->getParam('action');

try{
AbstractController::initConfiguration($configuration);
ObjectController::ObjectSwitch($get, $request);
}catch(AppException $e){
    echo "<h1>Wystąpił błąd aplikacji</h1>";
    echo '<h3>'. $e->getMessage() . '</h3>';
} catch(Throwable $e){
    echo "<h1>Wystąpił błąd aplikacji</h1>";
    dump($e);
}

?>

