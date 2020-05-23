<?php

    $DBase = fopen("base.dmg", 'a+');
    fseek($DBase, 0);
    
    while (!feof($DBase))
    {
        $temp_str = htmlentities(fgets($DBase));

        $temp_arr = explode(",", $temp_str);

        if (count($temp_arr) == 5)
        {
            $ProdId = (int)$temp_arr[0];
            $ProdName = (string)$temp_arr[1];
            $ProdPrice = (float)$temp_arr[2];
            $ProdDesc = (string)$temp_arr[3];
            $ProdSpecPrice = (float)$temp_arr[4];

            echo    
                    "<div class = 'ProdItem'>
                        <a href='' class ='ItemRef'>$ProdName</a>
                        <input type='checkbox'>
                        <div class='box'>
                        ID: $ProdId, Price: $ProdPrice, Description: $ProdDesc, SpecPrice: $ProdSpecPrice!
                        </div>
                    </div>";
        }
    }

?>