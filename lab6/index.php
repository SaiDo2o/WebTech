<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="handler.php" method="POST">
   Укажите цвет фона: <input type="color" name="BgColor" value="#ff0000" /><br><br>
   Укажите цвет шрифта: <input type="color" name="FontColor" value="#ff0000" /><br><br>
   Размер шрифта: <input type="text" name="FontWeight" /><br><br>
   <input type="submit" value="Применить"></p>
</form>

<?php
    if (isset($_COOKIE['BgColor']))
    {
        $Temp = $_COOKIE['BgColor'];
        echo "<style>
            body 
            { 
                background: $Temp
            } 
            </style>";
    }

    if (isset($_COOKIE['FontColor']))
    {
        $Temp = $_COOKIE['FontColor'];
        echo "<style>
            body 
            { 
                color: $Temp
            } 
            </style>";
    }

    if (isset($_COOKIE['FontWeight']))
    {
        $Temp = $_COOKIE['FontWeight'];
        if ($Temp != NULL)
        {
            $Temp.="px";

            echo "<style>
            body 
            { 
                font-size: $Temp
            } 
            </style>"; 
        }
    }
?>
</body>
</html>