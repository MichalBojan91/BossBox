<?php if(!empty($params['before'])): ?>
<div class="yellow-bg">
   <h3>
   <?php 
    switch($params['before'])
    {   
        case 'created':
            echo 'Pracownik dodany do bazy';
            break;
        case 'edited':
            echo 'Dane pracownika zaktualizowane';
            break;
        case 'deleted':
            echo 'Dane pracownika usunięte z bazy';        
            break;
        case 'mailsent':
            echo 'Wiadomość została wysłana';
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
        case 'missingStaffId':
            echo 'Brak danych, spróbuj ponownie';
            break;
        case 'staffNotFound':
            echo 'Brak danych, spróbuj ponownie';
            break;
        case 'mailError':
            echo 'Nie udało się wysłać wiadomości';
            break;    
    }
    ?>
   </h3>
</div>
<?php endif; ?>
<div class="templatemo-content-widget white-bg">
            <!-- PASEK NAWIGACJI -->
<div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
                <li><a href="/?action=addstaff" class="active">Dodaj pracownika</a></li>
              </ul>  
            </nav> 
          </div>
        </div>            
</div>
        <div class="templatemo-content-widget no-padding">
            <div class="panel panel-default table-responsive">
            <div class="panel-heading"><h2>Twoi pracownicy</h2></div>
              <table class="table table-striped table-bordered templatemo-user-table">
                <thead>
                  <tr>
                    <td width=50>#</td>
                    <td width=200>Imię</td>
                    <td width=200>Nazwisko</td>
                    <td width=200>Wydział</td>
                    <td width=200>Email</td>
                    <td width=150>Akcje</td>
                  </tr>
                </thead>
                <tbody>
                  
        <?php foreach($params['staff'] ?? [] as $staff): ?>
             <tr>
                <td><?php echo $staff['id_worker']; ?>      </td>
                <td><?php echo ($staff['name']); ?>      </td>
                <td><?php echo ($staff['surname']); ?>      </td>
                <td><?php echo ($staff['department']); ?>      </td>
                <td><?php echo ($staff['email']); ?>      </td>
                <td><a href="/?action=showstaff&id=<?php echo (int)$staff['id_worker']?>"><button>Szczegóły</button></a>
                <a href="/?action=deletestaff&id=<?php echo (int)$staff['id_worker']?>"><button> Usuń</button></a></td>
             </tr> 
            <?php endforeach; ?>
        </tbody>
              </table>    
            </div>                          
          </div>     