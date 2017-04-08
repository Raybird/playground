<?php
function debug_dump($obj){
    echo "<pre>";
    var_dump($obj);
    echo "</pre>";
}

debug_dump(getenv());

$user = getenv("DB_USER");
$pwd = getenv("DB_PASSWORD");
$db = getenv("DB_DATABASE");
$pdo = new \PDO("mysql:host=mariadb;dbname=$db", $user, $pwd);

debug_dump($pdo);

$stmt = $pdo->prepare("SELECT DATABASE();");
$stmt->execute();
$result = $stmt->fetchAll(\PDO::FETCH_OBJ);

debug_dump($result);