<?php
    $BgColor = (string)$_POST['BgColor'];
    $FontColor = (string)$_POST['FontColor'];
    $FontWeight = (int)$_POST["FontWeight"];

    setcookie('BgColor', $BgColor);
    setcookie('FontColor', $FontColor);
    if ($FontWeight != NULL)
        setcookie('FontWeight', $FontWeight);
    else
        setcookie('FontWeight', NULL);
        
    header('Location: '.'http://localhost/');
?>