<?php
declare(strict_types=1);

namespace App\Controller;

require_once("src/View.php");
require_once("src/Database.php");
require_once("src/DatabaseInvoice.php");
require_once("src/Controller/AbstractController.php");

use App\DatabaseInvoice;
use App\Request;
use App\Controller\AbstractController;
use App\Exception\AppException;
use App\Exception\ConfigurationException;
use App\Exception\NotFoundException;


class InvoiceController extends AbstractController
{
    const DEFAULT_INVOICE_ACTION = 'allinvoice';

    protected DatabaseInvoice $databaseInvoice;

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->databaseInvoice = new DatabaseInvoice(self::$configuration['db']);
    }

    public function allinvoiceAction():void
    {
        $invoices = $this->databaseInvoice->getInvoices();

        $this->view->render('invoice/invoice', ['invoices' => $invoices]);
    }

    public function newinvoiceAction(): void
    {
        if($this->request->hasPost()) {
            
            $this->databaseInvoice->newInvoice($this->getPostInvoiceData());

            $this->redirect(self::DEFAULT_INVOICE_ACTION, ['before' =>'created' ]);  //przeniesienie i przekazanie parametru zeby wyświetlić info
        }
        $this->view->render('invoice/newinvoice', ['invoiceNumber'=>$this->databaseInvoice->getInvoiceNumber()]);
    }

    public function showinvoiceAction(): void
    {
        $this->view->render('invoice/showinvoice', ['invoice' => $this->getInvoiceData()]);

    } 

    public function editinvoiceAction(): void
    {
            if($this->request->hasPost()) {
                $idInvoice = (int)$this->request->postParam('id_invoice');
                $this->databaseInvoice->editinvoice($this->getPostInvoiceData(), $idInvoice);

            $this->redirect(self::DEFAULT_INVOICE_ACTION, ['before' =>'edited' ]);  //przeniesienie i przekazanie parametru zeby wyświetlić info
        }
        $this->view->render('invoice/editinvoice', ['invoice'=>$this->getInvoiceData()]);
    }

    public function deleteinvoiceAction(): void
    {
        if($this->request->hasPost()) {
            $idInvoice = (int)$this->request->postParam('id_invoice');
            $this->databaseInvoice->deleteinvoice($idInvoice);

        $this->redirect(self::DEFAULT_INVOICE_ACTION, ['before'=>'deleted']);    

        }    
    $this->view->render('invoice/deleteinvoice', ['invoice'=>$this->getInvoiceData()]);        
    }

    public function downloadinvoiceAction(): void
    {
        

        $this->view->render('invoice/downloadinvoice', ['invoice'=> $this->getInvoiceData(), 'invoiceNumber'=>$this->databaseInvoice->getInvoiceNumber()]);
    
    }

    public function getInvoiceData(): array
    {
       $invoiceId = (int)$this->request->getParam('id'); 
       if(!$invoiceId){
        $this->redirect(self::DEFAULT_INVOICE_ACTION, ['error' =>'missingInvoiceId' ]);
       } 
       try{
        $invoice = $this->databaseInvoice->getInvoice($invoiceId);
       }catch(NotFoundException $e){
        $this->redirect(self::DEFAULT_INVOICE_ACTION, ['error' =>'invoiceNotFound' ]);
       }
       return $invoice;
    }

    public function getPostInvoiceData(): array
    {
        return $invoiceData = [
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
    }

}
