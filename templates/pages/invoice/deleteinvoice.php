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
<?php $invoice = $params['invoice'] ?? null;?>
<?php if($invoice) : ?>
        <div class="templatemo-content-widget no-padding">
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
                    Sprzedawca: <b>Adam Nowak</b> <br>
                    Adres: <b>ul. Nowoczesna 125, 12-345 Warszawa</b><br>
                    NIP: <b>987-65-43-123</b><br><br>
                </div>
                <div id="div-1e">
                    Nabywca: <b><?php echo $invoice['contractor_name']?></b><br>
                    Adres: <b><?php echo $invoice['contractor_adress'].' '.$invoice['contractor_postcode'].' '.$invoice['contractor_city']?></b><br>
                    NIP: <b><?php echo $invoice['NIP']?></b><br><br>
                </div>
                <div id="div-1f">
                    Sposob płatności: <b><?php echo $invoice['payment_method']?></b>
                    Termin płatności: <b><?php echo $invoice['pay_date']?></b><br>
                    
                    Numer konta: <b>78 140 0000 0000 0000 1234 5678</b>
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
                <p>Razem do zapłaty: <b><?php echo $invoice['brut_price']?></b></p>
            </div>
            <form method="post" action="/?action=deleteinvoice">
                <input type="hidden" name="id_invoice" value="<?php echo $invoice['id_invoice'] ?>" >
              <div class="form-group text-right">
               <button class="templatemo-blue-button" type="submit">Usuń fakturę</button>
            </form>
              </div> 
            <?php endif ?>
</div>                         
      