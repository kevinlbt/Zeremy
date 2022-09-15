<?php

try {
    $db = new PDO(
        'mysql:host=db.3wa.io;port=3306;dbname=kevinlebot_cms_articles',
        'kevinlebot',
        '834b8ff7f808959fbe363a1b15c177b1'
    );

}catch (Exception $err) {
    
    var_dump($err);
}

$param = [];
$query = null;

if (isset($_GET['id'])) {
    $param = ['id' => $_GET['id']];
    $query = $db->prepare("SELECT * FROM `article` WHERE id = :id");
}
else { 
    $query = $db->prepare ("SELECT * FROM `article`");
}

$query->execute($param);
$result = $query->fetchAll(PDO::FETCH_ASSOC);

$result = array_reverse($result);

echo json_encode($result);
     
