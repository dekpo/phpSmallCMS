<?php
require("../inc/config.php");
require("../inc/library.php");
$db = pdo_db(PDO_DSN,PDO_USER,PDO_PWD);

$page = (isset($_GET['page']) && $_GET['page'] !=0 ) ? ($_GET['page']-1) : 0;
$limit = isset($_GET['limit']) ? $_GET['limit'] : 30;
$where = isset($_GET['search']) ? "WHERE ville_code_postal LIKE '".$_GET['search']."%' " : "";

$query = "SELECT ville_nom FROM villes_france_free $where ORDER BY `ville_nom` ASC LIMIT ".($page*$limit).",$limit";
$serv = $db->prepare($query);
$serv->execute();
$result = $serv->fetchAll(PDO::FETCH_ASSOC);
header('Content-Type: application/json');
echo json_encode($result);
$db = null;