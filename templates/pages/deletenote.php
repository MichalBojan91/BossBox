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
            
              <div class="row form-group">
                <?php $note = $params['note'] ?? null; ?>
                <?php if($note) : ?>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label >Tytuł notatki</label>
                     <?php echo $note['title'] ?>                 
                </div>
                <div class="col-lg-12 form-group">                   
                    <label >Treść notatki: </label>
                    <?php echo $note['description'] ?>
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label >Data utworzenia</label>
                     <?php echo $note['created'] ?>                 
                </div>     

              </div>
              <div class="form-group text-right" >
              <form method="post" action="/?action=deletenote">
              
                <input type="hidden" name="id" value="<?php echo $note['id']?>"> </input>
                <input type="submit" class="templatemo-blue-button" value="Usuń notatkę"></input>
              
                </form>    
                </div>
              <?php else:?>
                <p>Brak notatki do wyświetlenia</p>  
                <?php endif ?>                       
          </div>