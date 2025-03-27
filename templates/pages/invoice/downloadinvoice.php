<!DOCTYPE html>
<html lang="pl">
<?php $invoice = $params['invoice'] ?? null;?>
<?php $company = $params['company'] ?? null;?>
    <head>
        <meta charset="utf-8">
        <title>Faktura: <?php echo $invoice['invoice_number']?></title>
        <link rel="stylesheet" type="text/css" href="meh.css">
    </head>
    <body>
        <div id="Content">
            <div>
                <div id="div-1b">
                    <p><b>Faktura <?php echo $invoice['invoice_number']?></b></p>
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
                <p>Razem do zapłaty: <b><?php echo $invoice['brut_price']?></b></p>
            </div>
            <div >
                <p>Podpis odbiorcy</p><br><br>
            </div>
            <div id="div-wys">
                <p>Podpis wystawiającego</p>
            </div>
       </div>
    </body>
</html>