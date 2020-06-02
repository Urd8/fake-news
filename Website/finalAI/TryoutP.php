<!DOCTYPE html>
<html>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<body>

<!-- Navigation -->
<nav class="w3-bar w3-black">
    <a href="index.php" class="w3-button w3-bar-item">Home</a>
    <a href="" class="w3-button w3-bar-item">Feedback</a>
</nav>

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
$url = $_GET['url'];
$title = $_GET['title'];
$content = $_GET['content']; 

echo "<b>URL that you key in :</b>".$url;
echo "<br>";
echo "<b>title that you key in :</b>".$title;
echo "<br>";
echo "<b>content that you key in :</b>".$content;
echo "<br>";
$content=str_replace('"', "", $content);
$content=str_replace("'", "", $content);
$body = '{
    "url": "'.$url.'",
    "title": "'.$title.'",
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
$x=$result['title'];
$AiDecisionforTitile=$x['decision'];
$AiScoreforTitle=$x['score'];
$y=$result['content'];
$AiDecisionforContent=$y['decision'];
$AiScoreTitle=$y['score'];
$AiScoreContent=$y['score'];
$AiKeyword=$y['keywords'];
echo "<br>";
//$AiKeyword=implode("Arra",$AiKeyword);
echo "<br>";
echo "<b>Ai think the title is :</b>".$AiDecisionforTitile;
echo "<br>";
echo "<b>Ai think of the title rate in % is :</b>".$AiScoreforTitle*100;
echo "<br>";
echo "<b>Ai think the content is :</b>".$AiDecisionforContent;
echo "<br>";
echo "<b>Ai think of the title rate in % is :</b>".$AiScoreContent*100;
echo "<br>";
echo "<b>Ai think the keyword of the article is :</b>";
echo "<br>";

$keycount=count($AiKeyword);
print "key words are:  ";
for ($x = 0; $x <= $keycount-1;$x++){

    $k=$AiKeyword[$x];
    $a=$k['keyword'];
    print $a." , ";
}












// echo($result[0]);
// print_r(array_filter($result))


// // The data to send to the API
// $postData = array(
//     'url' => 'https://www.straitstimes.com/singapore/move-to-phase-2-of-covid-19-reopening-to-be-decided-mid-june-dining-in-use-of-sports',
//     'title' => 'Move to Phase 2 of Covid-19 reopening to be decided mid-June; dining-in, use ring this phase, Singapore News & Top Stories - The Straits Times',
//     'content' => 'We have been experiencing some problems with subscriber log-ins and apologise for the inconvenience caused. 
//     Until we resolve the issues, subscribers need not log in to access ST Digital articles. But a log-in is still required for our PDFs.'
// );

// // Setup cURL
// $ch = curl_init('http://localhost:8080/fakebox/check');
// curl_setopt_array($ch, array(
//     CURLOPT_POST => TRUE,
//     CURLOPT_RETURNTRANSFER => TRUE,
//     CURLOPT_HTTPHEADER => array(
//         // 'Authorization: '.$authToken,
//         'Content-Type: application/json; charset=utf-8'
//     ),
//     CURLOPT_POSTFIELDS => json_encode($postData)
// ));

// // Send the request
// $response = curl_exec($ch);

// // Check for errors
// if($response === FALSE){
//     die(curl_error($ch));
// }

// // Decode the response
// $responseData = json_decode($response, TRUE);

// // Print the date from the response
// echo $responseData['published'];

?>
