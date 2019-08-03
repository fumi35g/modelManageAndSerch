<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>モデル一覧/検索機能</title>
    <link href="style/style.css" rel="stylesheet" type="text/css">
</head>
<body>

    <?php
        $mdl_id=$_POST['mdl_id']); 
        $mdl_name=$_POST['mdl_name'];
        $mdl_height=$_POST['mdl_height'];
        $mdl_weight=$_POST['mdl_weight'];
        $mdl_sex=$_POST['mdl_sex'];
    ?>

    <p>
        本当に削除してもよろしいですか?
    </p>

    モデル名<?=$mdl_name?>
    身長<?=$mdl_height?>
    体重<?=$mdl_weight?>
    性別<?php $mdl_sex_result = $mdl_sex==1 ? '男' : '女' ?>
        <?=print '$mdl_sex_result'?>
    </form>
    
</body>
</html>