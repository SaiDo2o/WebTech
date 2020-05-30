<?php
    require_once 'connection.php'; 
    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link));

    // Принятие данных с формы ввода
    $Id = (int)htmlspecialchars(mysqli_real_escape_string($link, $_POST['id']));
    $Name = (string)htmlspecialchars(mysqli_real_escape_string($link, $_POST['name']));
    $Location = (string)htmlspecialchars(mysqli_real_escape_string($link, $_POST['location']));
    $Contact = (string)htmlspecialchars(mysqli_real_escape_string($link, $_POST['contact']));
    $NeedAct = (string)htmlspecialchars($_POST["button"]);

    switch ($NeedAct)
    {
        case "ADD":
            $query ="INSERT INTO info VALUES(NULL, '$Name','$Location', '$Contact')";
            $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
            if($result)
            {
                echo "Company added!";
            }
            break;
        case "EDIT":
            $query ="UPDATE info SET Name='$Name', Location='$Location', Contact='$Contact' WHERE Id='$Id'";
            $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
            if($result)
                echo "Data updated!";
            break;
        case "DELETE":
            if ($Id != NULL)
                $query ="DELETE FROM info WHERE Id = '$Id'";
            else if ($Name != NULL)
                $query ="DELETE FROM info WHERE Name = '$Name'";    
            $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
            if ($result)
                echo "Deleted";
        break;
    }

    mysqli_close($link);
?>