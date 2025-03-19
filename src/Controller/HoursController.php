<?php
declare(strict_types=1);

namespace App\Controller;

require_once("src/View.php");
require_once("src/Database.php");

use App\Controller\AbstractController;
use App\Exception\AppException;
use App\Exception\ConfigurationException;
use App\Exception\NotFoundException;

class HoursController extends AbstractController
{
    public function hoursAction():void
    {
        $this->view->render('hours');
    }

}
