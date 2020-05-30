<!DOCTYPE html>
<html>
<head>
    <title>Отправка писем</title>
</head>
<body>
    <form  method="POST" action="send.php">
        <input type="text" name="Adr" size="43" value="Адресат" pattern="[a-zA-Z0-9\.][a-zA-Z0-9_\.\-]*@[a-zA-Z0-9\.]+\.[a-zA-Z]{2,5}"><br>
        <input type="text" name="Sub" size="43" value="Тема"><br>
        <textarea name="Mes" cols="40" rows="10"></textarea><br>
        <table><tr><td><img src="captcha.php"></td><td><input type="text" name="capt" size="4" pattern="[0-9]{4}"></td></tr></table><br>
        <input type="submit" value="Отправить">
    </form>
</body>
</html>