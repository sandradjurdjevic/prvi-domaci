<!DOCTYPE html>
<html>
<head>
  <title>Prvi domaci</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://m.w3newbie.com/you-tube.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <script src="scrolling.js"></script>
  <link rel="stylesheet" href="style.css">
  <script type="text/javascript">
     $(document).on('click','.navbar-collapse.in',function(e) {
    if( $(e.target).is('a') && ( $(e.target).attr('class') != 'dropdown-toggle' ) ) {
        $(this).collapse('hide');
    }
    });
  </script>
</head>
<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
               </button>
               <!--<a class="navbar-brand" href="#"><img src="img/logo.png" height="55px"></a>-->
            </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right"> 
                <li><a href="#home">Home</a>
                <li><a href="#about">About</a>
                <li><a href="recepti2.php">Recepti</a>
                <li><a href="#kontakt">Kontakt</a>
            </ul>
        </div>
        </div>
    </nav>

    <div id="home">    
        <img src="img/pozadina.jpg" class="banner">
    </div>
    
    <div id="about" class="container-fluid text-center">    
        <h1>Dobro dosli!</h1>
        <br><br>
        <div class="row">
            <div class="col-md-6">
                <p>
                    Ideja Sladokusaca je da sa tobom razmeni dobru energiju, siroke osmehe i kucno pravljene i ukusne slatkise bez vestackih sastojaka. Ukoliko si voljan/na mozes postati deo nase slatke zajednice i doprineti svojim ukusnim receptima koje zelis da podelis sa drugima. Uvek smo raspolozeni za nesto slatko.
                </p>
            </div>
            <div class="col-md-6">
                <img src="img/logo.png" >
            </div>
        </div>
        <br>
       <!-- <h3>Mozes ti to!</h3>-->
    </div>

    <div id="proizvodi" class="container-fluid text-center">
        <h1>Hajde da kuvamo zajedno!</h1>
        <div class="row">
            <div class="col-md-4">
                <img src="img/bajadera.jpg">
                <h3>BAJADERA</h3>
            </div>
            <div class="col-md-4">
                <img src="img/rafaelo.jpg">
                <h3>RAFAELO</h3>
            </div>
            <div class="col-md-4">
                <img src="img/piskote.jpg">
                <h3>PISKOTE</h3>
            </div>

        </div>
        <!--<h2>Lako je i moze svako</h2>-->
        <br>
    </div>
    
    <footer id="kontakt" class="container-fluid text-center">
        <div class="row">
            <h2>Kontakt</h2>
            <div class="social">
                <a href="" target="_blank"><i class="fab fa-facebook"></i></a>
                <a href="" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="" target="_blank"><i class="fab fa-youtube"></i></a>
            </div>
        </div>

    </footer>

</body>
</html>