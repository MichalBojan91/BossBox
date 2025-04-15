<?php 

declare(strict_types=1);

namespace App;

require_once("src/Exception/AppException.php");
require_once("src/Exception/StorageException.php");
require_once("src/Exception/ConfigurationException.php");
require_once("config/config.php");

use App\Exception\StorageException;
use App\Exception\ConfigurationException;
use PDO;
use PDOException;
use Throwable;


class Database
{
    protected PDO $conn;

    public function __construct(array $config)
    {
      try{
        $this->validateConfig($config);
        $this->createConnection($config);
      }catch(PDOException $e){
        print_r($e->getMessage());
        dump($config);
        throw new StorageException('Conection error', 500, $e); 
        
      }
    }

    public function dbExec(string $query, string $exception): void
    {
      try{
        $this->conn->exec($query); 
      }catch(Throwable $e){
        throw new StorageException($exception, 400, $e);
      }
    }

    public function dbQuery(string $query, string $exception)
    {
      try{
        $result = $this->conn->query($query);
      } catch(Throwable $e) {
        throw new StorageException($exception, 400, $e);
      }
      return $result;
      
    }

    protected function createConnection(array $config): void
    { 
      $dsn = "mysql:host={$config['host']};dbname={$config['database']};charset=utf8mb4";
      $this->conn = new PDO($dsn, $config['user'], $config['password'], [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION] );
    }

    protected function validateConfig(array $config): void
    {
        if(
            empty($config['database'])
            ||empty($config['host'])
            ||empty($config['user'])
            ||empty($config['password'])
           ) {
            throw new ConfigurationException('Storage configuration error');
           }     
    }
}