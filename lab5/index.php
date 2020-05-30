<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="main.css">
</head>
<body>
<h2>Company info:</h2>
<form action="Lab5_Control.php" method="POST">
    ID: <input type="text" name="id" /><br><br>
    Name: <input type="text" name="name" /><br><br>
    Location: <input type="text" name="location" /><br><br>
    Contact: <input type="text" name="contact" /><br><br>
    <input type="submit" name="button" value="ADD">
    <input type="submit" name="button" value="EDIT">
    <input type="submit" name="button" value="DELETE">
</form>
<h2>Companies list</h2>
<?php
    // подключение базы данных
    require_once 'connection.php'; 
    // переключение кодировки

    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link));
    
    // Вывод базы данных 
    $query ="SELECT * FROM info";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    if($result)
    {
        $query ="SELECT * FROM info";
        $rows = mysqli_num_rows($result);
     
        echo "<table><tr><th>Id</th><th>Name</th><th>Location</th><th>Contact</th></tr>";
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
                for ($j = 0 ; $j < 4 ; ++$j) echo "<td>$row[$j]</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
        
    // закрываем подключение
    mysqli_close($link);
?>
</body>
</html>