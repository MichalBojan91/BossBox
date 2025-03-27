<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Boss Box</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
   
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
    <link href="public/css/font-awesome.min.css" rel="stylesheet">
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/templatemo-style.css" rel="stylesheet">
    
  </head>
  <body>  
    <!-- Left column -->
    <div class="templatemo-flex-row">
      <div class="templatemo-sidebar">
        <header class="templatemo-site-header">
          <div class="square"></div>
          <h1>Boss Box</h1>
        </header>
        <div class="mobile-menu-icon">
            <i class="fa fa-bars"></i>
        </div>
        <nav class="templatemo-left-nav">          
          <ul>
            <li><a href="/" class="active"><i class="fa fa-home fa-fw"></i>Panel główny</a></li>
            <li><a href="/?action=allstaff"><i class="fa fa-bar-chart fa-fw"></i>Pracownicy</a></li>
            <li><a href="/?action=hours"><i class="fa fa-database fa-fw"></i>Godziny pracy</a></li>
            <li><a href="/?action=allinvoice"><i class="fa fa-database fa-fw"></i>Faktury</a></li>
            <li><a href="/?action=allnotes"><i class="fa fa-database fa-fw"></i>Notatki</a></li>
            <li><a href="/?action=companydata"><i class="fa fa-database fa-fw"></i>Dane firmy</a></li>
            <!-- WYLOGOWYWANIE OKODOWAC -->
            <!-- <li><a href="login.php"><i class="fa fa-eject fa-fw"></i>Wyloguj</a></li>  -->
          </ul>  
        </nav>
      </div>
      <!-- Main content --> 
      <div class="templatemo-content col-1 light-gray-bg">
        <!-- <div class="templatemo-top-nav-container"> -->
                    <!-- <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
                <li><a href="" class="active">Admin panel</a></li>
                <li><a href="">Dashboard</a></li>
                <li><a href="">Overview</a></li>
                <li><a href="login.html">Sign in form</a></li>
              </ul>  
            </nav> 
                    </div> -->
        <!-- </div> -->
                <div class="templatemo-content-container">
                
        <?php require_once("templates/pages/$page.php");?>

                
                </div>
            <!-- <div>
          <footer class="footer">
            <p>Copyright &copy; 2025 Boss Box
            | Design: MB</p>
          </footer>         
            </div> -->
      </div>
    </div>
  </body>
  
</html>