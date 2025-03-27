<div class="templatemo-content-widget white-bg">
            <p class="margin-bottom-0"></p>  
<!-- PASEK NAWIGACJI -->
<div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
                <li><a href="/?action=companydata" class="active">Wróć do danych firmy</a></li>
              </ul>  
            </nav> 
          </div>
        </div>            
</div>
<?php $company = $params['company']; ?>
<div class="templatemo-content-widget white-bg">
<h2 class="margin-bottom-10">Dane Twojej firmy</h2>
            <p>Dokonaj zmian w wybranych polach </p>
            <form action="/?action=editcompanydata" class="templatemo-login-form" method="post" >
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Nazwa firmy</label>
                    <input type="text" class="form-control" name="companyName" value="<?php echo $company['company_name']?>" required >                  
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Ulica i numer</label>
                    <input type="text" class="form-control" name="companyAdress" value="<?php echo $company['company_adress']?>" required>                  
                </div>
                </div>
                <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Kod pocztowy</label>
                    <input type="text" class="form-control" name="companyPostcode" value="<?php echo $company['company_postcode']?>" required>                  
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Miasto</label>
                    <input type="text" class="form-control" name="companyCity" value="<?php echo $company['company_city']?>" required>                  
                </div>
                </div>
                <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>NIP</label>
                    <input type="text" class="form-control" name="companyNip" value="<?php echo $company['company_nip']?>" required>                  
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Numer konta bankowego</label>
                    <input type="text" class="form-control" name="companyBankAcc" value="<?php echo $company['company_bank_acc']?>" required>                  
                </div>
                </div>
                <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Adres email</label>
                    <input type="email" class="form-control" name="companyEmail" value="<?php echo $company['company_email']?>" required>                  
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Numer telefonu</label>
                    <input type="tel" class="form-control" name="companyPhone" value="<?php echo $company['company_phone']?>" required>                  
                </div>
                </div>

              <div class="form-group text-right">
                <button type="submit" class="templatemo-blue-button">Zapisz dane firmy</button>
              </div>                           
            </form>
</div>
 