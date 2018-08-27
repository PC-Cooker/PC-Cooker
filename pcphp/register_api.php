<?php
require __DIR__ . '/__db_connect.php';
$result = [
    'success' => false,
    'email_error' => '請填寫email',
    'nickname_error' => '請填寫nickname',
    'password_error' => '請填寫password',
];

$isPass = true;
if (isset($_POST['nickname']) and isset($_POST['email']) and isset($_POST['password'])) {
    if (mb_strlen($_POST['nickname']) < 2) {
        $result['nickname_error'] = '暱稱長度請大於兩個字元';
        $isPass = false;
    } else {
        unset($result['nickname_error']);
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $result['email_error'] = 'email格式不符';
        $isPass = false;
    } else {
        unset($result['email_error']);
    }
    if (mb_strlen($_POST['password']) < 6) {
        $result['password_error'] = '密碼強度不足';
        $isPass = false;
    } else {
        unset($result['password_error']);
    }
    if ($isPass) {
        $hash = sha1(uniqid() . $_POST['email']);
        $password = sha1($_POST['password']);
        $sql = "INSERT INTO `members`(
                            `email`, `password`, `mobile`, `address`,
                            `birthday`, `hash`, `activated`, `nickname`,
                            `created_at`
                            ) VALUES (
                             ?,?,?,?,
                             ?,?,0,?,
                             NOW()
                            )
                            ";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('sssssss',
            $_POST['email'],
            $password,
            $_POST['mobile'],
            $_POST['address'],
            $_POST['birthday'],
            $hash,
            $_POST['nickname']
        );
        $stmt->execute();
        $af = $stmt->affected_rows;
        $stmt->close();
        if ($af === 1) {
            $result['success'] = true;
            $result['info'] = [
                'type' => 'success',
                'msg' => '註冊完成'
            ];
        } elseif ($af === -1) {
            $result['info'] = [
                'type' => 'danger',
                'msg' => 'email 已被使用'
            ];
        } else {
            $result['info'] = [
                'type' => 'danger',
                'msg' => '資料錯誤'
            ];
        }
    }
}


echo json_encode($result, JSON_UNESCAPED_UNICODE);