<div class="templatemo-content-widget white-bg">
            <p class="margin-bottom-0"></p>  
<!-- PASEK NAWIGACJI -->
<div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
                <li><a href="/?action=notes" class="active">Lista notatek</a></li>
              </ul>  
            </nav> 
          </div>
        </div>            
</div>
<div class="templatemo-content-widget white-bg">
<h2 class="margin-bottom-10">Edycja notatki</h2>
            <p>Uzupełnij pola aby zedytować notatkę</p>
            <form action="/?action=editnote" class="templatemo-login-form" method="post" >
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">   
                   <?php $note = $params['note'] ?? null; ?>  
                   <?php if($note) : ?>   
                   <input name="id" type="hidden" value="<?php echo ($note['id']) ?>" />         
                    <label for="inputFirstName">Tytuł notatki</label>
                    <input type="text" class="form-control" name="title" value=<?php echo $note['title'] ?> >                  
                </div>
              <div class="row form-group">
                <div class="col-lg-12 form-group">                   
                    <label class="control-label" for="inputNote">Treść notatki: </label>
                    <textarea class="form-control" name="description" rows="10" id="field5" ><?php echo $note['description'] ?></textarea>
                </div>
              </div>
              <div class="form-group text-right">
                <button type="submit" class="templatemo-blue-button">Zapisz zmiany</button>
              </div>                           
            </form>
            <?php else : ?>
                <h3>Brak notatki do wyświetlenia</h3>
            <?php endif ?>    
          </div>
 