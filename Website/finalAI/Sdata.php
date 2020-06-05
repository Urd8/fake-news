<!DOCTYPE html>
<html>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<body style=" background: linear-gradient(rgba(30,30,30,.75), rgba(30,30,30,.75)), url('images/digital_background.jpg'); color:white;">
<section class="w3-container w3-center" style="max-width:600px">
    <h2 class="w3-wide">I Don't Know If Its Fake</h2>
    <p class="w3-opacity">We check yours facts<i></i></p>
</section>



<section class="w3-container w3-content w3-center" style="max-width:600px">
<p class="w3-justify">
</section>

</body>
</html>


<?php 
$query = $_GET['query']; 

echo "<b>Query that you key in :</b>".$query;
$continue=0;


exec("python title.py {$query}",$title);
exec("python content.py {$query}",$content);
echo"<br>";

$content=implode("",$content);



$content=str_replace('"', "", $content);
$content=str_replace("'", "", $content);


if (!isset($title[0])){
    echo "unknow title";
}
else{
    $continue+=1;
}
if ($continue==1){
        $body = '{
            "url": "'.$query.'",
            "title": "'.$title[0].'",
            "content": "'.$content.'"
        }';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://localhost:8080/fakebox/check");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        $result = curl_exec($ch);
        $result=json_decode($result, TRUE);
        //var_dump($result);
        $x=$result['title'];
        $AiDecisionforTitile=$x['decision'];
        $AiScoreforTitle=$x['score'];
        // print_r($x);
        //var_dump($result['content']);
        $y=$result['content'];
        $AiDecisionforContent=$y['decision'];
        $AiScoreContent=$y['score'];
        echo "<b>Ai think the title is :</b>".$AiDecisionforTitile;
        echo "<br>";
        echo "<b>Ai think of the title rate in % is :</b>".$AiScoreforTitle*100;
        echo "<br>";
        echo "<b>Ai think the content is :</b>".$AiDecisionforContent;
        echo "<br>";
        echo "<b>Ai think of the content rate in % is :</b>".$AiScoreContent*100;
        echo "<br>";
    
}
?>

