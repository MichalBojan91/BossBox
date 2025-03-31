<?php if(!empty($params['before'])): ?>
<div class="yellow-bg">
   <h3>
   <?php 
    switch($params['before'])
    {   
        case 'created':
            echo 'Faktura zapisana ';
            break;
        case 'edited':
            echo 'Dane faktury zostały zaktualizowane';
            break;
        case 'deleted':
            echo 'Dane faktury usunięte z bazy';        
            break;
        case 'payconfirmed':
            echo 'Zmieniono status płatności';        
            break; 
        case 'invoicesent':
            echo 'Faktura wysłana do klienta';        
            break; 

    }
    ?>
   </h3>
   <?php endif ?>
   <?php if(!empty($params['error'])): ?>
<div class="yellow-bg">
   <h3>
   <?php 
    switch($params['error'])
    {   
        case 'missingInvoiceId':
            echo 'Brak danych, spróbuj ponowniewweewe';
            break;
        case 'invoiceNotFound':
            echo 'Brak danych, spróbuj ponownie';
            break;
    }
    ?>
   </h3>
</div>
<?php endif; ?>

<div class="templatemo-content-widget white-bg">
<!-- PASEK NAWIGACJI -->
<div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
                <li><a href="/?action=newinvoice" class="active">Wystaw fakturę</a></li>
              </ul>  
            </nav> 
          </div>
        </div>            
</div>
<!-- TABELA         -->
 <?php //dump($params);?>
<div class="templatemo-content-widget no-padding">
    <div class="panel panel-default table-responsive">
    <div class="panel-heading"><h2>Lista faktur</h2></div>
        <table class="table table-striped table-bordered templatemo-user-table">
            <thead>
                <tr>
                    <td width=100>Numer dokumentu</td>
                    <td width=100>Data sprzedaży</td>
                    <td width=300>Kontrachent</td>
                    <td width=150>NIP</td>
                    <td width=150>Produkt/usługa</td>
                    <td width=100>Kwota brutto</td>
                    <td width=100>Dni do zapłaty</td>
                    <td width=200>Opcje</td>
                </tr>
            </thead>
            <tbody>
               <?php foreach($params['invoices'] ?? [] as $invoice): ?>
                <tr>
                    <td><?php echo ($invoice['invoice_number']);?></td>
                    <td><?php echo ($invoice['sell_date']);?></td>
                    <td><?php echo ($invoice['contractor_name']);?></td>
                    <td><?php echo ($invoice['NIP']);?></td>
                    <td><?php echo ($invoice['product']);?></td>
                    <td><?php echo ($invoice['brut_price']);?></td>
                    <td> 
                        <?php if($invoice['pay_confirm'] ?? null):?>
                            <span style="color: green;">Faktura opłacona</span>
                        <?php else: ?>
                            <?php $payDate = new DateTime($invoice['pay_date']);
                              $today = new DateTime();
                              $diff = $today->diff($payDate);
                              $daysToPay = $diff->days+1; ?>
                        <?php if($payDate>$today):?>
                            <span style="color: green;"><?php echo $daysToPay ?></span>
                        <?php endif;?>  
                        <?php if($payDate<$today):?>
                            <span style="color: red;"><?php echo '-'.$daysToPay ?></span>
                        <?php endif;?>
                        <?php endif;?>  
                    </td>
                    <td><a href="/?action=showinvoice&id=<?php echo (int)$invoice['id_invoice']?>"><button>Szczegóły</button></a>
                    <a href="/?action=deleteinvoice&id=<?php echo (int)$invoice['id_invoice']?>"><button>Usuń</button></a>
                    </td>

                </tr> 
                    <?php endforeach; ?>
                </tr>                    
            </tbody>
    </table>    
    </div> 
</div> 