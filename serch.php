<?php
    session_start();
    
    $name = $_POST['model_name'];
    $heightTo = $_POST['heightTo'];
    $heightFrom = $_POST['heightFrom'];
    $weightTo = $_POST['weightTo'];
    $weightFrom = $_POST['weightFrom'];
    $gender = $_POST[gender];

    $sql  = "SELECT * FROM taiken_modeldata where 1=1";

    print '<br/>';
    var_dump($_POST['model_name']);
    var_dump($_POST['heightTo']);
    print '<br/>';
    var_dump(isset($_POST['model_name']));
    var_dump(isset($_POST['heightTo']));
    print '<br/>';
    var_dump(empty($_POST['model_name']));
    var_dump(empty($_POST['heightTo']));
    print '<br/>';

    if(!empty($_POST['model_name'])){
        $sql .= " AND mdl_name LIKE '%".$name. "%'";  
    }
    if(!empty($_POST['heightFrom'])){
        $sql .= " AND mdl_height >= ".$heightFrom;
    }
    if(!empty($_POST['heightTo'])){
        $sql .= " AND mdl_height <= ".$heightTo;
    }
    if(!empty($_POST['weightFrom'])){
        $sql .= " AND mdl_weight >= ".$weightFrom;
    }
    if(!empty($_POST['weightTo'])){
        $sql .= " AND mdl_weight <= ".$weightTo;
    }
    if(!empty($_POST['gender'])){
        $sql .= " AND mdl_sex = ".$gender;
    }

    $_SESSION['sql'] = $sql;

    var_dump($sql);

    header('Location:top.php');
?>