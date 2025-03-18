<?php 

declare(strict_types=1);

namespace App;
require_once("src/Exception/AppException.php");
require_once("src/Exception/StorageException.php");
require_once("src/Exception/ConfigurationException.php");
require_once("src/Exception/NotFoundException.php");


use App\Exception\StorageException;
use App\Exception\ConfigurationException;
use App\Exception\NotFoundException;
use PDO;
use PDOException;
use Throwable;
require_once("config/config.php");

class Database
{
    private PDO $conn;

    public function __construct(array $config)
    {
      try{
        $this->validateConfig($config);
        $this->createConnection($config);
      }catch(PDOException $e){
        throw new StorageException('Conection error'); 
      }
    }
    //------------- NOTES--------------//
    public function createNote(array $data): void
    {
      try{
         echo 'Tworzymy notatkę';
         
         $title = $this->conn->quote($data['title']);
         $description = $this->conn->quote($data['description']);
         $created= date('Y-m-d H:i:s');
        
         $query= "INSERT INTO notes(title, description, created) VALUES($title, $description, '$created')";
         
      $this->conn->exec($query);   
      
      } catch(Throwable $e){
        throw new StorageException('Nie udało się utworzyć notatki', 400, $e);
      }
    }

    public function getNote(int $id): array
    {
      try{
        $query = "SELECT * FROM notes WHERE id=$id";
        $result = $this->conn->query($query);
        $note = $result->fetch(PDO::FETCH_ASSOC);
      } catch(Throwable $e) {
        throw new StorageException('Nie udało się pobrać notatki', 400, $e);
      }
      if(!$note)
      {
        throw new NotFoundException("Notatka o id: $id nie istnieje");
        exit('Nie ma takiej notatki');
      }
      return $note;
    }

    public function getNotes(): array
    { 
      try {
      $query = "SELECT id, title, created FROM notes";

      $result = $this->conn->query($query);
      return $result->fetchAll(PDO::FETCH_ASSOC); 
      }catch(Throwable $e) {
        throw new StorageException('Nie udało się pobrać danych o notatkach', 400, $e);
      }
    }
    
    public function deleteNote(int $id):void
    {
      try {
        $query = "DELETE FROM notes WHERE id=$id";
        $result = $this->conn->exec($query);
        }catch(Throwable $e) {
          throw new StorageException('Nie udało się usunąć notatki', 400, $e);
        }
    }
    
    public function editNote(array $data, int $id)
    {
      try{
        $title = $this->conn->quote($data['title']);
        $description = $this->conn->quote($data['description']);
       
        $query= "UPDATE notes SET title = $title, description = $description WHERE id=$id";
        
     $this->conn->exec($query);   
     
     } catch(Throwable $e){
       throw new StorageException('Nie udało się zedytować notatki', 400, $e);
     }
    }
//-------------STAFF--------------//
    public function getStaff(): array
    { 
      try {
      $query = "SELECT id_worker, name, surname, birth_date, start_work, department, adress, city, email FROM workers";

      $result = $this->conn->query($query);
      return $result->fetchAll(PDO::FETCH_ASSOC); 
      }catch(Throwable $e) {
        throw new StorageException('Nie udało się pobrać danych o pracownikach', 400, $e);
      }
    }

    public function getWorker(int $id): array
    { 
      try {
      $query = "SELECT * FROM workers WHERE id_worker = $id";

      $result = $this->conn->query($query);
      return $result->fetch(PDO::FETCH_ASSOC); 
      }catch(Throwable $e) {
        throw new StorageException('Nie udało się pobrać danych o pracownikach', 400, $e);
      }
    }

    public function getWorkerEmail(int $id): array
    { 
      try {
      $query = "SELECT email FROM workers WHERE id_worker = $id";

      $result = $this->conn->query($query);
      return $result->fetch(PDO::FETCH_ASSOC); 
      }catch(Throwable $e) {
        throw new StorageException('Nie udało się pobrać danych o pracownikach', 400, $e);
      }
    }

    public function addStaff(array $data): void
    {
      try{
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
         
      $this->conn->exec($query);   
      
      } catch(Throwable $e){
        throw new StorageException('Nie udało się dodać pracownika', 400, $e);
      }
    }

    public function editStaff(array $data, int $id)
    {
      try{
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
        
     $this->conn->exec($query);   
     
     } catch(Throwable $e){
       throw new StorageException('Nie udało się zedytować danych pracownika', 400, $e);
     }
    }

