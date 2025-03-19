<?php 

declare(strict_types=1);

namespace App;
require_once("src/Database.php");

use App\Exception\NotFoundException;
use PDO;
use App\Database;

class DatabaseNote extends Database
{
    public function createNote(array $data)
    {
         $title = $this->conn->quote($data['title']);
         $description = $this->conn->quote($data['description']);
         $created= date('Y-m-d H:i:s');
        
         $query= "INSERT INTO notes(title, description, created) VALUES($title, $description, '$created')";
         $exception = "Nie udało się utworzyć notatki";
         $this->dbExec($query, $exception);
    }

    public function deleteNote(int $id):void
    {
        $query = "DELETE FROM notes WHERE id=$id";
        $exception = "Nie udało się usunąć notatki";
        $this->dbExec($query, $exception);
    }

    public function getNotes(): array
    { 
      $query = "SELECT id, title, created FROM notes";
      $exception = "Nie udało się pobrać danych o notatkach";  
      $result = $this->dbQuery($query, $exception);
      return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNote(int $id): array
    {
        $query = "SELECT * FROM notes WHERE id=$id";
        $exception = 'Nie udało się pobrać danych o notatce'; 
        $result = $this->dbQuery($query, $exception);
        $note = $result->fetch(PDO::FETCH_ASSOC);
      if(!$note)
      {
        throw new NotFoundException("Notatka o id: $id nie istnieje");
        exit('Nie ma takiej notatki');
      }
      return $note;
    }

    public function editNote(array $data, int $id)
    {
        $title = $this->conn->quote($data['title']);
        $description = $this->conn->quote($data['description']);
       
        $query= "UPDATE notes SET title = $title, description = $description WHERE id=$id";
        $exception = 'Nie udało się zedytować notatki';
        $this->dbExec($query, $exception);   
    }



}
