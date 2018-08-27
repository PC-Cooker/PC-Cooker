<?php
$pageName = 'register';
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
            /*transform: scale(1.5);*/
        }

        .message {
            position: fixed;
            bottom: 0;
        }
    </style>
    <div class="row justify-content-md-center" style="margin-top: 20px">

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">會員註冊</div>

                    <form name="form1" method="post" onsubmit="return checkForm()">
                        <div class="form-group">
                            <label for="nickname">暱稱 *</label>
                            <input type="text" class="form-control" id="nickname" name="nickname" placeholder="暱稱">
                            <small id="nicknameHelp" class="form-text text-muted">暱稱最少兩個字</small>
                        </div>
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

                        <div class="form-group">
                            <label for="mobile">手機號碼</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="手機號碼">
                            <small id="mobileHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.
                            </small>
                        </div>

                        <div class="form-group">
                            <label for="birthday">生日</label>
                            <input type="text" class="form-control" id="birthday" name="birthday" placeholder="生日">
                            <small id="birthdayHelp" class="form-text text-muted">We'll never share your email with
                                anyone else.
                            </small>
                        </div>

                        <div class="form-group">
                            <label for="address">地址</label>
                            <textarea class="form-control" name="address" id="address" cols="30" rows="5"
                                      placeholder="請填寫地址"></textarea>
                            <small id="addressHelp" class="form-text text-muted">We'll never share your email with
                                anyone else.
                            </small>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submit_btn">註冊</button>
                    </form>
                </div>


            </div>
        </div>
    </div>

</div>
<script>
    function checkForm() {
        var nicknameHelp = $('#nicknameHelp'),
            emailHelp = $('#emailHelp'),
            passwordHelp = $('#passwordHelp'),
            submit_btn = $('#submit_btn');
        var emailPattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
        var isPass = true;
        submit_btn.hide();
        nicknameHelp.hide();
        emailHelp.hide();
        passwordHelp.hide();

        if (form1.nickname.value.length < 2) {
            nicknameHelp.show();
            isPass = false;
        }

        if (!emailPattern.test(form1.email.value)) {
            emailHelp.show();
            isPass = false;
        }

        if (form1.password.value.length < 6) {
            passwordHelp.show();
            isPass = false;
        }
        if (isPass) {
            $.post('register_api.php', $(document.form1).serialize(), function (data) {
                if (data.success) {

                } else {
                    submit_btn.show();
                }
                if (data.info) {
                    $('#info').text(data.info.msg);
                    $('#info').show();
                    $('#info').attr('class', 'alert alert-' + data.info.type);
                }
            }, 'json');
        }
        return false;
    }
</script>


<div id="landlord">
    <canvas id="live2d" width="280" height="250" class="live2d"></canvas>
    <div class="message" style="opacity:0">

    </div>
    <div id="info" class="alert" role="alert" style="display: none"></div>
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
