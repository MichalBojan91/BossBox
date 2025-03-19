<div class="templatemo-content-widget white-bg">
            <!-- PASEK NAWIGACJI -->
<div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
                <li><a href="/?action=allinvoice" class="active">Wróć do listy faktur</a></li>
              </ul>  
            </nav> 
          </div>
        </div>            
</div>
        <div class="templatemo-content-widget no-padding">
        <h2 class="margin-bottom-10">Nowa faktura</h2>
            <p>Uzupełnij pola aby wystawić dokument</p>
            <form action="/?action=newinvoice" class="templatemo-login-form" method="post" >
            <div class="row form-group">
                <?php $invoiceNumber = $params['invoiceNumber'] ?>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Numer faktury</label>
                    <input type="text" class="form-control" name="invoiceNumber"  value="<?php echo $invoiceNumber?>" required >                  
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Data dokumentu</label>
                    <input type="date" class="form-control" name="documentDate" required>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Data sprzedaży</label>
                    <input type="date" class="form-control" name="sellDate" required>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Miejsce sprzedaży</label>
                    <input type="text" class="form-control" name="sellPlace" required>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Numer konta bankowego</label>
                    <input type="number" class="form-control" name="accNumber" required>                  
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
                    <input type="text" class="form-control" name="contractorName" required>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>NIP</label>
                    <input type="number" class="form-control" name="NIP" required>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Adres(ulica)</label>
                    <input type="text" class="form-control" name="contractorAdress" required>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Kod pocztowy</label>
                    <input type="text" class="form-control" name="contractorPostcode" required>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Miasto</label>
                    <input type="text" class="form-control" name="contractorCity" required>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Nazwa produktu/usługi</label>
                    <input type="text" class="form-control" name="product" required>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Ilość</label>
                    <input type="number" class="form-control" name="quantity" required>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Cena netto</label>
                    <input type="number" class="form-control" name="netPrice" required >                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>stawka VAT</label>
                    <input type="number" class="form-control" name="VAT" value="23" required>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Cena brutto</label>
                    <input type="number" class="form-control" name="brutPrice" required>                  
                </div> 
              </div>
              <div class="form-group text-right">
                <button type="submit" class="templatemo-blue-button">Zapisz fakturę</button>
              </div> 

            </form>
</div>                         
      