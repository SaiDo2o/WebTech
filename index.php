<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Just collect information about your browser..</h2>
<?php
    $browser = get_browser(null, true);
    echo "You visited ihis page with $browser[browser]";

    echo "<h3>Just statistic:</h3>";
    // Получение данных посещений


    $host = 'localhost';  
    $database = 'BrowserInfo'; 
    $user = 'root'; 
    $password = '';

    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link));

    $query ="INSERT INTO Info VALUES ('$browser[browser]', '1') ON DUPLICATE KEY UPDATE Stat=Stat + 1";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));    

    $query ="SELECT * FROM Info ORDER BY Stat DESC";
 
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    if($result)
    {
        $rows = mysqli_num_rows($result);
         
        echo "<table><tr><th>Browser</th><th>Statistic</th></tr>";
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
                for ($j = 0 ; $j < 2 ; ++$j) echo "<td>$row[$j]</td>";
                echo "</tr>";
            }
            echo "</table>";
    
    mysqli_free_result($result);
    }

    mysqli_close($link);
?>
</body>
</html>