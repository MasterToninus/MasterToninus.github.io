<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" href="../img/terminal.ico" type="image/x-icon">
<link rel="icon" href="../img/terminal.ico" type="image/x-icon">
<head>
    <title>34st3r-3ggs</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../src/hacker.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/jpswalsh/academicons@1/css/academicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa&amp;display=swap" rel="stylesheet">

    <style>
    .tall-row {
        margin-top: 40px;
    }
    .modal {
        position: relative;
        top: auto;
        right: auto;
        left: auto;
        bottom: auto;
        z-index: 1;
        display: block;
    }
    </style>
</head>

<body>

<!-- ================================================= -->
<!-- TITLE - NAVABAR -->
<!-- ================================================= -->
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../">M4st3r-T0n1nus</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">CLICK ME!!!<span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="../">Home</a></li>
                            <li><a href="./eliminata.html">Eliminata</a></li>
                            <li><a href="./h4x0rs.html">Template</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Much Wow</li>
                            <li><a href="#">So link</a></li>
                            <li><a href="#">Many internet</a></li>
                        </ul>
                    </li>
                    <!--<li>
                        <a href="../"><i class="fa fa-2x fa-home"></i></a>
                    </li>-->
                </ul>
            </div>
        </div>
    </nav>


<!-- ================================================= -->
<!-- Contents -->
<!-- ================================================= -->    
    <div class="container">

        <!-- ================================================= -->
        <!-- JUMBOTRON -->
        <!-- ================================================= -->  
        <div class="jumbotron">
            <h1>34ST3r-3GGS</h1>
            <p>
              Welcome <a href="https://readyplayerone.fandom.com/wiki/Gunter ">Gunt3r</a>
            </p>
            <p>                
            Sezioni eliminate dalla vecchia versione del sito 
                <a class="btn btn-primary" href="./eliminata.html" id="stars">3l1m1n4t4</a>
            </p>
        </div>



        
        <!-- ================================================= -->
        <!-- TEMPLATE -->
        <!-- ================================================= -->         

        <!-- Typography -->
        <div class="row tall-row">
            <div class="col-lg-12">
                <h1>Typography</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h1>Heading 1</h1>
                <h2>Heading 2</h2>
                <h3>Heading 3</h3>
                <h4>Heading 4</h4>
                <h5>Heading 5</h5>
                <h6>Heading 6</h6>
            </div>
            <div class="col-md-4">
                <h2>Example body text</h2>
                <p>Doge doge doge doge <a href="#">Yeah!</a> Doge doge doge doge doge doge doge doge doge.</p>
                <p><small>Fine print</small></p>
                <p><strong>Bold text</strong>.</p>
                <p><em>Italicized text</em>.</p>
            </div>
            <div class="col-md-4">
                <h2>Emphasis classes</h2>
                <p class="text-primary">You put the emPHAsis on the wrong syLLAbles.</p>
                <p class="text-warning">Has Anyone Really Been Far Even as Decided to Use Even Go Want to do Look More Like?</p>
                <p class="text-danger">If the answer to all questions is yes, so why not?</p>
                <p class="text-success">And when everyone is super, no one will be.</p>
                <p class="text-info">The force will be with you, always.</p>
            </div>
        </div>


        <!-- ================================================= -->
        <!-- Footer -->
        <!-- ================================================= -->            
        <div class="row tall-row">
            <div class="col-md-12">
                <p>Powered by <a href="//github.com/Bachittarjeet/Hacker-Bootstrap-Template/" role="button">Hacker-Bootstrap-Template</a>. &copy; 2019</p>
            </div>
        </div>

    </div>


    <!-- ================================================= -->
    <!-- ??? -->
    <!-- ================================================= -->            
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <!-- Github stars script -->
    <script>
    $(document).ready(function(){
        $.getJSON("https://api.github.com/repos/Bachittarjeet/Hacker-Bootstrap-Template/", function(data){
            var stars = data['stargazers_count'];
            $("#stars").text(stars + " stars");
        });
    });
    </script>

    
</body>
</html>
