<?php
declare(strict_types=1);

namespace App\Controller;

require_once("src/View.php");
require_once("src/Database.php");
require_once("src/DatabaseNote.php");

use App\Controller\AbstractController;
use App\Exception\NotFoundException;
use App\DatabaseNote;
use App\Database;
use App\Request;


class NoteController extends AbstractController
{
    protected const DEFAULT_NOTE_ACTION = 'allnotes';

    protected DatabaseNote $databaseNote;

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->databaseNote = new DatabaseNote(self::$configuration['db']);
    }

   public function createnoteAction():void
    {
        if($this->request->hasPost()) {
            $noteData = [
                'title' => $this->request->postParam('title'),
                'description' => $this->request->postParam('description')
            ];   
            $this->databaseNote->createNote($noteData);
            $this->redirect(self::DEFAULT_NOTE_ACTION, ['before' =>'created' ]);  
        }
        $this->view->render('notes/createnote');
    }

    public function allnotesAction(): void 
    {
        $note = $this->databaseNote->getNotes();
        $this->view->render('notes/notes',
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
            $this->databaseNote->deleteNote((int) $this->request->postParam('id'));
            $this->redirect(self::DEFAULT_NOTE_ACTION, ['before' =>'deleted']);
        }
       $this->view->render('notes/deletenote', ['note' => $this->getNote()] );
    }

    public function editnoteAction(): void
    {   
        $noteData = [
            'title' => $this->request->postParam('title'),
            'description' => $this->request->postParam('description')
            ];    
        if($this->request->isPost()){
            $this->databaseNote->editNote($noteData, (int) $this->request->postParam('id'));
            $this->redirect(self::DEFAULT_NOTE_ACTION, ['before' =>'edited']);
        }

        $this->view->render('notes/editnote', ['note' => $this->getNote()]);
    }

    public function shownoteAction(): void
    {
    $this->view->render('notes/shownote', ['note' => $this->getNote()]);
    }

    private function getNote(): array
    {
        $noteId = (int)$this->request->getParam('id');
        if(!$noteId){
            $this->redirect(self::DEFAULT_NOTE_ACTION,['error'=> 'missingNoteId']);
            }
       
        try{
            $note = $this->databaseNote->getNote($noteId);
        } catch(NotFoundException $e) {
            $this->redirect(self::DEFAULT_NOTE_ACTION,['error'=> 'noteNotFound']);
        }
        return $note;
    }


}