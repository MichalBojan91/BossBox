<?php
declare(strict_types=1);

namespace App;

require 'vendor/autoload.php';

require_once("src/View.php");
require_once("src/Database.php");

use TCPDF;
use App\Controller\AbstractController;
use App\Exception\AppException;
use App\Exception\ConfigurationException;
use App\Exception\NotFoundException;


class InvoiceController extends AbstractController
{
    const DEFAULT_INVOICE_ACTION = 'invoice';


    public function invoiceAction():void
    {
        $invoices = $this->database->getInvoices();

        $this->view->render('invoice', ['invoices' => $invoices]);
    }

    public function newinvoiceAction(): void
    {
        if($this->request->hasPost()) {
            $invoiceData = [
                'invoice_number' => $this->request->postParam('invoiceNumber'),
                'document_date' => $this->request->postParam('documentDate'),
                'sell_date' => $this->request->postParam('sellDate'),
                'sell_place' => $this->request->postParam('sellPlace'),
                'acc_number' => $this->request->postParam('accNumber'),
                'current' => $this->request->postParam('current'),
                'contractor_name' => $this->request->postParam('contractorName'),
                'NIP' => $this->request->postParam('NIP'),
                'contractor_adress' => $this->request->postParam('contractorAdress'),
                'contractor_postcode' => $this->request->postParam('contractorPostcode'),
                'contractor_city' => $this->request->postParam('contractorCity'),
                'product' => $this->request->postParam('product'),
                'quantity' => $this->request->postParam('quantity'),
                'net_price' => $this->request->postParam('netPrice'),
                'VAT' => $this->request->postParam('VAT'),
                'brut_price' => $this->request->postParam('brutPrice')
            ];
            $this->database->newInvoice($invoiceData);

            $this->redirect(self::DEFAULT_INVOICE_ACTION, ['before' =>'created' ]);  //przeniesienie i przekazanie parametru zeby wyświetlić info
        }
        $this->view->render('newinvoice', ['invoiceNumber'=>$this->database->getInvoiceNumber()]);
    }

    public function showinvoiceAction(): void
    {
        $this->view->render('showinvoice', ['invoice' => $this->getInvoiceData()]);

    } 

    public function editinvoiceAction(): void
    {
            $invoiceData = [
                'invoice_number' => $this->request->postParam('invoiceNumber'),
                'document_date' => $this->request->postParam('documentDate'),
                'sell_date' => $this->request->postParam('sellDate'),
                'sell_place' => $this->request->postParam('sellPlace'),
                'acc_number' => $this->request->postParam('accNumber'),
                'current' => $this->request->postParam('current'),
                'contractor_name' => $this->request->postParam('contractorName'),
                'NIP' => $this->request->postParam('NIP'),
                'contractor_adress' => $this->request->postParam('contractorAdress'),
                'contractor_postcode' => $this->request->postParam('contractorPostcode'),
                'contractor_city' => $this->request->postParam('contractorCity'),
                'product' => $this->request->postParam('product'),
                'quantity' => $this->request->postParam('quantity'),
                'net_price' => $this->request->postParam('netPrice'),
                'VAT' => $this->request->postParam('VAT'),
                'brut_price' => $this->request->postParam('brutPrice')
            ];

            if($this->request->hasPost()) {
                $idInvoice = (int)$this->request->postParam('id_invoice');
                $this->database->editinvoice($invoiceData, $idInvoice);

            $this->redirect(self::DEFAULT_INVOICE_ACTION, ['before' =>'edited' ]);  //przeniesienie i przekazanie parametru zeby wyświetlić info
        }
        $this->view->render('editinvoice', ['invoice'=>$this->getInvoiceData()]);
    }

    public function deleteinvoiceAction(): void
    {
        if($this->request->hasPost()) {
            $idInvoice = (int)$this->request->postParam('id_invoice');
            $this->database->deleteinvoice($idInvoice);

        $this->redirect(self::DEFAULT_INVOICE_ACTION, ['before'=>'deleted']);    

        }    
    $this->view->render('deleteinvoice', ['invoice'=>$this->getInvoiceData()]);        
    }

    public function downloadinvoiceAction(): void
    {
        

        $this->view->render('downloadinvoice', ['invoice'=> $this->getInvoiceData(), 'invoiceNumber'=>$this->database->getInvoiceNumber()]);
    
    }

    public function getInvoiceData(): array
    {
       $invoiceId = (int)$this->request->getParam('id'); 
       if(!$invoiceId){
        $this->redirect(self::DEFAULT_INVOICE_ACTION, ['error' =>'missingInvoiceId' ]);
       } 
       try{
        $invoice = $this->database->getInvoice($invoiceId);
       }catch(NotFoundException $e){
        $this->redirect(self::DEFAULT_INVOICE_ACTION, ['error' =>'invoiceNotFound' ]);
       }
       return $invoice;
    }

}
