<?php require("connect.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThaiTone</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/2ce56934c0.js" crossorigin="2ce56934c0"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;1,100&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Taviraj&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        $sql = "SELECT * FROM color";
        if(isset($_POST['search-text'])) {
            $search = mysqli_real_escape_string($connect, $_POST['search-text']);
            $sql .= " WHERE name LIKE '%".$search."%' ";
        }
        $result = mysqli_query($connect, $sql);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>
    <header>
        <h1>THAITONE</h1>
        <div class="icon-box">
            <i class="fa-solid fa-circle-half-stroke icon"></i>
            <i class="fa-solid fa-bars icon"></i>
        </div>
    </header>
    <div class="line"></div>
    <div class="search">
        <form action="index.php" method="post">
            <div class="box">
                <input type="search" name="search-text" id="search-text">
                <button type="submit" name="search-btn">
                    <i class="fa-solid fa-magnifying-glass icon"></i>
                </button>
            </div>
            <h3>พบสีที่เกี่ยวข้อง <?php echo count($rows); ?> รายการ</h3>
        </form>
    </div>
    <div class="line"></div>
    <form action="index.php" method="post">
        <div class="data">
            <?php foreach ($rows as $row): ?>
                <div class="data-box" style="background-color: <?php echo $row["hexcode"]; ?>;">
                    <h4><?php echo $row["name"]; ?></h4> 
                    <p><?php echo $row["hexcode"]; ?></p> 
                </div>
            <?php endforeach; ?>
        </div>
    </form>
</body>
</html>