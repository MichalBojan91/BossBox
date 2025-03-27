<?php 

declare(strict_types=1);

namespace App;

require_once("src/Database.php");

use App\Exception\StorageException;
use App\Exception\ConfigurationException;
use App\Exception\NotFoundException;
use PDO;
use PDOException;
use Throwable;
use App\Database;

class DatabaseCompany extends Database
{
    public function getCompanyData(): array
    {
        $query = "SELECT * FROM companydata";
        $exception = "Nie udało się pobrać danych o firmie" ;

        $result = $this->dbQuery($query, $exception);
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function addCompanyData(array $data):void
    {
        $companyName = $this->conn->quote($data['companyName']);
        $companyAdress = $this->conn->quote($data['companyAdress']);
        $companyPostcode = $this->conn->quote($data['companyPostcode']);
        $companyCity = $this->conn->quote($data['companyCity']);
        $companyNip = $this->conn->quote($data['companyNip']);
        $companyBankAcc = $this->conn->quote($data['companyBankAcc']);
        $companyEmail = $this->conn->quote($data['companyEmail']);
        $companyPhone = $this->conn->quote($data['companyPhone']);

        $query = "INSERT INTO companydata (company_name, company_adress, company_postcode, company_city, company_nip,
                  company_bank_acc, company_email, company_phone) 
                  VALUES ($companyName, $companyAdress, $companyPostcode, $companyCity, $companyNip, $companyBankAcc,
                  $companyEmail, $companyPhone)";

        $exception = 'Nie udało się zapisać danych firmy do bazy';
        
        $this->dbExec($query, $exception);
    }

    public function editCompanyData(array $data): void
    {
        $companyName = $this->conn->quote($data['companyName']);
        $companyAdress = $this->conn->quote($data['companyAdress']);
        $companyPostcode = $this->conn->quote($data['companyPostcode']);
        $companyCity = $this->conn->quote($data['companyCity']);
        $companyNip = $this->conn->quote($data['companyNip']);
        $companyBankAcc = $this->conn->quote($data['companyBankAcc']);
        $companyEmail = $this->conn->quote($data['companyEmail']);
        $companyPhone = $this->conn->quote($data['companyPhone']);

        $query = "UPDATE companydata SET company_name=$companyName, company_adress=$companyAdress, company_postcode=$companyPostcode,
                 company_city=$companyCity, company_nip=$companyNip, company_bank_acc=$companyBankAcc, company_email=$companyEmail,
                 company_phone=$companyPhone";

        $exception = 'Nie udało się zapisać danych firmy do bazy';
        
        $this->dbExec($query, $exception);
    }


}
