<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="main.css">
</head>
<body>
<h2>Adding a new product</h2>
<form action="Lab3_Add.php" method="POST">
    ID: <input type="text" name="id" /><br><br>
    Name: <input type="text" name="name" /><br><br>
    Price: <input type="text" name="price" /><br><br>
    Description: <input type="text" name="desc" /><br><br>
    <input type="submit" value="Добавить">
</form>
<h2>Product's list</h2>
    <?php include 'Lab3_Fill.php'; ?>
</body>
</html>