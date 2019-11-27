<?php
$total_results = count($tareas);
$limit = 4;
$total_pages = intval(ceil($total_results/$limit));

$page = 1;
if (!isset($_GET['page'])) {
    $page = 1;
} else if(is_numeric($_GET['page'])){
    $page = $_GET['page'];
}

$starting_limit = ($page-1)*$limit;