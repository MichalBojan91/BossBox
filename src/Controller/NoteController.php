<?php
declare(strict_types=1);

namespace App;

require_once("src/View.php");
require_once("src/Database.php");

use App\Controller\AbstractController;
use App\Exception\AppException;
use App\Exception\ConfigurationException;
use App\Exception\NotFoundException;

class NoteController extends AbstractController
{
    protected const DEFAULT_NOTE_ACTION = 'notes';

   public function createnoteAction():void
    {
        if($this->request->hasPost()) {
            $noteData = [
                'title' => $this->request->postParam('title'),
                'description' => $this->request->postParam('description')
            ];    
            $this->database->createNote($noteData);
            $this->redirect(self::DEFAULT_NOTE_ACTION, ['before' =>'created' ]);  //przeniesienie i przekazanie parametru zeby wyświetlić info
        }
        $this->view->render('createnote');
    }

    public function notesAction(): void
    {
        $note = $this->database->getNotes();
        $this->view->render('notes',
            [
                'notes' => $note,
                'before' => $this->request->getParam('before'),
                'error' => $this->request->getParam('error')
            ]
        );   
        
    }
    public function deletenoteAction(): void //musimy przekazać postem aby nie można było usunąć notatki wpisując w adres dowolne id
    {
        if($this->request->isPost()){
            $this->database->deleteNote((int) $this->request->postParam('id'));
            $this->redirect(self::DEFAULT_NOTE_ACTION, ['before' =>'deleted']);
        }
       $this->view->render('deletenote', ['note' => $this->getNote()] );
    }

public function editnoteAction(): void
{   
    $noteData = [
        'title' => $this->request->postParam('title'),
        'description' => $this->request->postParam('description')
    ];    
    if($this->request->isPost()){
        $this->database->editNote($noteData, (int) $this->request->postParam('id'));
        $this->redirect(self::DEFAULT_NOTE_ACTION, ['before' =>'edited']);
    }

    $this->view->render('editnote', ['note' => $this->getNote()]);//renderuje strone editnote i przekazuje dane notatki w edycji
}

public function shownoteAction(): void
{
    $this->view->render('shownote', ['note' => $this->getNote()]);//renderuje strone shownote i przekazuje dane notatki do wyświetlenia
}
private function getNote(): array
    {
        $noteId = (int)$this->request->getParam('id');
        if(!$noteId){
            $this->redirect(self::DEFAULT_NOTE_ACTION,['error'=> 'missingNoteId']);
            }
       
        try{
            $note = $this->database->getNote($noteId);
        } catch(NotFoundException $e) {
            $this->redirect(self::DEFAULT_NOTE_ACTION,['error'=> 'noteNotFound']);
        }
        return $note;
    }


}