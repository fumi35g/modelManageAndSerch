<?php
    session_start();  
    $sql = $_SESSION['sql'];

    $column = $_GET['column'];
    $order = $_GET['order'];

    $sqlOrder .= " ORDER BY " .$column." ".$order;

    $_SESSION['sqlOrder'] = $sqlOrder;

    header('Location:top.php');
?>