<!doctype html>
<html lang="en">
<?php $debug = FALSE; ?>

<head>
    <title>Hernando County's Current Building Permits</title>
    <link rel="stylesheet" type="text/css" href="">
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="keywords" content="hernando, hernando sun, newspaper, real estate">
    <meta name="author" content="happycoffeebean">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
</head>

  <body>
    <h1>Hernando County's Latest Real Estate Sales</h1>
    <h3>Sales where estimated value > $100,000</h3>
    <?php

    $delim = "\t";
    $fp = fopen('sales_report.txt', 'r');

    echo "Sale Date     |      Price    |     Address     |     Description    |     Sq. Ft    |
        Year Built       |     <br><br>";
    
    while(($row = fgetcsv($fp, 1024, $delim)) !== false) {
        // echo "<pre>";
        // print_r($row);
        // echo "</pre>";

       
        $sqft = ltrim($row[13], '0');


        
                
        echo "$row[0]" ."&nbsp; &nbsp;"."$row[1]"."&nbsp; &nbsp;"."$row[6]"."&nbsp; &nbsp;"."$row[9]"."&nbsp; &nbsp;".
        "$sqft"."&nbsp; &nbsp;"."$row[14]"."<br><br>";
        
       
        
    }
    ?>
</body>
</html>