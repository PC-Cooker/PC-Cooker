<?php
require __DIR__ . '/__db_connect.php';
$pageName = 'login';
if (isset($_POST['email']) and isset($_POST['password'])) {
    $sql = sprintf("SELECT
 `id`, `email`,  `mobile`, `address`,
  `birthday`, `nickname`, `created_at`
   FROM `members` WHERE `email`='%s' AND `password`='%s'",
        $mysqli->escape_string($_POST['email']),
        sha1($_POST['password'])


    );
    $result = $mysqli->query($sql);
    if ($result->num_rows == 1) {
        $msg_type = 'success';
        $msg_info = '登入成功';
        $_SESSION['user'] = $result->fetch_assoc();
    } else {
        $msg_type = 'danger';
        $msg_info = '登入失敗';
    }
}else{
    if(isset($_SERVER['HTTP_REFERER'])){
        $_SESSION['come_from'] = $_SERVER['HTTP_REFERER'];
    }
}
?>
<?php include __DIR__ . '/__html_head.php' ?>

<div class="container">
    <?php include __DIR__ . '/__navbar.php' ?>

    <style>
        form > .form-group > small {
            color: red !important;
            display: none;
        }

        #live2d {
            position: fixed;
            bottom: 20px;
            left: 50px;
            transform: scale(1.5);
        }

        .message {
            position: fixed;
            bottom: 0;
        }
    </style>
    <div class="row justify-content-md-center" style="margin-top: 20px">

        <div class="col-md-6">
            <?php if(isset($msg_type) and $msg_type=='success' and isset($_SESSION['come_from'])): ?>
                <script>
                    setTimeout(function(){
                        location.href = '<?= $_SESSION['come_from'] ?>';
                    }, 5000);
                </script>
                <?php
                unset($_SESSION['come_from']);
            endif ?>
            <?php if (!isset($_SESSION['user'])): ?>
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">會員登入</div>

                        <form name="form1" method="post" onsubmit="return checkForm()">

                            <div class="form-group">
                                <label for="email">電子郵箱 * (當作登入帳號)</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="電子郵箱">
                                <small id="emailHelp" class="form-text text-muted">請符合格式</small>
                            </div>
                            <div class="form-group">
                                <label for="password">密碼 *</label>
                                <input type="password" class="form-control" id="password" name="password">
                                <small id="passwordHelp" class="form-text text-muted">密碼強度不足</small>
                            </div>
                            <button type="submit" class="btn btn-primary" id="submit_btn">登入</button>
                        </form>
                    </div>


                </div>
            <?php endif; ?>
        </div>
    </div>

</div>
<script>
    function checkForm() {
        var emailHelp = $('#emailHelp'),
            passwordHelp = $('#passwordHelp');
        var emailPattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
        var isPass = true;
        submit_btn.hide();
        nicknameHelp.hide();
        emailHelp.hide();
        passwordHelp.hide();

        if (!emailPattern.test(form1.email.value)) {
            emailHelp.show();
            isPass = false;
        }

        if (form1.password.value.length < 6) {
            passwordHelp.show();
            isPass = false;
        }

        return false;
    }
</script>


<div id="landlord">
    <canvas id="live2d" width="280" height="250" class="live2d"></canvas>
    <div class="message" style="opacity:0"></div>
    <?php if (isset($msg_type)): ?>
        <div id="info" class="message alert alert-<?= $msg_type ?>" role="alert">
            <?= $msg_info ?>
        </div>
    <?php endif; ?>

</div>
<script type="text/javascript" src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript">
    var message_Path = '/live2d/'
    var home_Path = 'https://haremu.com/'
</script>
<script type="text/javascript" src="/live2d/js/live2d.js"></script>
<script type="text/javascript" src="/live2d/js/message.js"></script>
<script type="text/javascript">
    loadlive2d("live2d", "/live2d/model/tia/model.json");
</script>

<?php include __DIR__ . '\__html_foot.php' ?>
