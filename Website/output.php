<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="index.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="nav.css" />
</head>

<body style=" background: linear-gradient(rgba(30,30,30,.75), rgba(30,30,30,.75)), url('images/digital_background.jpg'); color:white;">

                <div class="topnav" >
                    <a href="index.php">HOME</a>
                    <a style="float:right" href="/ST/GoogleScrapeSearch/feedback/">FEEDBACK</a>
                    <a style="float:right" href="news.php">NEWS</a>
                    <a style="float:right" href="about.php">ABOUT</a>
                    
                </div>
    <br>
</body>

<?php $query = $_GET['query']; ?>

<?php
        
    include('simple_html_dom.php');

    $query = $_GET['query'];
    $query=sprintf('"%s"', $query);

    $finalQuery = str_replace(" ", "+", $query);

    $html = file_get_html("https://www.google.com/search?source=lnms&tbm=nws&q=" . strval($finalQuery));
    
?>

<?php include('title.php') ?>
<?php include('source.php'); ?>
<?php include('url.php'); ?>

<section class="w3-container w3-content w3-center" style="max-width:600px">
<p class="w3-justify">
    <?php
        $total_number = count($urlArray);
        $number = 0;
        $reliablecount = 0;
        $reliablesrcs = [];
        $reliabletitle = [];
        $reliableurl = [];
        $alfredoutput = [];

        while ($number < $total_number){
            exec("python scraperfunc.py {$urlArray[$number]}",$output);
            $output=implode("",$output);
            $output=str_replace('"', "", $output);
            $output=str_replace("'", "", $output);
            $output=sprintf('"%s"', $output);
            $output = (strlen($output) > 4000) ? substr($output, 0, 4000) . '...' : $output;
            escapeshellarg($output);
            $command2='python Updatedbenfunction.py '.$query.' '.$output;
            exec($command2,$output2);
            $alfredoutput[$number] = $output;

            if ($output2[$number] !="0"){
                $reliablesrcs[$reliablecount] = ($output2[$number]);
                $reliabletitle[$reliablecount] = ($titles[$number]);
                $reliableurl[$reliablecount] = ($urlArray[$number]);
                $reliablecontent[$reliablecount] = ($alfredoutput[$number]);
                $reliableoutput2[$reliablecount] = ($output2[$number]);

                $mostreliablesrc = max($reliablesrcs);

                $reliablecount = $reliablecount + 1;
            }

        $number = $number + 1;
        }
        if(isset($mostreliablesrc)){
            $maxposistion=array_search($mostreliablesrc,$reliablesrcs);
            $mostreliablecontent=$reliablecontent[$maxposistion];

            for ($x = 0; $x <= $reliablecount-1;$x++){
                $reliablecontent[$x] = (strlen($reliablecontent[$x]) > 4000) ? substr($reliablecontent[$x], 0, 4000) . '...' : $reliablecontent[$x];
                escapeshellarg($reliablecontent[$x]);   
                echo"<br>"; 
                $command3='python Updatedbenfunction1.py '.$mostreliablecontent.' '.$reliablecontent[$x];
                exec($command3,$output3);
                print("Title: ". $reliabletitle[$x]);
                echo "<br>";
                print("URL: ". $reliableurl[$x]);
                echo "<br>";
                print("Your Match Percentage: ".$reliableoutput2[$x]);
                echo "<br>";
                print("Article Relevance Percentage: ".$output3[$x]);
                echo "<br>";
                echo "<br>";
                echo "<br>";
            }

        }
        else{
            print("Sorry, there is no search result.");
        }

        // print_r ($output3);
    ?>
</section>

</body>
</html>
