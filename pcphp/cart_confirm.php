<?php
require __DIR__ . '/__db_connect.php';
$pageName = 'cart_confirm';

if (isset($_SESSION['user']) and !empty($_SESSION['cart'])) {
    $data = [];

    $keys = array_keys($_SESSION['cart']);
    $sql = sprintf("SELECT * FROM products WHERE sid IN (%s)", implode(',', $keys));
    $rs = $mysqli->query($sql);
    while ($r = $rs->fetch_assoc()) {
        $r['qty'] = $_SESSION['cart'][$r['sid']];
        $data[$r['sid']] = $r;
    }
    $total_price = 0;
    foreach ($data as $k => $v) {
        $total_price += $v['price'] * $v['qty'];
    }

    $o_sql = "INSERT INTO `orders`(`member_sid`, `amount`, `order_date`) VALUES (?,?,NOW())";
    $o_stmt = $mysqli->prepare($o_sql);
    $o_stmt->bind_param('ii',
        $_SESSION['user']['id'],
        $total_price
    );


    $o_stmt->execute();

    if ($o_stmt->affected_rows == 1) {
        $order_sid = $mysqli->insert_id;
        $od_sql = "INSERT INTO `order_details`(`order_sid`, `product_sid`, `price`,`quantity`) VALUES (?,?,?,?)";
        $od_stmt = $mysqli->prepare($od_sql);

        foreach ($keys as $k) {

            $od_stmt->bind_param('iiii',
                $order_sid,
                $k,
                $data[$k]['price'],
                $data[$k]['qty']

            );
            $od_stmt->execute();
        }
        unset($_SESSION['cart']);
    } else {
        //錯誤處理
    }

}
?>
<?php include __DIR__ . '\__html_head.php' ?>
<div class="container">
    <?php include __DIR__ . '\__navbar.php' ?>
    <div class="container">
        <?php if(isset($order_sid)): ?>
            <div class="alert alert-primary">
                訂購成功
            </div>
        <?php else: ?>
            <div class="alert alert-danger">
                訂購失敗
            </div>
        <?php endif ?>
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
