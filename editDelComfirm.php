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
    

        if(!empty($_POST['delete'])){
           
        print '本当に削除してもよろしいですか?<br/>';
        
        print 'モデル名'; 
        print $mdl_name.'<br/>';
        print '身長';
        print $mdl_height.'<br/>';
        print '体重';
        print $mdl_weight.'<br/>';
        print '性別';
        $mdl_sex_result = $mdl_sex==1 ? '男' : '女';
        print $mdl_sex_result.'<br/>';
        print  '<a href="delete.php">削除</a>';
        }

        if(!empty($_POST['edit'])){

        }
    ?>
    
    <a href="#" onClick="history.back(); return false;">前のページにもどる</a>
</body>
</html>