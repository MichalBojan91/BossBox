<?php 

declare(strict_types=1);

namespace App\Controller;

use App\Request;
use App\View;
use App\Database;
use App\Exception\ConfigurationException;
use App\SendMail;

require_once('src/SendMail.php');

class AbstractController
{
    protected const DEFAULT_ACTION_MAIN = 'main';
    

    private static array $configuration = [];

    protected Database $database;
    protected Request $request;
    protected View $view;
    protected SendMail $sendMail;
    

    public static function initConfiguration(array $configuration): void
    {
        self::$configuration = $configuration;

    }

    public function __construct(Request $request)
    {   
        if(empty(self::$configuration['db']))
        {
            throw new ConfigurationException('Configuration error');
        }

        $this->database = new Database(self::$configuration['db']);
                
        $this->request = $request;
        $this->view= new View();
        $this->sendMail = new SendMail();
    } 

    final protected function redirect(string $to, array $params): void
    {   
            if(count($params)){
            $queryParams = [];
            foreach($params as $key => $value) {
            $queryParams[] = urlencode($key) . "=" . urlencode($value);
           }
           $queryParams = implode('&', $queryParams);
           $location= '?action='. $to .'&'.   $queryParams;
        }
        
        header("Location: $location"); 
        exit;  
    }
    
    public function mainAction()
    {
        $this->view->render();
    }

    public function run() : void
    {   
        $action = $this->action().'Action';
        if(!method_exists($this, $action)){ // jeśli metoda nie isnieje wykonaj domyślną akcję
            $action = self::DEFAULT_ACTION_MAIN . 'Action';
            //$this->view->render();
            
        }   
        $this->$action();    //dzięki temu szuka nazwy metody o nazwie w tej zmiennej i ją wywołuje 
    }

    private function action(): string
    {   
        return $this->request->getParam('action', self::DEFAULT_ACTION_MAIN);
    }

}

?>