<div class="templatemo-content-widget white-bg">
            <!-- PASEK NAWIGACJI -->
<div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
                <li><a href="/?action=staff" class="active">Wróć do listy pracowników</a></li>
              </ul>  
            </nav> 
          </div>
        </div>            
</div>

<div class="templatemo-content-widget no-padding">
        <h2 class="margin-bottom-10">Dane pracownika</h2>
            <div class="row form-group">
                <?php $worker = $params['worker'] ?? null; ?>
                <?php if($worker) : ?>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Imię</label>
                    <p><?php echo $worker['name'] ?></p>
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Nazwisko</label>
                    <p><?php echo $worker['surname'] ?></p>                 
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Data urodzenia</label>
                    <p><?php echo $worker['birth_date'] ?></p>                 
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Data zatrudnienia</label>
                    <p><?php echo $worker['start_work'] ?></p>                
                </div> 
                <div class="col-lg-6 col-md-6 form-group"> 
                  <label class="control-label templatemo-block">Departament</label>                 
                  <p><?php echo $worker['department'] ?></p>
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Email</label>
                    <p><?php echo $worker['email'] ?></p>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Adres zamieszkania</label>
                    <p><?php echo $worker['adress'] ?></p>               
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Miasto</label>
                    <p><?php echo $worker['city'] ?></p>                  
                </div> 
              </div>
              <?php endif ?>
              <div class="form-group text-right">
                <button><a href="/?action=editstaff&id=<?php echo (int)$worker['id_worker'] ?>"> Edytuj dane pracownika</button></a>
                <button><a href="/?action=sendmail&id=<?php echo (int)$worker['id_worker'] ?>"> Wyślij wiadomość email</button></a>
              </div> 
</div>                         
          </div>  