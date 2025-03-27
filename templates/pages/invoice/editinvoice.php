<script>
        function countNettValue() {
            let netto = parseFloat(document.getElementById("netPrice").value) || 0;
            let quantity = parseFloat(document.getElementById("quantity").value) || 0;
            let nettValue = quantity * netto ;
            document.getElementById("netValue").value = nettValue.toFixed(2);

            countVatValue();
            countBrutt();
        }

        function countVatValue() {
            let nettoValue = parseFloat(document.getElementById("netValue").value) || 0;
            let vat = parseFloat(document.getElementById("VAT").value) || 0;
            let vatValue = nettoValue * (vat / 100) ;
            document.getElementById("vatValue").value = vatValue.toFixed(2);

            countBrutt();
        }
        function countBrutt() {
            let nettValue = parseFloat(document.getElementById("netValue").value) || 0;
            let vatValue = parseFloat(document.getElementById("vatValue").value) || 0;
            let brutto = nettValue + vatValue;
            document.getElementById("brutPrice").value = brutto.toFixed(2);
        }
</script>



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
        <h2 class="margin-bottom-10">Edycja danych faktury</h2>
            <p>Dokonaj zmian w wybranych polach i zapisz fakturę</p>
            <form action="/?action=newinvoice" class="templatemo-login-form" method="post" >
            <div class="row form-group">
                <?php $invoice = $params['invoice'] ?>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Numer faktury</label>
                    <input type="text" class="form-control" name="invoiceNumber"  value="<?php echo $invoice['invoice_number']?>" required >                  
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
                    <input type="number" id="quantity" class="form-control" name="quantity" oninput="countNettValue(); countVatValue();" value="<?php echo $invoice['quantity']?>" required>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Cena netto</label>
                    <input type="number" class="form-control" id="netPrice" name="netPrice" oninput="countNettValue(); countVatValue();" value="<?php echo $invoice['net_price']?>" required >                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Wartość netto</label>
                    <input type="number" class="form-control" id="netValue" name="netValue" oninput="countVatValue(); countBrutt();" value="<?php echo $invoice['net_value']?>"  readonly >                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>stawka VAT</label>
                    <select class="form-control" name="VAT" id="VAT" oninput="countVatValue()" required>
                    <option value="23">23%</option>
                    <option value="8">8%</option>  
                    <option value="5">5%</option>
                  </select>              
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Wartość VAT</label>
                    <input type="number" class="form-control" id="vatValue" name="vatValue" oninput="countBrutt()" value="<?php echo $invoice['vat_value']?>" readonly >                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Cena brutto</label>
                    <input type="text" class="form-control" id="brutPrice" name="brutPrice" value="<?php echo $invoice['brut_price']?>" readonly>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Metoda płatności</label>
                    <select class="form-control" name="paymentMethod" required>
                    <option value="Przelew">Przelew</option>
                    <option value="Gotówka">Gotówka</option>  
                  </select>              
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Data płatności</label>
                    <input type="date" class="form-control" name="payDate" value="<?php echo $invoice['pay_date']?>" required>                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Status płatności</label>
                    <select class="form-control" name="payConfirm" required>
                    <option value="0" selected>Nieopłacona </option>
                    <option value="1">Opłacona</option>  
                  </select>                 
                </div> 
              </div>
              <div class="form-group text-right">
                <button type="submit" class="templatemo-blue-button">Zapisz fakturę</button>
              </div> 

            </form>
</div>                         
      