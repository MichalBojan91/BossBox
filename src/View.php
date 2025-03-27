<?php

declare(strict_types=1);

namespace App;

class View
{
   private const DEFAULT_PAGE = 'main';

    public function render(string $page=self::DEFAULT_PAGE, array $params = []) :void
    {   
        $params = $this->escape($params);
        require_once("templates/layout.php");
    }

    public function escape(array $params): array
  {
    $clearParams = [];

    foreach ($params as $key => $param) {
      if (is_array($param)) {
        $clearParams[$key] = $this->escape($param);
      }else if($param){
        if(is_string($param)){
            $clearParams[$key] = htmlentities($param);
        } else{
            $clearParams[$key] = $param;
        }
      } 
     }
      return $clearParams;
    }
}