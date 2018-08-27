<?php
require __DIR__ . '/__db_connect.php';
$pageName = 'cart';
$data = [];
if (!empty($_SESSION['cart'])) {
    $keys = array_keys($_SESSION['cart']);
    $sql = sprintf("SELECT * FROM product_book WHERE sid IN (%s)", implode(',', $keys));
    $rs = $mysqli->query($sql);
    while ($r = $rs->fetch_assoc()) {
        $r['qty'] = $_SESSION['cart'][$r['sid']];
        $data[$r['sid']] = $r;
    }
}
?>
<?php include __DIR__ . '/__html_head.php' ?>
    <div class="container">
        <?php include __DIR__ . '/__navbar.php' ?>
        <div class="row">
            <div class="col">
                <?php if (!empty($_SESSION['cart'])): ?>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>移除</th>
                            <th>封面</th>
                            <th>書名</th>
                            <th>價格</th>
                            <th>數量</th>
                            <th>小計</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $total = 0;
                        foreach ($keys as $k):
                            $r = $data[$k]; //整筆資料 包含qty
                            $total += $r['Price'] * $r['qty'];
                            ?>
                            <tr class="product-item" data-sid="<?= $k ?>">
                                <th><i class="fas fa-trash-alt remove-item"></i></th>
                                <td><img src="./imgs/small/<?= $r['sid'] ?>.jpg" alt=""></td>
                                <td><?= $r['ProductName'] ?></td>
                                <td class="price" data-price="<?= $r['Price'] ?>"><?= $r['Price'] ?></td>
                                <td class="qty" data-qty="<?= $r['qty'] ?>">
                                    <select class="qty-sel">
                                        <?php for ($i = 1; $i <= 10; $i++): ?>
                                            <option value="<?= $i ?>"><?= $i ?></option>
                                        <?php endfor; ?>
                                    </select>
                                <td><?= $r['Price'] * $r['qty'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="alert alert-primary">
                        總計:<span id="total-price"></span>
                    </div>
                    <?php if (isset($_SESSION['user'])): ?>
                        <button onclick="location.href='cart_confirm.php'" type="button" class="btn btn-primary">結帳</button>
                    <?php else: ?>
                        <button onclick="location.href='login.php'" type="button" class="btn btn-danger">登入</button>
                    <?php endif ?>
                    <?php else: ?>
                    <div class="alert alert-danger" role="alert">
                        購物車目前沒有資料
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script>
        var trashbin = $('.remove-item');
        var dallorCommas = function (n) {
            return '$ ' + n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        };
        var calTotal = function () {
            var total = 0;
            var items = $('.product-item');
            if (items.length == 0) {
                window.location.reload();
                return;
            }
            items.each(function () {
                total += $(this).find('.price').attr('data-price') * $(this).find('.qty').attr('data-qty');
            });

            $('#total-price').text(dallorCommas(total));
        };
        var p_items = $('.product-item');
        if (p_items.length) {
            calTotal();
        }
        //一開始設定正確的數量
        p_items.each(function () {
            var sel = $(this).find('.qty-sel');
            sel.val($(this).find('.qty').attr('data-qty'));
        });
        p_items.find('.qty-sel').change(function () {
            var tr = $(this).closest('tr');
            var sid = tr.attr('data-sid');
            var qty = $(this).val();
            var price = tr.find('Price').attr('data-price');
            tr.find('.qty').attr('data-qty', qty);
            $.get('add_to_cart.php', {sid: sid, qty: qty}, function (data) {
                tr.find('td:last-child').text(qty * price);
                window.location.reload();
                changeQty(data);
                calTotal();
            }, 'json');
        });
        trashbin.click(function () {
            var tr = $(this).closest('tr');
            var sid = tr.attr('data-sid');
            $.get('add_to_cart.php', {sid: sid}, function (data) {
                tr.remove();
                changeQty(data);
                calTotal();
            }, 'json');
        });
    </script>
<?php include __DIR__ . '/__html_foot.php' ?>