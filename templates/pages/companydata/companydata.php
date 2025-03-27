<?php if(!empty($params['before'])): ?>
<div class="yellow-bg">
   <h3>
   <?php 
    switch($params['before'])
    {   
        case 'created':
            echo 'Dane firmy zapisane w bazie';
            break;
        case 'edited':
            echo 'Dane firmy zostały zaktualizowane';
            break;
    }
    ?>
   </h3>
   <?php endif ?>
</div>   
<div class="templatemo-content-widget white-bg">

            <!-- PASEK NAWIGACJI -->
<div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              
            </nav> 
          </div>
        </div>            
</div>
<?php $company = $params['company'] ?? null; ?>
<?php if($company) : ?>
<div class="templatemo-content-widget no-padding">
        <h2 class="margin-bottom-10">Dane Twojej firmy</h2>
            <div class="row form-group">
               
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Nazwa firmy</label>
                    <p><?php echo($company['company_name']) ?></p>
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Adres</label>
                    <p><?php echo $company['company_adress'].' '.$company['company_postcode'].' '.$company['company_city'] ?></p>                 
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>NIP</label>
                    <p><?php echo $company['company_nip'] ?></p>                 
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Numer konta bankowego</label>
                    <p><?php echo $company['company_bank_acc'] ?></p>                
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Adres email</label>
                    <p><?php echo $company['company_email'] ?></p>                
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Numer telefonu</label>
                    <p><?php echo $company['company_phone'] ?></p>                
                </div> 
              </div>
              <div class="form-group text-right">
                <a href="/?action=editcompanydata"><button class="templatemo-blue-button"> Edytuj dane firmy</button></a>
              </div> 
              <?php else: ?>
                <h1>BRAK DANYCH, UZUPEŁNIJ DANE FIRMY</h1>
              <div class="form-group text-right">
                <a href="/?action=addcompanydata"><button class="templatemo-blue-button"> Dodaj dane firmy</button></a>
              </div>
              <?php endif ?>
              
</div>                         
          </div>  