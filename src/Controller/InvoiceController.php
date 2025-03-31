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
use App\Exception\NotFoundException;
use Dompdf\Dompdf;
use Dompdf\Options;
use DateTime;


class InvoiceController extends AbstractController
{
    const DEFAULT_INVOICE_ACTION = 'allinvoice';

    protected DatabaseInvoice $databaseInvoice;
    protected CompanyController $companyController;

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->databaseInvoice = new DatabaseInvoice(self::$configuration['db']);
        $this->companyController = new CompanyController($request);
    }

    public function allinvoiceAction(): void
    {
        $invoices = $this->databaseInvoice->getInvoices();

        $this->view->render('invoice/invoice', ['invoices' => $invoices,
                 'before' => $this->request->getParam('before'),
                 'error' => $this->request->getParam('error')]);
    }

    public function newinvoiceAction(): void
    {
        if ($this->request->hasPost()) {

            $this->databaseInvoice->newInvoice($this->getPostInvoiceData());

            $this->redirect(self::DEFAULT_INVOICE_ACTION, ['before' => 'created']);  
        }
        $this->view->render('invoice/newinvoice', ['invoiceNumber' => $this->databaseInvoice->getInvoiceNumber()]);
    }

    public function showinvoiceAction(): void
    {
        $this->view->render('invoice/showinvoice', ['invoice' => $this->getInvoiceData(), 'company' => $this->companyController->getCompanyData()]);
    }

    public function editinvoiceAction(): void
    {
        if ($this->request->hasPost()) {
            $idInvoice = (int)$this->request->postParam('id_invoice');
            $this->databaseInvoice->editinvoice($this->getPostInvoiceData(), $idInvoice);

            $this->redirect(self::DEFAULT_INVOICE_ACTION, ['before' => 'edited']);  
        }
        $this->view->render('invoice/editinvoice', ['invoice' => $this->getInvoiceData()]);
    }

    public function deleteinvoiceAction(): void
    {
        if ($this->request->hasPost()) {
            $idInvoice = (int)$this->request->postParam('id_invoice');
            $this->databaseInvoice->deleteinvoice($idInvoice);

            $this->redirect(self::DEFAULT_INVOICE_ACTION, ['before' => 'deleted']);
        }
        $this->view->render('invoice/deleteinvoice', ['invoice' => $this->getInvoiceData()]);
    }

    public function downloadinvoiceAction()
    {
        ob_start();
        $data = ['invoice' => $this->getInvoiceData(), 'company' => $this->companyController->getCompanyData()];   
        $params = $this->view->escape($data);
        require_once("templates/pages/invoice/downloadinvoice.php");
        $html = ob_get_clean();
                
        $title = preg_replace('/[\/]/', '.', $params['invoice']['invoice_number']);
       
        $options = new Options();
        $options->set('defaultFont', 'DejaVu Sans Mono');

        $dompdf = new Dompdf($options);
        
        $dompdf->loadHtml($html);
                
        $dompdf->setPaper('A4');

        $dompdf->render();

        $dompdf->stream($title);      
    }

    public function generateInvoicePdf(int $invoiceId)
    {
        ob_start();
        $data = ['invoice' => $this->getInvoiceData($invoiceId), 'company' => $this->companyController->getCompanyData()];   
        $params = $this->view->escape($data);
        require_once("templates/pages/invoice/downloadinvoice.php");
        $html = ob_get_clean();
                
        $title = preg_replace('/[\/]/', '.', $params['invoice']['invoice_number']);
       
        $options = new Options();
        $options->set('defaultFont', 'DejaVu Sans Mono');

        $dompdf = new Dompdf($options);
        
        $dompdf->loadHtml($html);
                
        $dompdf->setPaper('A4');

        $dompdf->render();

        return $dompdf->output();
    }


    public function payConfirmAction():void
    {
        $invoiceId = (int)$this->request->getParam('id');
        if (!$invoiceId) {
            $this->redirect(self::DEFAULT_INVOICE_ACTION, ['error' => 'missingInvoiceId']);//użyj tego do zabezpieczania przy wpisywaniu z ręki w get
        }
        else{
            $this->databaseInvoice->payConfirm($invoiceId);
            $this->redirect(self::DEFAULT_INVOICE_ACTION, ['before' => 'payconfirmed']);
        }
    }

    public function getInvoiceData(?int $invoiceId=null ): array
    {
        if (!$invoiceId) {
            $invoiceId = (int)$this->request->getParam('id'); // Pobranie ID z GET, jeśli nie przekazano
        }
        if (!$invoiceId) {
            $this->redirect(self::DEFAULT_INVOICE_ACTION, ['error' => 'missingInvoiceId']);//użyj tego do zabezpieczania przy wpisywaniu z ręki w get
        }
        try {
            $invoice = $this->databaseInvoice->getInvoice($invoiceId);
        } catch (NotFoundException $e) {
            $this->redirect(self::DEFAULT_INVOICE_ACTION, ['error' => 'invoiceNotFound']);
        }
        return $invoice;
    }

    public function sendInvoiceAction():void
    {
        if ($this->request->isPost()) {
            $data = [
                'email' => $this->request->postParam('email'),
                'subject' => $this->request->postParam('subject'),
                'body' => $this->request->postParam('body'),
                'invoiceId' => (int)$this->request->postParam('invoiceId'),
                'invoiceNumber' => $this->request->postParam('invoiceNumber')
            ];

        $invoicePdf = $this->generateInvoicePdf($data['invoiceId']);
        $invoiceNumber = preg_replace('/[\/]/', '.', $data['invoiceNumber'] ); // Usunięcie problematycznych znaków

        $this->sendMail->SendMail($data, $invoicePdf, $invoiceNumber);
        $this->redirect(self::DEFAULT_INVOICE_ACTION, ['before' => 'invoicesent']);

    }
        $this->view->render('invoice/sendinvoice', ['invoice' => $this->getInvoiceData(), 'company' => $this->companyController->getCompanyData()]);
    }


    public function getPostInvoiceData(): array
    {
        return $invoiceData = [
            'invoice_number' => $this->request->postParam('invoiceNumber'),
            'document_date' => $this->request->postParam('documentDate'),
            'sell_date' => $this->request->postParam('sellDate'),
            'sell_place' => $this->request->postParam('sellPlace'),
            'contractor_name' => $this->request->postParam('contractorName'),
            'NIP' => $this->request->postParam('NIP'),
            'contractor_adress' => $this->request->postParam('contractorAdress'),
            'contractor_postcode' => $this->request->postParam('contractorPostcode'),
            'contractor_city' => $this->request->postParam('contractorCity'),
            'product' => $this->request->postParam('product'),
            'quantity' => $this->request->postParam('quantity'),
            'net_price' => $this->request->postParam('netPrice'),
            'VAT' => $this->request->postParam('VAT'),
            'brut_price' => $this->request->postParam('brutPrice'),
            'pay_date' => $this->request->postParam('payDate'),
            'payment_method' => $this->request->postParam('paymentMethod'),
            'net_value' => $this->request->postParam('netValue'),
            'vat_value' => $this->request->postParam('vatValue'), 
            'pay_confirm' => $this->request->postParam('payConfirm')
        ];
    }
}