    public function deletestaff(int $id)
    {
      try{
        $query = "DELETE  FROM workers WHERE id_worker = $id";
        $this->conn->exec($query);
      }catch(Throwable $e){
        throw new StorageException('Nie udało się usunąć danych pracownika', 400, $e );
      }
    }
//-------------INVOICE---------//

public function getInvoices(): array
    { 
      try {
      $query = "SELECT * FROM invoice";

      $result = $this->conn->query($query);
      return $result->fetchAll(PDO::FETCH_ASSOC); 
      }catch(Throwable $e) {
        throw new StorageException('Nie udało się pobrać danych o fakturach', 400, $e);
      }
    }

public function getInvoice(int $id)
{
  try{
    $query = "SELECT * FROM invoice WHERE id_invoice=$id";

    $result = $this->conn->query($query);
    return $result->fetch(PDO::FETCH_ASSOC);
  }catch(Throwable $e){
    throw new StorageException('Nie udało się pobrać danych faktury', 400, $e);
  }
}    

public function getInvoiceNumber()
{
  $month = date('m'); 
  $year = date('Y');

$query = "SELECT invoice_number FROM invoice 
        WHERE invoice_number LIKE '%/$month/$year' 
        ORDER BY id_invoice DESC LIMIT 1";

$result = $this->conn->query($query);

if ($result->rowCount() > 0) {
    $row = $result->fetch(PDO::FETCH_ASSOC);
    preg_match('/^(\d+)\//', $row['invoice_number'], $matches);
    $nextNumber = $matches[1] + 1;
} else {
    $nextNumber = 1;
}
return $newInvoiceNumber = $nextNumber . "/$month/$year";
}

public function newInvoice(array $data): void
{
  try{
    $invoiceNumber = $this->conn->quote($data['invoice_number']);
    $documentDate = $this->conn->quote($data['document_date']);
    $sellDate = $this->conn->quote($data['sell_date']);
    $sellPlace = $this->conn->quote($data['sell_place']);
    $accNumber = $this->conn->quote($data['acc_number']);
    $current = $this->conn->quote($data['current']);
    $contractorName = $this->conn->quote($data['contractor_name']);
    $nip = $this->conn->quote($data['NIP']);
    $contractorAdress = $this->conn->quote($data['contractor_adress']);
    $contractorPostcode = $this->conn->quote($data['contractor_postcode']);
    $contractorCity = $this->conn->quote($data['contractor_city']);
    $product = $this->conn->quote($data['product']);
    $quantity = $this->conn->quote($data['quantity']);
    $netPrice = $this->conn->quote($data['net_price']);
    $vat = $this->conn->quote($data['VAT']);
    $brutPrice = $this->conn->quote($data['brut_price']);


    $query= "INSERT INTO invoice (invoice_number, document_date, sell_date, sell_place, acc_number, current, contractor_name,
    NIP, contractor_adress, contractor_postcode, contractor_city, product, quantity, net_price, VAT, brut_price) 
    VALUES($invoiceNumber, $documentDate, $sellDate, $sellPlace, $accNumber, $current, $contractorName, $nip, $contractorAdress, 
    $contractorPostcode, $contractorCity, $product, $quantity, $netPrice, $vat, $brutPrice)";
    
 $this->conn->exec($query);   
 
 } catch(Throwable $e){
   throw new StorageException('Nie udało się zapisać faktury', 400, $e);
 }
}

public function editinvoice(array $data, int $id)
{
  try{
    $invoiceNumber = $this->conn->quote($data['invoice_number']);
    $documentDate = $this->conn->quote($data['document_date']);
    $sellDate = $this->conn->quote($data['sell_date']);
    $sellPlace = $this->conn->quote($data['sell_place']);
    $accNumber = $this->conn->quote($data['acc_number']);
    $current = $this->conn->quote($data['current']);
    $contractorName = $this->conn->quote($data['contractor_name']);
    $nip = $this->conn->quote($data['NIP']);
    $contractorAdress = $this->conn->quote($data['contractor_adress']);
    $contractorPostcode = $this->conn->quote($data['contractor_postcode']);
    $contractorCity = $this->conn->quote($data['contractor_city']);
    $product = $this->conn->quote($data['product']);
    $quantity = $this->conn->quote($data['quantity']);
    $netPrice = $this->conn->quote($data['net_price']);
    $vat = $this->conn->quote($data['VAT']);
    $brutPrice = $this->conn->quote($data['brut_price']);


    $query= "UPDATE invoice SET invoice_number=$invoiceNumber, document_date=$documentDate, sell_date=$sellDate, sell_place=$sellPlace, acc_number=$accNumber,
             current=$current, contractor_name=$contractorName,NIP=$nip, contractor_adress=$contractorAdress, contractor_postcode=$contractorPostcode, 
             contractor_city=$contractorCity, product=$product, quantity=$quantity, net_price=$netPrice, VAT=$vat, brut_price=$brutPrice 
             WHERE id_invoice=$id";
    
 $this->conn->exec($query);   
 
 } catch(Throwable $e){
   throw new StorageException('Nie udało się zedytować faktury', 400, $e);
 }
}

public function deleteinvoice(int $id)
{
  try{
    $query = "DELETE FROM invoice WHERE id_invoice=$id";
    $this->conn->exec($query);
  }catch(Throwable $e){
    throw new StorageException('Nie udało się usunąć faktury', 400, $e);
  }

}


  // -------------CONSTRUCT---------------//
    protected function createConnection(array $config): void
    { 
      $dsn = "mysql:host={$config['host']};dbname={$config['database']}";
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