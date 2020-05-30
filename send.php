<?php
    if (isset($_POST["comeback"])) {
        header("Location: index.php");
    }
    session_start();
    ini_set("mail.log", dirname(__FILE__) . "/mail/");
    if (md5($_POST['capt']) == $_SESSION['randnum']) 
    {
    	if (mail($_POST['Adr'], $_POST['Sub'], $_POST['Mes'])) {
            echo "Успешно отправлено!";
        } else {
            echo "Произоша ошибка...";
        }
    }
    else 
    {
        echo "Всё не так просто..";
    }
    echo "<form method=\"POST\"><input type=\"submit\" name=\"comeback\" value=\"Вернуться\"></form>";
?> 