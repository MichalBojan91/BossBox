<?php

declare(strict_types=1);

namespace App\Controller;

require_once("src/View.php");
require_once("src/Database.php");
require_once("src/DatabaseCompany.php");
require_once("src/Controller/AbstractController.php");

use App\DatabaseCompany;
use App\Request;
use App\Controller\AbstractController;

class CompanyController extends AbstractController
{
    const DEFAULT_COMPANY_ACTION = 'companydata';

    protected DatabaseCompany $databaseCompany;

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->databaseCompany = new DatabaseCompany(self::$configuration['db']);
    }

    public function companydataAction():void
    {
        $this->view->render('companydata/companydata', ['company' =>$this->databaseCompany->getCompanyData(), 'before' => $this->request->getParam('before')]);
    }

    public function addCompanyDataAction():void
    {
        if($this->request->hasPost())
        {
            $this->databaseCompany->addCompanyData($this->getPostCompanyData());

            $this->redirect(self::DEFAULT_COMPANY_ACTION, ['before'=>'created']);
        }
        $this->view->render('companydata/addcompanydata');
    }

    public function editCompanyDataAction():void
    {
        if($this->request->hasPost())
        {
            $this->databaseCompany->editCompanyData($this->getPostCompanyData());

            $this->redirect(self::DEFAULT_COMPANY_ACTION, ['before'=>'edited']);
        }
        $this->view->render('companydata/editcompanydata', ['company'=>$this->databaseCompany->getCompanyData()]);
    }

    public function getCompanyData():array  
    {
        return $company = $this->databaseCompany->getCompanyData();
    }

    public function getPostCompanyData(): array
    {
        return $companyData = [
            'companyName' => $this->request->postParam('companyName'),
            'companyAdress' => $this->request->postParam('companyAdress'),
            'companyPostcode' => $this->request->postParam('companyPostcode'),
            'companyCity' => $this->request->postParam('companyCity'),
            'companyNip' => $this->request->postParam('companyNip'),
            'companyBankAcc' => $this->request->postParam('companyBankAcc'),
            'companyEmail' => $this->request->postParam('companyEmail'),
            'companyPhone' => $this->request->postParam('companyPhone'),
        ];
    }

}
