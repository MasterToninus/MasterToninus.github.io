<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" href="../img/terminal.ico" type="image/x-icon">
<link rel="icon" href="../img/terminal.ico" type="image/x-icon">
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
    <!-- Font: revenge of the nerds -->

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
                <a class="navbar-brand" href="./">
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
                            <li><a href="./">Hardware</a></li>
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
            note: <a href="https://pcpartpicker.com/user/Toninus/saved/TJ8gXL">pcpartpicker</a> automatically generate the html!
        </div>


        <!-- ================================================= -->
        <!-- PHP! -->
        <!-- ================================================= -->    
        <?php
        // Enable error reporting for debugging
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        //error_reporting(EALL);

        // Load the YAML file containing PC data
        include '../src/Yaml.php';
        $yaml = new Yaml();
        $yamlFile = 'pc_data.yaml';
        $yamlData = [];       




        $lastModified = '';
        $totalCost = 0;
        $revisionCosts = 0;

        if (file_exists($yamlFile)) {
            $yamlData = $yaml->load($yamlFile);
            $lastModified = date("F d, Y H:i:s", filemtime($yamlFile));
        } else {
            echo "<p>Error: YAML file not found.</p>";
        }

        // Check if the YAML data is not empty
        if (!empty($yamlData)) {
            foreach ($yamlData as $pc) {
                $pcTotalCost = 0;
                $pcRevisionCosts = 0;

                // Calculate total cost and revision costs for each PC
                foreach ($pc['components'] as $component => $details) {
                    $pcTotalCost += $details['cost'];
                    if (isset($details['revision'])) {
                        $pcRevisionCosts += $details['revision']['cost'];
                    }
                }

                echo "<div class='row tall-row'>";
                echo "<div class='col-md-12'>";
                echo "<h2 class='text-center'><a href='{$pc['url']}' target='_blank'>{$pc['name']}</a></h2>";
                echo "<hr>";
                echo "</div>";

                // Image gallery for the PC
                echo "<div class='col-md-6'>";

                echo "<div class='box'>";
                echo "<p><strong>Build Date:</strong> {$pc['build_date']}</p>";
                echo "<p><strong>Total Cost:</strong> {$pcTotalCost}</p>";
                echo "<p><strong>Revision Costs:</strong> {$pcRevisionCosts}</p>";
                echo "</div>"; // Close box

                // Image gallery for the PC
                echo "<a href='{$pc['album']}' target='_blank'>";
                echo "<img src='{$pc['image']}' alt='PC Image' class='img-responsive'>";
                echo "</a>";
                echo "</div>"; // Close image column

                // Component table for the PC
                echo "<div class='col-md-6'>";
                echo "<table class='table table-striped'>";
                echo "<thead><tr><th>Component</th><th>Model</th><th>Cost</th><th>Date</th></tr></thead><tbody>";

                foreach ($pc['components'] as $component => $details) {
                    $revision = $details['revision'] ?? null;
                    $addition = $details['addition'] ?? null;
                    echo "<tr>";
                    echo "<td>{$component}</td>";
                    echo "<td>";
                    if ($revision) {
                        echo "<a href='{$details['url']}' target='_blank'><s>{$details['model']}</s></a>";
                    } else {
                        echo "<a href='{$details['url']}' target='_blank'>{$details['model']}</a>";
                    }
                    echo "</td>";
                    echo "<td>{$details['cost']}</td>";
                    echo "<td>";
                    if ($revision) {
                        echo "v";
                    } else {
                        echo "";
                    }
                    echo "</td>";
                    echo "</tr>";
                    if ($revision) {
                        echo "<tr>";
                        echo "<td></td>";
                        echo "<td><a href='{$revision['url']}' target='_blank'>{$revision['model']}</a></td>";
                        echo "<td>{$revision['cost']}</td>";
                        echo "<td>{$revision['date']}</td>";
                        echo "</tr>";
                    }
                    if ($addition) {
                        echo "<tr>";
                        echo "<td></td>";
                        echo "<td><a href='{$addition['url']}' target='_blank'>{$addition['model']}</a></td>";
                        echo "<td>{$addition['cost']}</td>";
                        echo "<td>{$addition['date']}</td>";
                        echo "</tr>";
                    }
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


