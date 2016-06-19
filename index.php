<?php include 'Scripts/CreateTables.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Catalog</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/mycss.css">
</head>
<body onload="changePosition(0)">
    <div class="page-header">
        <div class="header">
            <input type="button" class="btn" onclick="changePosition(-1)" value="Назад">
            <input type="button" class="btn" onclick="update()" value="Обновить">
            <input type="button" class="btn" onclick="changePosition(+1)" value="Вперёд">
            <h1>Каталог недвижимости</h1>
        </div>
    </div>

    <div id="info" class="container">
        <div class="row">

        </div>
    </div>

<script src="js/control.js"></script>
</body>
</html>