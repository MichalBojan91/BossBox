<?php if(!empty($params['before'])): ?>
<div class="yellow-bg">
   <h3>
   <?php 
    switch($params['before'])
    {   
        case 'created':
            echo 'Notatka została utworzona';
            break;
        case 'edited':
            echo 'Notatka zaktualizowana';
            break;
        case 'deleted':
            echo 'Notatka usunięta';        
            break;
    }
    ?>
   </h3>
   <?php endif ?>
   <?php if(!empty($params['error'])): ?>
<div class="yellow-bg">
   <h3>
   <?php 
    switch($params['error'])
    {   
        case 'missingNoteId':
            echo 'Brak notatki, spróbuj ponownie';
            break;
        case 'noteNotFound':
            echo 'Brak notatki, spróbuj ponownie';
            break;
    }
    ?>
   </h3>
</div>
<?php endif; ?>
<div class="templatemo-content-widget white-bg">

            <p class="margin-bottom-0"></p>  
            
<!-- PASEK NAWIGACJI -->
<div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
                <li><a href="/?action=createnote" class="active">Dodaj notatkę</a></li>
              </ul>  
            </nav> 
          </div>
        </div>            
</div>
<!-- TABELA         -->
<div class="templatemo-content-widget no-padding">
    <div class="panel panel-default table-responsive">
    <div class="panel-heading"><h2>Lista notatek</h2></div>
        <table class="table table-striped table-bordered templatemo-user-table">
            <thead>
                <tr>
                    <td width=100>Nr</td>
                    <td width=600> Tytuł</td>
                    <td width=300>Data</td>
                    <td width=300>Opcje</td>
                </tr>
            </thead>
    <tbody>
    <?php foreach($params['notes'] ?? [] as $note): ?>
        <tr>
            <td><?php echo (int)($note['id']); ?>      </td>
            <td><?php echo ($note['title']); ?>      </td>
            <td><?php echo ($note['created']); ?>      </td>
            <td><a href="/?action=shownote&id=<?php echo (int)$note['id']?>"><button>Szczegóły</button></a>
            <a href="/?action=deletenote&id=<?php echo (int)$note['id']?>"><button> Usuń</button></a></td>
        </tr> 
    <?php endforeach; ?>
        </tr>                    
    </tbody>
        </table>   
    </div> 
</div>  
      