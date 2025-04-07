<?php 

declare(strict_types=1);

namespace App;

require_once("src/Database.php");

use PDO;
use App\Database;

class DatabaseStaff extends Database
{
    public function getStaff(): array
    { 
      $query = "SELECT id_worker, name, surname, birth_date, start_work, department, adress, city, email FROM workers";
      $exception = 'Nie udało się pobrać danych o pracownikach';  
      $result = $this->dbQuery($query, $exception);
      return $result->fetchAll(PDO::FETCH_ASSOC); 
    }

    public function getWorker(int $id): array
    { 
      $query = "SELECT * FROM workers WHERE id_worker = $id";
      $exception = 'Nie udało się pobrać danych pracownika';  
      $result = $this->dbQuery($query, $exception);
    
      return $result->fetch(PDO::FETCH_ASSOC); 
    }

    public function getWorkerEmail(int $id): array
    { 
      $query = "SELECT email FROM workers WHERE id_worker = $id";
      $exception = 'Nie udało się pobrać adresu email pracownika';  
      $result = $this->dbQuery($query, $exception);
      
      return $result->fetch(PDO::FETCH_ASSOC); 
    }

    public function addStaff(array $data): void
    {
         $name = $this->conn->quote($data['name']);
         $surname = $this->conn->quote($data['surname']);
         $birthDate = $this->conn->quote($data['birthDate']);
         $startWork = $this->conn->quote($data['startWork']);
         $department = $this->conn->quote($data['department']);
         $adress = $this->conn->quote($data['adress']);
         $city = $this->conn->quote($data['city']);
         $email = $this->conn->quote($data['email']);
         
         $query= "INSERT INTO workers(name, surname, birth_date, start_work, department, adress, city, email) 
         VALUES($name, $surname, $birthDate, $startWork, $department, $adress, $city, $email )";
         
         $exception = 'Nie udało się dodać pracownika do bazy';
        $this->dbExec($query, $exception);   
    }

    public function editStaff(array $data, int $id)
    {
         $name = $this->conn->quote($data['name']);
         $surname = $this->conn->quote($data['surname']);
         $birthDate = $this->conn->quote($data['birthDate']);
         $startWork = $this->conn->quote($data['startWork']);
         $department = $this->conn->quote($data['department']);
         $adress = $this->conn->quote($data['adress']);
         $city = $this->conn->quote($data['city']);
         $email = $this->conn->quote($data['email']);
       
        $query= "UPDATE workers SET name = $name, surname = $surname, birth_date = $birthDate, start_work = $startWork,
         department = $department, adress = $adress, city = $city, email = $email WHERE id_worker=$id";
        
        $exception = 'Nie udało się zedytować danych pracownika';
        $this->dbExec($query, $exception);   
    }

    public function deletestaff(int $id)
    {
        $query = "DELETE  FROM workers WHERE id_worker = $id";
        $exception = 'Nie udało się usunąć danych pracownika';
        $this->dbExec($query, $exception);
    }
}
