<div class="templatemo-content-widget white-bg">
            <!-- PASEK NAWIGACJI -->
<div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
                <li><a href="/?action=invoice" class="active">Wróć do listy faktur</a></li>
              </ul>  
            </nav> 
          </div>
        </div>            
</div>
<?php $invoice = $params['invoice'] ?? null;?>
        <div class="templatemo-content-widget no-padding">
        <h2 class="margin-bottom-10">Faktura nr:<?php echo $invoice['invoice_number'] ?></h2>
            <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Numer faktury</label>
                    <p> <?php echo $invoice['invoice_number']?> </p>                 
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Data dokumentu</label>
                    <p> <?php echo $invoice['document_date']?> </p>                
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Data sprzedaży</label>
                    <p> <?php echo $invoice['sell_date']?> </p>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Miejsce sprzedaży</label>
                    <p> <?php echo $invoice['sell_place']?> </p>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Numer konta bankowego</label>
                    <p> <?php echo $invoice['acc_number']?> </p>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group"> 
                  <label class="control-label templatemo-block">Waluta</label>                 
                  <p> <?php echo $invoice['current']?> </p>
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Nazwa kontrachenta</label>
                    <p> <?php echo $invoice['contractor_name']?> </p>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>NIP</label>
                    <p> <?php echo $invoice['NIP']?> </p>                 
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Adres(ulica)</label>
                    <p> <?php echo $invoice['contractor_adress']?> </p>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Kod pocztowy</label>
                    <p> <?php echo $invoice['contractor_postcode']?> </p>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Miasto</label>
                    <p> <?php echo $invoice['contractor_city']?> </p>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Nazwa produktu/usługi</label>
                    <p> <?php echo $invoice['product']?> </p>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Ilość</label>
                    <p> <?php echo $invoice['quantity']?> </p>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Cena netto</label>
                    <p> <?php echo $invoice['net_price']?> </p>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>stawka VAT</label>
                    <p> <?php echo $invoice['VAT']?> </p>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Cena brutto</label>
                    <p> <?php echo $invoice['brut_price']?> </p>                  
                </div> 
              </div>
              <div class="form-group text-right">
               <a href="/?action=editinvoice&id=<?php echo $invoice['id_invoice']?>"> <button class="templatemo-blue-button">Edytuj dane faktury</button></a>
               <a href="/?action=downloadinvoice&id=<?php echo (int)$invoice['id_invoice']?>"><button class="templatemo-blue-button">Pobierz</button></a>
               <a href="/?action=printinvoice&id=<?php echo (int)$invoice['id_invoice']?>"><button class="templatemo-blue-button">Drukuj</button></a>
              </div> 

            </form>
</div>                         
      