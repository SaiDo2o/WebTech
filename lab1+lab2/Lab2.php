<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
/*
    TASK:
    Пользователь вводит в поле формы названия городов через запятую. После отправки отсортируйте города по алфавиту,
    первые буквы должны быть в верхнем регистре, остальные в нижнем.
    Если в запросе будут одинаковые города, они не должны повторяться.
*/

    if (isset($_GET["InputString"]))
    {

        // Исключение вредоносного ввода
        $InputStr = htmlentities($_GET["InputString"]);
        $ResultStr = Convert($InputStr);

        if ($ResultStr != "")
        {
           echo "Result: $ResultStr";
        }
        else
            echo "Result is empty!";

    }

    function Convert($uStr)
    {
        $result = "";
        $temp_arr = explode(',', $uStr);      

        // Названия городов с большой буквы и буквенные
        foreach ($temp_arr as $CityKey => $CityName)
        {
            $temp_arr[$CityKey] = mb_strtolower($CityName);
            $temp_arr[$CityKey] = mb_convert_case($CityName, MB_CASE_TITLE);
            
            if (!(ctype_alpha($temp_arr[$CityKey])))
            {
                unset($temp_arr[$CityKey]);
            }
        }


        $temp_arr = array_unique($temp_arr);
        asort($temp_arr, SORT_STRING);

        // Формирование строки результата
        foreach ($temp_arr  as $value) 
        {
            $result .= $value . ' ';
        }

        return $result;
    }
?>
</body>
</html>