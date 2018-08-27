<?php
require __DIR__ . '/__db_connect.php';

$pageName = 'product_list2';
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

?>
<?php include __DIR__ . '/__html_head.php' ?>

    <div class="container">
        <?php include __DIR__ . '/__navbar.php' ?>
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-3">
                <div class="btn-group-vertical btn-block">
                    <a href="#" type="button" class="btn btn-outline-primary <?= empty($cate) ? 'active' : '' ?>">全部商品</a>
                    <?php foreach($m_ar as $k=>$v): ?>
                        <a href="#<?= $k ?>" type="button" class="btn btn-outline-primary <?= $k==$cate ? 'active' : '' ?>">
                            <?= $v['name']?>
                        </a>
                    <?php endforeach; ?>
                </div>

            </div>
            <div class="col-md-9">
                <div class="row">
                </div>
                <div class="row" id="p_container">

                </div>

            </div>
        </div>
    </div>
    <script src="https://underscorejs.org/underscore-min.js"></script>
    <script>
        var p_tpl = `
        <div class="col-md-3">
                    <div class="card" data-sid="<%= sid %>">
                        <img class="product-img" src="imgs/small/<%= book_id %>.jpg"
                             alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><%= bookname %></h5>
                            <p class="card-text">
                                <i class="fas fa-male"></i> <%= author %><br>
                                <i class="fas fa-dollar-sign"></i> <%= price %><br>

                                <select class="qty">
                                    <?php for($i = 1; $i <= 20;$i++): ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php endfor ?>
                                </select>

                                <button class="cart_btn"><i class="fas fa-cart-plus"></i></button>
                            </p>
                        </div>
                    </div>
                </div>
        `;

        var tpl_func = _.template(p_tpl);
        var p_container = $('#p_container');

        var cart_btn_handler = function (event) {
            var card = $(this).closest('.card');
            var sid = card.attr('data-sid');
            var qty = card.find('.qty').val();
            console.log(`sid: ${sid}, qty: ${qty}`);

            $.get('add_to_cart.php', {sid: sid, qty: qty}, function (data) {
                console.log(data);
                changeQty(data);
            }, 'json');
        };

        var hashChanged = function () {
            var cate = location.hash.slice(1);

            $.get('product_list2_api.php', {cate: cate}, function (data) {
                $('.cart_btn').off('click');
                p_container.empty();

                var p_data = data.p_data;
                var i, str;

                for (i = 0; i < p_data.length; i++) {
                    str = tpl_func(p_data[i]);
                    p_container.append(str);
                }

                $('.cart_btn').click(cart_btn_handler);
            }, 'json');
        };

        window.addEventListener('hashchange', hashChanged);
        hashChanged();
    </script>
<?php include __DIR__ . '/__html_foot.php' ?>