
<!DOCTYPE html>
<html>
<body>

<?php
//Kyle Kreil
//I spent roughly an hour researching PHP and deciding what HTTP library to use and decided
//on the cURL library due to the large amount of documentation and resources.
//I then worked on the program for another hour and a half until I was satifised with my outcome.

//initialize curl session
$curl = curl_init();
//target url which hosts albumIds, id, title, url, and thumbnailUrl.
$url = "https://jsonplaceholder.typicode.com/photos";
//set curl url option.
curl_setopt($curl, CURLOPT_URL, $url);
//because I am accessing with an HTTPS request I must enable verification for peers.
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
//return result of curl_exec rather than outputting it.
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//initialize result variable which points to the execution of cURL session.
$result = curl_exec($curl);
//ends cURL session which frees resources.
curl_close($curl);
//decode results json and assign it to output.
$output = json_decode($result, true);
//list the 10 first results in $url.
for($x = 0; $x < 10; $x++){
    echo "<h1>Album ID: ".$output[$x]["albumId"]."</h1>";
    echo "\n";
    echo "<h3>ID: ".$output[$x]["id"]."</h3>";
    echo "\n";
    echo "<h3>Title: ".$output[$x]["title"]."</h3>";
    echo "\n";
    echo "<h3>URL: ".$output[$x]["url"]."</h3>";
    echo "\n";
    echo "\n";
    echo "<br>";
}
?>

</body>
</html>