<?php
/*
Напишите регулярное выражение которое будет определять корректно адреса электронной почты в формате, например,   name@server.сom, name.surname@subserver.server.сom и т.д..
Поместите его в функцию, принимающую аргументом строку с электронной почтой.
Возвратите соответствующие значения  результата проверки. Данные принимать через форму (Имя, E-mail).
Корректные адреса вместе с именем записывать в текстовый файл  
*/

    // Удаление недопустимых символов
    $Name = (string)test_input($_POST['name']);
    $Mail = (string)test_input($_POST['email']);

    // Проверка имени пользователя
    if (empty($Name))
        echo "Имя обязательно!";
    if (!preg_match("/^[a-яA-Я a-zA-Z]*$/",$Name)) 
        echo "В имени разрешены только буквы и пробелы";

    // Проверка электронного адреса
    if (empty($Mail))
        echo "Введите электронный адрес!";
    if (preg_match("/^[a-zA-Z0-9_\-.]+@[a-zA-Z0-9_\-]+\.[a-zA-Z0-9_\-.]+$/",$Mail))
    {
        $DBase = fopen("DBase.txt", 'a+') or die("Не удалось создать файл-хранилище!");

        fwrite($DBase, $Name . "\r\n");
        fwrite($DBase, $Mail . "\r\n");

        echo "Данные успешно сохранены!";
    }
    else
        echo "Некорректный ввод!";

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }
?>