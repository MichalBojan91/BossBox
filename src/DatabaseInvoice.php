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

class DatabaseInvoice extends Database
{
    public function getInvoices(): array
    { 
        $query = "SELECT * FROM invoice";
        $exception = 'Nie udało się pobrać danych o fakturach';  
        
        $result = $this->dbQuery($query, $exception);
        
        return $result->fetchAll(PDO::FETCH_ASSOC); 
    }

    public function getInvoice(int $id)
    {
        $query = "SELECT * FROM invoice WHERE id_invoice=$id";
        $exception = 'Nie udało się pobrać danych faktury';  
   
        $result = $this->dbQuery($query, $exception);
    
        return $result->fetch(PDO::FETCH_ASSOC);
    }    

    public function getInvoiceNumber()
    {
        $month = date('m'); 
        $year = date('Y');

        $query = "SELECT invoice_number FROM invoice 
            WHERE invoice_number LIKE '%/$month/$year' 
            ORDER BY id_invoice DESC LIMIT 1";
        
        $exception = 'Nie udało się pobrać numeru faktury';

        $result = $this->dbQuery($query, $exception);

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
        $invoiceNumber = $this->conn->quote($data['invoice_number']);
        $sellDate = $this->conn->quote($data['sell_date']);
        $sellPlace = $this->conn->quote($data['sell_place']);
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
        $payDate = $this->conn->quote($data['pay_date']);
        $paymentMethod = $this->conn->quote($data['payment_method']);
        $netValue = $this->conn->quote($data['net_value']);
        $vatValue = $this->conn->quote($data['vat_value']);

        $query= "INSERT INTO invoice (invoice_number, sell_date, sell_place, contractor_name,
        NIP, contractor_adress, contractor_postcode, contractor_city, product, quantity, net_price, VAT, brut_price, pay_date, payment_method, net_value, vat_value) 
        VALUES($invoiceNumber, $sellDate, $sellPlace, $contractorName, $nip, $contractorAdress, 
        $contractorPostcode, $contractorCity, $product, $quantity, $netPrice, $vat, $brutPrice, $payDate, $paymentMethod, $netValue, $vatValue)";

        $exception = 'Nie udało się zapisać nowej fakury';

        $this->dbExec($query, $exception);   
    }

    public function editinvoice(array $data, int $id)
    {
        $invoiceNumber = $this->conn->quote($data['invoice_number']);
        $sellDate = $this->conn->quote($data['sell_date']);
        $sellPlace = $this->conn->quote($data['sell_place']);
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
        $payDate = $this->conn->quote($data['pay_date']);
        $paymentMethod = $this->conn->quote($data['payment_method']);
        $netValue = $this->conn->quote($data['net_value']);
        $vatValue = $this->conn->quote($data['vat_value']);

        $query= "UPDATE invoice SET invoice_number=$invoiceNumber, sell_date=$sellDate, sell_place=$sellPlace, 
                contractor_name=$contractorName,NIP=$nip, contractor_adress=$contractorAdress, contractor_postcode=$contractorPostcode, 
                contractor_city=$contractorCity, product=$product, quantity=$quantity, net_price=$netPrice, VAT=$vat, brut_price=$brutPrice,
                pay_date=$payDate, payment_method=$paymentMethod, net_value=$netValue, vat_value=$vatValue 
                WHERE id_invoice=$id";
        
        $exception = 'Nie udało się zedytować danych faktury';
        
        $this->dbExec($query, $exception);   
    }

    public function deleteinvoice(int $id)
    {
        $query = "DELETE FROM invoice WHERE id_invoice=$id";

        $exception = 'Nie udało się usunąć faktury';

        $this->dbExec($query, $exception);
    }

    // public function quoteInvoiceData(array $data)
    // {
    //     return  [
    //     $invoiceNumber = $this->conn->quote($data['invoice_number']),
    //     $documentDate = $this->conn->quote($data['document_date']),
    //     $sellDate = $this->conn->quote($data['sell_date']),
    //     $sellPlace = $this->conn->quote($data['sell_place']),
    //     $contractorName = $this->conn->quote($data['contractor_name']),
    //     $nip = $this->conn->quote($data['NIP']),
    //     $contractorAdress = $this->conn->quote($data['contractor_adress']),
    //     $contractorPostcode = $this->conn->quote($data['contractor_postcode']),
    //     $contractorCity = $this->conn->quote($data['contractor_city']),
    //     $product = $this->conn->quote($data['product']),
    //     $quantity = $this->conn->quote($data['quantity']),
    //     $netPrice = $this->conn->quote($data['net_price']),
    //     $vat = $this->conn->quote($data['VAT']),
    //     $brutPrice = $this->conn->quote($data['brut_price'])
    //     ];

    // }


}
