<!doctype html>
<html lang="en">
<?php $debug = TRUE; ?>

<head>
    <title>Hernando County's Current Building Permits</title>
    <link rel="stylesheet" type="text/css" href="">
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="keywords" content="hernando, hernando sun, newspaper, building, permits">
    <meta name="author" content="Lisa MacNeil">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
</head>

  <body>
    <h1>Hernando County's Current Building Permits</h1>
    <h3>Permits issued where estimated value > $100,000</h3>
    

<?php

// error_reporting(E_ALL | E_STRICT);

// $fileUrl = 'http://www.hernandopa-fl.us/BldSQLProd/BldReports/Permits.csv';

// $fp = fopen("BuildingPermits.csv", "x+");

// $ch = curl_init($fileUrl);

// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_FILE, $fp);
// curl_setopt($ch, CURLOPT_HEADER, 0);


// $contents = curl_exec($ch);
//     fwrite($fp, $contents);
// curl_exec($ch);
// if(curl_error($ch)) {
//     fwrite($fp, curl_error($ch));
// }
// curl_close($ch);
// fclose($fp);

shell_exec("touch Permits.csv; curl -O permits.csv www.hernandopa-fl.us/amtprodapps/repoutputs/bldsys/Permits.csv > Permits.csv");

https://www.hernandopa-fl.us/amtprodapps/repoutputs/bldsys/Permits.csv
$saveTo = 'Permits.csv';
$delim = ',';

$fp = fopen('Permits.csv', 'r');

    echo "Permit Date     |      Owner    |     Address     |     Description 1     |     Description 2     |
        Square Feet       |     Est. Value      |     Use Type     |     Usage Description     |
             Location     | <br><br>";
    
    while(($row = fgetcsv($fp, 1024, $delim)) !== false) {
        // echo "<pre>";
        // print_r($row);
        // echo "</pre>";

        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $val = (int)$row[23];
        $mon = money_format('%(#10.0n', $val);
          
        if ($val > 100000 ) {

        echo "$row[2]" ."&nbsp; &nbsp;"."$row[3]"."&nbsp; &nbsp;"."$row[9]"."&nbsp; &nbsp;"."$row[10]"."&nbsp; &nbsp;".
        "$row[22]"."&nbsp; &nbsp;"."$mon"."&nbsp; &nbsp;"."$row[24]"."&nbsp; &nbsp"."$row[25]".
        "&nbsp; &nbsp"."$row[26]"."&nbsp; &nbsp"."<br><br>";
        
       } 
        
    }
   
    ?>
</body>
</html>