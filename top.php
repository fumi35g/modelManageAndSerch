<?php

    session_start();
    
    if(empty($_SESSION['sql'])){
        $sql = "SELECT * FROM taiken_modeldata";
    }else{
        $sql = $_SESSION['sql'];
    }

    var_dump($sql);

    $dsn = 'mysql:dbname=modeldata;host=localhost;charset=utf8mb4';
    $user = 'root';
    $password = 'password';

        try{
            $pdo = new PDO($dsn, $user, $password);
            var_dump("接続に成功しました");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }catch (PDOException $e){
            var_dump($e->getMessage());
            die();
        }
        //$pdo = null;
        try{
            //$sql = "SELECT * FROM taiken_modeldata";
            if(isset($_SESSION['sqlOrder'])){
                $sqlOrder = $_SESSION['sqlOrder'];
                $sql = $sql.$sqlOrder.";";
                $stmh = $pdo->prepare($sql);
                $_SESSION['sqlOrder'] = null;
            }else{
                $sql .= ";";
                $stmh = $pdo->prepare($sql);
            }
            $stmh->execute();
        }catch(Exception $e){
            //die('接続エラー：'.$Exception->getMessage());
            //(Exception $e)がなかったためエラー
        }
    
?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>モデル一覧/検索機能</title>
    <link href="style/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <form action="serch.php" method="post">
        モデル名<input type="text" name="model_name"><br/>
        身長<input type="text" name="heightFrom">～
        <input type="text" name="heightTo"><br/>
        体重<input type="text" name="weightFrom">～
        <input type="text" name="weightTo"><br/>
        性別 男<input type="radio" name="gender" value="1">
        女<input type="radio" name="gender" value="2"><br/>

        <input type="submit" value="検索">
    </form>

    <!-- SELECT * FROM taiken_modeldata ORDER BY mdl_name DESC
    SELECT * FROM taiken_modeldata ORDER BY mdl_name ASC -->

    <table>
        <tr>
            <th>
                モデル名
                <a href="order.php?column=mdl_name&order=desc">▼</a>
                <a href="order.php?column=mdl_name&order=asc">△</a>
            </th>
            <th>身長
                <a href="order.php?column=mdl_height&order=desc">▼</a>
                <a href="order.php?column=mdl_height&order=asc">△</a>
            </th>
            <th>
                体重
                <a href="order.php?column=mdl_weight&order=desc">▼</a>
                <a href="order.php?column=mdl_weight&order=asc">△</a>
            </th>
            <th>
                性別
                <a href="order.php?column=mdl_sex&order=desc">▼</a>
            <a href="order.php?column=mdl_sex&order=asc">△</a>
            </th>
        </tr>
        <?php
            while($row = $stmh->fetch(PDO::FETCH_ASSOC)){
        ?>

        <!-- formのidを一意にしないとデータがうまく連携されなかった。
        getElementByIdで一番上のものを取ってきてしまったため。 -->
        <tr>
            <form action="edit.php" method="post" id="<?=$row['mdl_id']?>">
                <td>
                    <span onclick="document.getElementById('<?=$row['mdl_id']?>').submit()">
                        <?=htmlspecialchars($row['mdl_name'])?>
                    </span>
                    <input type="hidden" name="mdl_id" value="<?= $row['mdl_id']?>"/>
                    <input type="hidden" name="mdl_name" value="<?= $row['mdl_name']?>"/>
                </td>
                <!-- <a href=""><?=htmlspecialchars($row['mdl_name'])?></a></td> -->
                <td><?=htmlspecialchars($row['mdl_height'])?></td>
                <input type="hidden" name="mdl_height" value="<?= $row['mdl_height']?>"/>
                <td><?=htmlspecialchars($row['mdl_weight'])?></td>
                <input type="hidden" name="mdl_weight" value="<?= $row['mdl_weight']?>"/>
                <td><?=htmlspecialchars($row['mdl_sex'])?></td>
                <input type="hidden" name="mdl_sex" value="<?= $row['mdl_sex']?>"/>
            </form>
        </tr>
        <?php
            }
            $pdo = null;
        ?>
    </table>

    <a href="reg.php">
            <button type="button">新規登録</button>
    </a>
    <a href="csvUp.php">
            <button type="button">CSV UP</button>
    </a>
    <a href="csvDl.php">
            <button type="button">CSV DL</button>
    </a> 
</body>
</html>