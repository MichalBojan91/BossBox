<?php

declare(strict_types=1);
namespace App\Exception;

use App\Exception\AppException;
require_once("src/Exception/AppException.php");

class NotFoundException extends AppException
{

}