<div class="templatemo-content-widget white-bg">
            <!-- PASEK NAWIGACJI -->
<div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
                <li><a href="/?action=staff" class="active">Wróć do listy pracowników</a></li>
              </ul>  
            </nav> 
          </div>
        </div>            
</div>
        <div class="templatemo-content-widget no-padding">
        <h2 class="margin-bottom-10">Dodawanie pracownika</h2>
            <p>Uzupełnij pola aby dodać nowego pracownika</p>
            <form action="/?action=addstaff" class="templatemo-login-form" method="post" >
            <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Imię</label>
                    <input type="text" class="form-control" name="name" >                  
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Nazwisko</label>
                    <input type="text" class="form-control" name="surname">                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Data urodzenia</label>
                    <input type="date" class="form-control" name="birthDate">                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Data zatrudnienia</label>
                    <input type="date" class="form-control" name="startWork">                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group"> 
                  <label class="control-label templatemo-block">Departament</label>                 
                  <select class="form-control" name="department">
                    <option value="Produkcja">Produkcja</option>
                    <option value="Sprzedaż i marketing">Sprzedaż i marketing</option>  
                    <option value="Logistyka i zaopatrzenie">Logistyka i zaopatrzenie</option>
                    <option value="Finanse">Finanse</option>
                    <option value="Dział kadr">Dział kadr</option>
                    <option value="Magazyn">Magazyn</option>                    
                  </select>
                </div>
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Email</label>
                    <input type="text" class="form-control" name="email">                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Adres zamieszkania</label>
                    <input type="text" class="form-control" name="adress">                  
                </div> 
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label>Miasto</label>
                    <input type="text" class="form-control" name="city">                  
                </div> 
              </div>
              <div class="form-group text-right">
                <button type="submit" class="templatemo-blue-button">Dodaj pracownika</button>
              </div> 
            </form>
</div>                         
      