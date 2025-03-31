<div class="templatemo-content-widget white-bg">
            <!-- PASEK NAWIGACJI -->
<div class="templatemo-top-nav-container">
    <?php $staff = $params['worker']; ?>
    <?php $recipment = $staff['name'].' '.$staff['surname'] ?>
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
                <li><a href="/?action=allstaff" class="active">Wróć do listy pracowników</a></li>
                <li><a href="/?action=showstaff&id=<?php echo (int)$staff['id_worker']?>" class="active">Wróć do danych pracownika: <?php echo $recipment?></a></li>
              </ul>  
            </nav> 
          </div>
        </div>            
</div>
<div class="templatemo-content-widget white-bg">
<h2 class="margin-bottom-10">Wyślij wiadomość do pracownika</h2>
            <p>Uzupełnij tytuł i treść wiadomości</p>
            <form action="/?action=sendmail" class="templatemo-login-form" method="post" >
                <input type="hidden" name="email" value="<?php echo $staff['email']?>">
                <input type="hidden" name="recipment" value="<?php echo $recipment?>">
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Tytuł wiadomości</label>
                    <input type="text" class="form-control" name="subject" >                  
                </div>
              <div class="row form-group">
                <div class="col-lg-12 form-group">                   
                    <label class="control-label">Treść wiadomości: </label>
                    <textarea class="form-control" name="body" rows="10" id="field5"></textarea>
                </div>
              </div>
              <div class="form-group text-right">
                <button type="submit" class="templatemo-blue-button">Wyślij</button>
              </div>                           
            </form>
</div>
 