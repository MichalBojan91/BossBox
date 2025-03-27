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
        <?php $invoice = $params['invoice'] ?? null;?>
        <?php $company = $params['company'] ?? null;?>
        <?php dump($invoice); ?>
    <body>

        <div id="Content">
            <div>
                <div id="div-1b">
                    <p><b>Faktura</b></p>
                </div>
                
                <div id="div-1d">
                    <p><b><?php echo $invoice['invoice_number']?></b></p>
                </div>

                <div id="div-1c">
                    Data sprzedaży: <b><?php echo $invoice['sell_date']?></b><br>
                </div>
                <br>
                <div id="div-1c">
                    Sprzedawca: <b><?php echo $company['company_name']?></b> <br>
                    Adres: <b><?php echo $company['company_adress'].' '.$company['company_postcode'].' '.$company['company_city'] ?></b><br>
                    NIP: <b><?php echo $company['company_nip']?></b><br><br>
                </div>
                <div id="div-1e">
                    Nabywca: <b><?php echo $invoice['contractor_name']?></b><br>
                    Adres: <b><?php echo $invoice['contractor_adress'].' '.$invoice['contractor_postcode'].' '.$invoice['contractor_city']?></b><br>
                    NIP: <b><?php echo $invoice['NIP']?></b><br><br>
                </div>
                <div id="div-1f">
                    Sposob płatności: <b><?php echo $invoice['payment_method']?></b>
                    Termin płatności: <b><?php echo $invoice['pay_date']?></b><br>
                    
                    Numer konta: <b><?php echo $company['company_bank_acc']?></b>
                </div>
            </div>
        <div>
        <br>
        <table border="1" id="tabela">
            <tr style="background-color: #bababa;">
                <th>Lp.</th>
                <th>Nazwa </th>
                <th>Ilość&nbsp;</th>
                <th>Cena netto&nbsp;</th>
                <th>Wartość netto&nbsp;</th>
                <th>Stawka VAT&nbsp;</th>
                <th>Kwota VAT&nbsp;</th>
                <th>Wartość brutto&nbsp;</th>
            </tr>
            <tr>
                <td>1</td>
                <td><?php echo $invoice['product']?>&nbsp;&nbsp;</td>
                <td><?php echo $invoice['quantity']?></td>
                <td><?php echo $invoice['net_price']?></td>
                <td><?php echo $invoice['net_value']?></td>
                <td><?php echo $invoice['VAT']?></td>
                <td><?php echo $invoice['vat_value']?></td>
                <td><?php echo $invoice['brut_price']?></td>
            </tr>
        </table><br>
        </div>
            <div id="div-sum">
                <h2><p>Razem do zapłaty: <b><?php echo $invoice['brut_price']?></b></p></h2>
            </div>
              <div class="form-group text-right">
               <a href="/?action=payconfirm&id=<?php echo $invoice['id_invoice']?>"> <button class="templatemo-blue-button">Faktura opłacona</button></a>
               <a href="/?action=editinvoice&id=<?php echo $invoice['id_invoice']?>"> <button class="templatemo-blue-button">Edytuj dane faktury</button></a>
               <a href="/?action=downloadinvoice&id=<?php echo (int)$invoice['id_invoice']?>"><button class="templatemo-blue-button">Pobierz/Drukuj</button></a>
              </div> 
            </form>
</div>                         
      