<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>モデル一覧/検索機能</title>
    <link href="style/style.css" rel="stylesheet" type="text/css">
</head>
<body>

    <?php
        $mdl_id=$_POST['mdl_id']; 
        $mdl_name=$_POST['mdl_name'];
        $mdl_height=$_POST['mdl_height'];
        $mdl_weight=$_POST['mdl_weight'];
        $mdl_sex=$_POST['mdl_sex'];

    ?>
    <form action="editDelComfirm.php" method="post">
    <input type="hidden" name="mdl_id" value="<?=$mdl_id?>"/>
        モデル名<input type="text" name="mdl_name" value="<?=$mdl_name?>"><br/>
        身長<input type="text" name="mdl_height" value="<?=$mdl_height?>"><br/>
        体重<input type="text" name="mdl_weight" value="<?=$mdl_weight?>"><br/>
        性別 男<input type="radio" name="mdl_sex" value="1" <?php if($mdl_sex==1){print 'checked';} ?>>
        女<input type="radio" name="mdl_sex" value="2"<?php if($mdl_sex==2){print 'checked';} ?>><br/>

        <input type="submit" name="delete" value="削除">
        <input type="submit" name="edit" value="確認">
    </form>
    
</body>
</html>