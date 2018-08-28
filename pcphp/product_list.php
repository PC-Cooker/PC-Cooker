<?php
require __DIR__ . '/__db_connect.php';

$pageName = 'product_list';
$params = [];
$m_rs = $mysqli->query("SELECT * FROM categories");
$m_raw = [];
$m_ar = [];

while ($r = $m_rs->fetch_assoc()) {
    $m_raw[] = $r;
}

foreach ($m_raw as $k => $v) {
    if ($v['parent_sid'] == 0) {
        $m_ar[$v['sid']] = $v;
    } else {
        if (!empty($m_ar[$v['parent_sid']])) {
            $m_ar[$v['parent_sid']]['children'][$v['sid']] = $v;
        }
    }
}
$per_page = 8;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$cate = isset($_GET['cate']) ? intval($_GET['cate']) : 0;

$where = " WHERE 1 ";

if (!empty($cate)) {

    $where .= " AND category_sid=$cate ";
    $params['cate'] = $cate;
}

$total_sql = "SELECT COUNT(1) FROM product_book $where";
$total_rows = $mysqli->query($total_sql)->fetch_row()[0];
$total_pages = ceil($total_rows / $per_page);

$product_sql = sprintf("SELECT * FROM product_book $where LIMIT %s,%s", ($page - 1) * $per_page, $per_page);
$product_rs = $mysqli->query($product_sql);
?>
<?php include __DIR__ . '/__html_head.php' ?>

    <div class="container">
        <?php include __DIR__ . '/__navbar.php' ?>
        <div class="row" style="margin-top: 20px">
            <div class="col-md-3">
                <div class="btn-group-vertical btn-block">
                    <a href="?cate=" type="button" class="btn btn-outline-primary <?= empty($cate) ? 'active' : '' ?>">全部商品</a>
                    <?php foreach ($m_ar as $k => $v): ?>
                        <a href="?cate=<?= $k ?>" type="button"
                           class="btn btn-outline-primary <?= $k == $cate ? 'active' : '' ?>"><?= $v['name'] ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-md-9">

                <div class="row">
                    <?php while ($r = $product_rs->fetch_assoc()): ?>
                        <div class="col-3">
                            <div class="card" data-sid="<?= $r['sid'] ?>">
                                <img class="card-img-top" src="imgs/small/<?= $r['sid'] ?>.jpg"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"> <?= $r['ProductName'] ?></h5>
                                    <p class="card-text">
                                        $<?= $r['Price'] ?>

                                        <select class="qty">
                                            <?php for ($i = 1; $i <= 10; $i++): ?>
                                                <option value="<?= $i ?> "><?= $i ?></option>
                                            <?php endfor ?>
                                        </select>
                                        <button class="cart_btn">Purchase</button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>

                </div>
                <div class="row d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                    <a class="page-link"
                                       href="?page=<?= $i ?>&<?= http_build_query($params) ?>"><?= $i ?></a>
                                </li>

                            <?php endfor ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.cart_btn').click(function () {
            var card = $(this).closest('.card');
            var sid = card.attr('data-sid');
            var qty = card.find('.qty').val();
            console.log(`sid : ${sid}, qty:${qty}`);
            $.get('add_to_cart.php', {sid: sid, qty: qty}, function (data) {
                console.log(data)
                changeQty(data);
            }, 'json');
        })
    </script>
<?php include __DIR__ . '/__html_foot.php' ?>