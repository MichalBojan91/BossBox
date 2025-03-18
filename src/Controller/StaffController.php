<?php
declare(strict_types=1);

namespace App;

use App\Controller\AbstractController;
use App\Exception\AppException;
use App\Exception\NotFoundException;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\SendMail;

require_once("src/View.php");
require_once("src/Database.php");
require_once("PHPMailer/src/PHPMailer.php");
require_once("PHPMailer/src/Exception.php");
require_once("PHPMailer/src/SMTP.php");

class StaffController extends AbstractController
{
    private const DEFAULT_STAFF_ACTION = 'staff';
    
    public function staffAction(): void
    {
        $staff = $this->database->getStaff();
        $this->view->render('staff',
            [
                'staff' => $staff,
                'before' => $this->request->getParam('before'),
                'error' => $this->request->getParam('error')
            ]
        );   
    }
    
    public function addstaffAction():void
    {
        if($this->request->hasPost()) {
            $workerData = [
                'name' => $this->request->postParam('name'),
                'surname' => $this->request->postParam('surname'),
                'birthDate' => $this->request->postParam('birthDate'),
                'startWork' => $this->request->postParam('startWork'),
                'department' => $this->request->postParam('department'),
                'adress' => $this->request->postParam('adress'),
                'city' => $this->request->postParam('city'),
                'email' => $this->request->postParam('email')
            ];
            $this->database->addStaff($workerData);

            $this->redirect(self::DEFAULT_STAFF_ACTION, ['before' =>'created' ]);  //przeniesienie i przekazanie parametru zeby wyświetlić info
        }
        $this->view->render('addstaff');
    }

    public function editstaffAction():void
    {
        $workerData = [
            'name' => $this->request->postParam('name'),
            'surname' => $this->request->postParam('surname'),
            'birthDate' => $this->request->postParam('birthDate'),
            'startWork' => $this->request->postParam('startWork'),
            'department' => $this->request->postParam('department'),
            'adress' => $this->request->postParam('adress'),
            'city' => $this->request->postParam('city'),
            'email' => $this->request->postParam('email')
        ];
        if($this->request->isPost()) {
            $workerId = (int)$this->request->postParam('id_worker');
            $this->database->editStaff($workerData, $workerId);

            $this->redirect(self::DEFAULT_STAFF_ACTION, ['before' =>'edited' ]);  //przeniesienie i przekazanie parametru zeby wyświetlić info
        }
        $this->view->render('editstaff', ['worker'=>$this->getWorkerData()]);
    }


    public function showstaffAction(): void
    {
        $this->view->render('showstaff', ['worker'=>$this->getWorkerData()]);
    }

    public function getWorkerData(): array
    {
       $workerId = (int)$this->request->getParam('id'); 
       if(!$workerId){
        $this->redirect(self::DEFAULT_STAFF_ACTION, ['error' =>'missingStaffId' ]);
       } 
       try{
        $worker = $this->database->getWorker($workerId);
       }catch(NotFoundException $e){
        $this->redirect(self::DEFAULT_STAFF_ACTION, ['error' =>'staffNotFound' ]);
       }
       return $worker;
    }

    public function deletestaffAction(): void
    {
        if($this->request->isPost())
        {
            $workerId = (int)$this->request->postParam('id_worker');
            $this->database->deletestaff($workerId);
            $this->redirect(self::DEFAULT_STAFF_ACTION, ['before' =>'deleted' ]);
        }
        $this->view->render('deletestaff', ['worker' => $this->getWorkerData() ]);

    }

    public function sendmailAction(): void
    {
        $mailData = [
            'email' => $this->request->postParam('email'),
            'subject' => $this->request->postParam('subject'),
            'body' => $this->request->postParam('body'),
            'recipment' => $this->request->postParam('recipment')
        ];

    if($this->request->isPost()){
        $this->sendMail->SendMail($mailData);
        
        $this->redirect(self::DEFAULT_STAFF_ACTION, ['before' =>'mailsent' ]);
    }
    $this->view->render('sendmail', ['worker' => $this->getWorkerData()]);
}

}


