<?php

require_once __DIR__ . '/functions.php';

$dbh = connect_db();

$keyword ='';

if (isset($_GET['keyword'])){
    $keyword = $_GET['keyword'];
    $sql = "SELECT * FROM animal Where description LIKE '%${keyword}%'";
}else{
    $sql = 'SELECT * FROM animal';
}

$stmt = $dbh->prepare($sql);

$stmt->execute();

$animal_list = $stmt->fetchAll(PDO::FETCH_ASSOC);

//var_dump($members)

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>pet_shop1</title>
</head>
<body>
    <h1>本日のご紹介ペット!</h1>
    <form action="" method="GET">
        <label for="query">キーワード:</label>
        <input type="text" name="keyword" id="query">
        <input type="submit" value="検索">
    </form>

    <?php foreach($animal_list as $animal_colum): ?>
        <p class="p-start"><?=$animal_colum['type_v']?>の<?=$animal_colum['classification']?>ちゃん</p>
        <p><?=$animal_colum['description']?></p>
        <p><?=$animal_colum['birthday']?>&nbsp;生まれ</p>
        <p>出身地&nbsp;<?=$animal_colum['birthplace']?></p>
        <hr>
    <?php endforeach; ?>
</body>
</html>