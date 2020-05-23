<?php
    // Принятие данных с формы ввода
    $ProdId = (int)htmlspecialchars($_POST['id']);
    $ProdName = (string)htmlspecialchars($_POST['name']);
    $ProdPrice = (float)(round(htmlspecialchars($_POST['price']), 2));
    $ProdDesc = (string)htmlspecialchars($_POST['desc']);

    $ProdSpecPrice = round(($ProdPrice * 0.85), 2);

    if (($ProdId != 0) && ($ProdPrice != 0) && ($ProdName != '')) 
    {
        $DBase = fopen("base.dmg", 'a+');
        $temp_str = $ProdId . ',' . $ProdName . ',' . $ProdPrice . ',' . $ProdDesc . ',' . $ProdSpecPrice . "\r\n";
        fwrite($DBase, $temp_str);
        
        echo "Product was added!\r\n";
        echo "<a href='index.php'> Return </a>";
    }
    else
        echo "Check entered data!";
?>