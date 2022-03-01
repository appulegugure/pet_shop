<?php
require_once __DIR__ . '/functions.php';

$dbh = connect_db();

$sql = 'SELECT * FROM animal';

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
    <?php foreach($animal_list as $animal): ?>
        <p><?=h($animal['type_v'])?>の<?=h($animal['classification'])?>ちゃん</p>
        <p><?=h($animal['description'])?></p>
        <p><?=h($animal['birthday'])?>&nbsp;生まれ</p>
        <p>出身地&nbsp;<?=h($animal['birthplace'])?></p>
        <hr>
    <?php endforeach; ?>
</body>
</html>