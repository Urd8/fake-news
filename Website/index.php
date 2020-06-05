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
                    <a style="float:right" href="finalAI/index.php">AI prototype</a>
                    <a style="float:right" href="feedback/index.php">FEEDBACK</a>
                    <a style="float:right" href="news.php">NEWS</a>
                    <a style="float:right" href="about.php">ABOUT</a>
                    
                    
                </div>
    <br>
    <div class="searchbar">
        <form autocomplete="off" action="output.php" method="get">
            <div style="float:left;"> <p class="title">H O <a style="color: #28C8F9;">A</a> X</p>
                <input type="text" id="search" name="query" placeholder="Enter a search phrase ...">
                <button type="submit" id="search-btn" style="float:left"> <i class="fa fa-search" style="color:white;"></i> </button>
            </div>
        </form>
    </div>
    

</body>
</html>
