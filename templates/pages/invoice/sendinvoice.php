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
        <?php $company = $params['company'] ?? null;?>
<div class="templatemo-content-widget white-bg">
<h2 class="margin-bottom-10">Wyślij fakturę do klienta</h2>
            <form action="/?action=sendinvoice" class="templatemo-login-form" method="post" >
                <input type="hidden" name="recipment" value="<?php echo $invoice['contractor_name']?>">
                <input type="hidden" name="invoiceId" value="<?php echo $invoice['id_invoice']?>">
                <input type="hidden" name="invoiceNumber" value="<?php echo $invoice['invoice_number']?>">
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Adres email</label>
                    <input type="email" class="form-control" name="email" >                  
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Tytuł wiadomości</label>
                    <input type="text" class="form-control" name="subject" value="Faktura: <?php echo $invoice['invoice_number']?> " >                  
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-12 form-group">                   
                    <label class="control-label">Treść wiadomości: </label>
                    <input class="form-control" name="body" value="Witaj, w załączniku wysyłam fakturę nr: <?php echo $invoice['invoice_number']?>.
                     Pozdrawiam, <?php echo $company['company_name']?> " >
                </div>
              </div>
              <div class="form-group text-right">
                <button type="submit" class="templatemo-blue-button">Wyślij</button>
              </div>                           
            </form>
</div>
 