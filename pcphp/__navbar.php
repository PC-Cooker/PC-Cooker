<style>
    nav .navbar-nav > li.nav-item.active {
        background-color: lightblue;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">買了啦</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= $pageName == 'product_list' ? 'active' : '' ?>">
                <a class="nav-link" href="product_list.php">商品</a>
            </li>
            <li class="nav-item <?=$pageName=='cart' ? 'active' : '' ?>">
                <a class="nav-link" href="cart.php">購物車
                    <span id="qty-badge" class="badge badge-light"></span></a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <?php if (!isset($_SESSION['user'])) : ?>
                <li class="nav-item <?= $pageName == 'login' ? 'active' : '' ?>">
                    <a class="nav-link" href="login.php">登入</a>
                </li>
                <li class="nav-item <?= $pageName == 'register' ? 'active' : '' ?>">
                    <a class="nav-link" href="register.php">註冊</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="history.php"><?= $_SESSION['user']['nickname'] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">登出</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
<script>
    var changeQty = function (obj) {
        var total = 0;
        for (var s in obj) {
            total += obj[s];
        }
        $('#qty-badge').text(total)
    }
    $.get('add_to_cart.php', function (data) {
        changeQty(data);
    }, 'json');
</script>