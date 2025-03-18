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
<?php $invoice = $params['invoice'] ?>
<?php dump($invoice) ?>
        <div class="templatemo-content-widget no-padding">
        <h2 class="margin-bottom-10">Edycja danych faktury</h2>
            <p>Edytuj wybrane pola aby dokonać zmian w dokumencie</p>
            <form action="/?action=editinvoice" class="templatemo-login-form" method="post" >
            <input type="hidden" name="id_invoice"  value="<?php echo $invoice['id_invoice']?>">
            <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Numer faktury</label>
                    <input type="text" class="form-control" name="invoiceNumber"  value="<?php echo $invoice['invoice_number']?>" required >                  
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Data dokumentu</label>
                    <input type="date" class="form-control" name="documentDate" value="<?php echo $invoice['document_date']?>" required>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Data sprzedaży</label>
                    <input type="date" class="form-control" name="sellDate" value="<?php echo $invoice['sell_date']?>" required>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Miejsce sprzedaży</label>
                    <input type="text" class="form-control" name="sellPlace" value="<?php echo $invoice['sell_place']?>" required>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Numer konta bankowego</label>
                    <input type="number" class="form-control" name="accNumber" value="<?php echo $invoice['acc_number']?>" required>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group"> 
                  <label class="control-label templatemo-block">Waluta</label>                 
                  <select class="form-control" name="current" required>
                    <option value="PLN">PLN</option>
                    <option value="EUR">EUR</option>  
                    <option value="USD">USD</option>
                    <option value="GBP">GBP</option>
                  </select>
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Nazwa kontrachenta</label>
                    <input type="text" class="form-control" name="contractorName" value="<?php echo $invoice['contractor_name']?>" required>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>NIP</label>
                    <input type="number" class="form-control" name="NIP" value="<?php echo $invoice['NIP']?>" required>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Adres(ulica)</label>
                    <input type="text" class="form-control" name="contractorAdress" value="<?php echo $invoice['contractor_adress']?>" required>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Kod pocztowy</label>
                    <input type="text" class="form-control" name="contractorPostcode" value="<?php echo $invoice['contractor_postcode']?>" required>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Miasto</label>
                    <input type="text" class="form-control" name="contractorCity" value="<?php echo $invoice['contractor_city']?>" required>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Nazwa produktu/usługi</label>
                    <input type="text" class="form-control" name="product" value="<?php echo $invoice['product']?>" required>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Ilość</label>
                    <input type="number" class="form-control" name="quantity" value="<?php echo $invoice['quantity']?>" required>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Cena netto</label>
                    <input type="number" class="form-control" name="netPrice" value="<?php echo $invoice['net_price']?>" required >                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>stawka VAT</label>
                    <input type="number" class="form-control" name="VAT" value="<?php echo $invoice['VAT']?>" required>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Cena brutto</label>
                    <input type="number" class="form-control" name="brutPrice" value="<?php echo $invoice['brut_price']?>" required>                  
                </div> 
              </div>
              <div class="form-group text-right">
                <button type="submit" class="templatemo-blue-button">Zapisz fakturę</button>
              </div> 

            </form>
</div>                         
      