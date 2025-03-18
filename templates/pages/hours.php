<div class="templatemo-content-widget white-bg">
<!-- PASEK NAWIGACJI -->
<div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
                <li><a href="/?action=create" class="active">Pobierz zestawienie</a></li>
              </ul>  
            </nav> 
          </div>
        </div>            
</div>
<!-- TABELA         -->
<div class="templatemo-content-widget no-padding">
    <div class="panel panel-default table-responsive">
    <div class="panel-heading"><h2>Przepracowane godziny</h2></div>
        <table class="table table-striped table-bordered templatemo-user-table">
            <thead>
                <tr>
                    <td>Nr</td>
                    <td>Imię</td>
                    <td>Nazwisko</td>
                    <td>Ilość godzin</td>
                    <td>Akcje</td>
                </tr>
            </thead>
    <tbody>
    <?php //foreach($params['notes'] ?? [] as $note): ?>
        <tr>
            <td><?//php echo (int)$note['id']; ?>      </td>
            <td><?//php echo ($note['imie']); ?>      </td>
            <td><?//php echo ($note['nazwisko']); ?>      </td>
            <td><?//php echo ($note['godziny']); ?>      </td>
            <td><input type="number" name="addHours" value="8"/>
            <a href="/?action=delete&id=<?php //echo (int)$note['id']?>"><button> Dodaj godziny</button></a></td>
        </tr> 
    <?php //endforeach; ?>
        </tr>                    
    </tbody>
        </table>   
    </div> 
</div> 