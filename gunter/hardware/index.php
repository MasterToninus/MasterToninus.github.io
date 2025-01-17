<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Personal Computer History</title>
    <link href="../../src/hacker.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/jpswalsh/academicons@1/css/academicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa&amp;display=swap" rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/bitwise" rel="stylesheet">
</head>
<body>
    <!DOCTYPE html>
    <html lang="en">
    <link rel="shortcut icon" href="../../img/terminal.ico" type="image/x-icon">
    <link rel="icon" href="../../img/terminal.ico" type="image/x-icon">
    <head>
        <title>C0mput3r hystory</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../src/hacker.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/jpswalsh/academicons@1/css/academicons.min.css">
        <link href="https://fonts.googleapis.com/css?family=Comfortaa&amp;display=swap" rel="stylesheet">
        <link href="http://fonts.cdnfonts.com/css/bitwise" rel="stylesheet">

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
            body {
                overflow-x: hidden; /* Prevent horizontal scrollbar */
            }
        </style>
    </head>
    <!-- ================================================= -->
    <!-- TITLE - NAVABAR -->
    <!-- ================================================= -->
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header"></div></div>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../">
                    <i class="fa fa-1x fa-terminal"></i> 
                    M4st3r-T0n1nus
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Menu<span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="../eliminata.html">Eliminata</a></li>
                            <li><a href="../h4x0rs.html">Template</a></li>
                            <li><a href="../facciata.php">Protocollo Facciata</a></li>
                            <li><a href="../meteo">Meteo</a></li>
                            <li><a href="../gallery/index.html#fototrappla">Photo Gallery</a></li>            
                        </ul>
                    </li>
                    <li>
                        <a href="../../"><i class="fa fa-1x fa-home"></i></a>
                    </li>
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
            <h1>My Personal Computer History</h1>
        </div>
        <!-- ================================================= -->
        <!-- PHP! -->
        <!-- ================================================= -->    
        <?php
        // Enable error reporting for debugging
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        // Load the YAML file containing PC data
        $yamlFile = 'pc_data.yaml';
        $yamlData = [];
        $lastModified = '';

        if (file_exists($yamlFile)) {
            $yamlData = yaml_parse_file($yamlFile);
            $lastModified = date("F d, Y H:i:s", filemtime($yamlFile));
        } else {
            echo "<p>Error: YAML file not found.</p>";
        }

        // Check if the YAML data is not empty
        if (!empty($yamlData)) {
            foreach ($yamlData as $pc) {
                echo "<div class='row tall-row'>";
                echo "<div class='col-md-12'>";
                echo "<h2 class='text-center'><a href='{$pc['url']}' target='_blank'>{$pc['name']}</a></h2>";
                echo "<hr>";
                echo "</div>";

                // Image gallery for the PC
                echo "<div class='col-md-6'>";
                echo "<div id='carousel-{$pc['id']}' class='carousel slide' data-ride='carousel'>";
                echo "<div class='carousel-inner'>";
                foreach ($pc['images'] as $index => $image) {
                    $active = $index === 0 ? 'active' : '';
                    echo "<div class='item $active'>";
                    echo "<img src='{$image}' alt='PC Image'>";
                    echo "</div>";
                }
                echo "</div>"; // Close carousel-inner
                echo "<a class='left carousel-control' href='#carousel-{$pc['id']}' role='button' data-slide='prev'>";
                echo "<span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span>";
                echo "<span class='sr-only'>Previous</span>";
                echo "</a>";
                echo "<a class='right carousel-control' href='#carousel-{$pc['id']}' role='button' data-slide='next'>";
                echo "<span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span>";
                echo "<span class='sr-only'>Next</span>";
                echo "</a>";
                echo "</div>"; // Close carousel
                echo "</div>"; // Close image column

                // Component table for the PC
                echo "<div class='col-md-6'>";
                echo "<h2>Components</h2>";
                echo "<table class='table table-striped'>";
                echo "<thead><tr><th>Component</th><th>Model</th><th>URL</th><th>Cost</th><th>Revision Date</th></tr></thead><tbody>";

                foreach ($pc['components'] as $component => $details) {
                    $revision = $details['revision'] ?? null;
                    echo "<tr>";
                    echo "<td>{$component}</td>";
                    echo "<td>{$details['model']}</td>";
                    echo "<td><a href='{$details['url']}' target='_blank'>Link</a></td>";
                    echo "<td>{$details['cost']}</td>";
                    echo "<td>" . ($revision ? $revision['date'] : 'N/A') . "</td>";
                    echo "</tr>";
                }

                echo "</tbody></table>";
                echo "</div>"; // Close component column

                echo "</div>"; // Close row
            }
        } else {
            echo "<p>No PC data available.</p>";
        }
        ?>
    </div>
    <!-- ================================================= -->
    <!-- Footer -->
    <!-- ================================================= -->
    <footer class="text-center">
        <p>&copy; <?php echo date('Y'); ?> My Personal Computer History</p>
        <p>Last updated: <?php echo $lastModified ?: 'Unknown'; ?></p>
        <p>Disclaimer: This page was generated using ChatGPT. Model version: GPT-4</p>
        <p>Powered by <a href="//github.com/Bachittarjeet/Hacker-Bootstrap-Template/" role="button">Hacker-Bootstrap-Template</a>. &copy; 2019</p>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
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


