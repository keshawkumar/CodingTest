<?php
ini_set('memory_limit', '2048M'); // or you could use 1G
include 'Pager.php';
include 'PagerCSV.php';

$pageNum = (isset($_GET['p']) && $_GET['p'] != '') ? (int)$_GET['p'] : 1;

$handle = fopen('addcsv.csv', "r");

$pager = new PagerCSV($pageNum,15);
$data = $pager->getData($handle);

$pagerNav = $pager->render();

$pageTitle = 'Pager - CSV example';
include 'example.tpl.php';
?>