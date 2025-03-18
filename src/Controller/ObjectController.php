<?php 

declare(strict_types=1);

namespace App\Controller;

use App\StaffController;
use App\HoursController;
use App\InvoiceController;
use App\NoteController;

class ObjectController
{
    

    public static function ObjectSwitch(?string $get, $request):void
    {
        $notesAction = ['notes', 'createnote', 'deletenote', 'editnote', 'shownote'];
        $invoiceAction = ['invoice', 'newinvoice', 'showinvoice', 'editinvoice','deleteinvoice', 'printinvoice', 'downloadinvoice'];
        $staffAction = ['staff', 'addstaff', 'deletestaff', 'sendmail', 'showstaff', 'editstaff'];
        $hoursAction = ['hours', 'addhours', 'chceckhours', 'printsummaryhours'];

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
        }
    }





}