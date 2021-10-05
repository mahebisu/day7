<?php

    //定義したfunctionを呼び出す
        require_once('funcs.php');

    $pdo = db_conn();
    $unique_code = $_GET['unique_code'];

    //２．データ登録SQL作成
        $stmt = $pdo->prepare('DELETE 
                            FROM
                                gs_user_table
                            WHERE
                            unique_code = :unique_code
                            ;');
        $stmt->bindValue(':unique_code',$unique_code,PDO::PARAM_INT);
        $status = $stmt->execute();

    //３．データ表示
    $view = '';
    if ($status == false) {
        sql_error($status);
    } else {
        redirect('read.php');
    }


?>