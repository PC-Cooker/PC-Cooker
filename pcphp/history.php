<?php
date_default_timezone_set('Asia/Taipei');
require __DIR__ . '/__db_connect.php';
$pageName = 'history';


if (isset($_SESSION['user'])) {
    $ddate = date("Y-m-d H:i:s", time() - 6 * 30 * 24 * 60 * 60);


    $o_sql = sprintf("SELECT * FROM `orders` WHERE `member_sid`=%s AND order_date>'%s'",
        $_SESSION['user']['id'],
        $ddate
    );
    $o_rs = $mysqli->query($o_sql);
    $o_ar = [];

    while ($r = $o_rs->fetch_assoc()) {
        $o_ar[] = $r;
    }
    $o_keys = array_keys($o_ar); //取消訂單所有 sid

    $od_sql = sprintf("SELECT od.*, p.bookname, p.book_id
                FROM `order_details` od
                JOIN `products` p
                ON od.`product_sid`=p.sid
                ", implode(',', $o_keys));

    $od_rs = $mysqli->query($od_sql);
    $od_ar = [];
    while ($r = $od_rs->fetch_assoc()) {
        $od_ar[] = $r;
    }

} else {
    header('Location: ./');
    exit;
}
?>
<?php include __DIR__ . '\__html_head.php' ?>
<div class="container">
    <?php include __DIR__ . '\__navbar.php' ?>

    <div class="container">
        <?= $o_sql ?>
        <br>
        <?php print_r($o_ar) ?>
    </div>
</div>


<div id="landlord">
    <div class="message" style="opacity:0"></div>
    <canvas id="live2d" width="280" height="250" class="live2d"></canvas>
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
