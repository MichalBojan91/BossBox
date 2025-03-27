<?php 

declare(strict_types=1);

namespace App\Controller;

use App\Controller\StaffController;
use App\Controller\HoursController;
use App\Controller\InvoiceController;
use App\Controller\NoteController;

class ObjectController
{
    public static function ObjectSwitch(?string $get, $request):void
    {
        $notesAction = ['allnotes', 'createnote', 'deletenote', 'editnote', 'shownote'];
        $invoiceAction = ['allinvoice', 'newinvoice', 'showinvoice', 'editinvoice','deleteinvoice', 'printinvoice', 'downloadinvoice', 'payconfirm'];
        $staffAction = ['allstaff', 'addstaff', 'deletestaff', 'sendmail', 'showstaff', 'editstaff'];
        $hoursAction = ['hours', 'addhours', 'chceckhours', 'printsummaryhours'];
        $companyAction = ['companydata','addcompanydata', 'editcompanydata'];

        switch($get)
        {
    case (in_array($get,$staffAction)):
        (new StaffController($request))->run(); 
        break;
    case (in_array($get,$notesAction)):
        (new NoteController($request))->run();  
        break;  
    case (in_array($get,$hoursAction)):
        (new HoursController($request))->run();       
        break;    
    case (in_array($get,$invoiceAction)):
        (new InvoiceController($request))->run();  
        break;
    case (in_array($get,$companyAction)):
        (new CompanyController($request))->run();  
        break;    
        }
    }





}