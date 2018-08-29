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
//print_r($m_ar);
$per_page = 8;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$cate = isset($_GET['cate']) ? intval($_GET['cate']) : 0;
$label = isset($_GET['Label']) ? intval($_GET['Label']) : 0;

$where = " WHERE 1 ";

if (!empty($cate)) {

    $where .= " AND category_sid=$cate ";
    $params['cate'] = $cate;
}

if (!empty($label)) {

    $where .= " AND Label=$label ";
    $params['Label'] = $label;
}

$total_sql = "SELECT COUNT(1) FROM product_book $where";
$total_rows = $mysqli->query($total_sql)->fetch_row()[0];
$total_pages = ceil($total_rows / $per_page);

$product_sql = sprintf("SELECT * FROM product_book $where LIMIT %s,%s", ($page - 1) * $per_page, $per_page);
$product_rs = $mysqli->query($product_sql);
?>
<?php include __DIR__ . '/__html_head.php' ?>
	<link rel="stylesheet" type="text/css" href="component.css">
</head>
<body>
<?php include __DIR__ . '/__navbar.php' ?>
<!-- components_buy -->
<div class="container mt-8">
    <div class="row">
        <!-- search -->
        <div class="col-md-3 col-xs-12" >
            <div class="moreSearchBox">

                <div class="moreSearchArea">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="darkblue">首頁</a></li>
                            <li class="breadcrumb-item"><a href="#" class="darkblue">零件單購</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $m_ar[$cate]['name'] ?></li>
                        </ol>
                    </nav>
                    <div class="selectArea">
                        <select class="form-control" onChange="location = this.options[this.selectedIndex].value;">
                            <option value="?cate=1" <?= $cate==1 ? 'selected' : '' ?>>中央處理器</option>
                            <option value="?cate=2" <?= $cate==2 ? 'selected' : '' ?>>主機板</option>
                            <option value="?cate=3" <?= $cate==3 ? 'selected' : '' ?>>記憶體</option>
                            <option value="?cate=4" <?= $cate==4 ? 'selected' : '' ?>>固態硬碟</option>
                            <option value="?cate=5" <?= $cate==5 ? 'selected' : '' ?>>內接硬碟</option>
                            <option value="?cate=6" <?= $cate==6 ? 'selected' : '' ?>>顯示卡</option>
                            <option value="?cate=7" <?= $cate==7 ? 'selected' : '' ?>>電源供應器</option>
                            <option value="?cate=8" <?= $cate==8 ? 'selected' : '' ?>>機殼</option>
                        </select>
                    </div>
                </div>

                <div class="moreSearchArea">                    
                    <!-- 當類別是1 的時候 秀出 value 是 Intel 的，false就空字串 -->
                    <?php if($cate==1): ?>
                    <p class="mb-2 mt-4 dark">廠牌</p>
                    <a type="button" class="btn btn-lightblue btn-size2" href="?cate=1&chip=">Intel 英特爾</a>
                    <a type="button" class="btn btn-lightblue btn-size2" href="?cate=1&chip=">AMD 超微</a>	
    <!--
    <input type="button" class="btn btn-lightblue btn-size2" value="Intel 英特爾">
    <input type="button" class="btn btn-lightblue btn-size2" value="AMD 超微">	
    -->
                    <?php elseif($cate==2): ?>
                    <p class="mb-2 mt-4 dark">廠牌</p>
                    <a type="button" class="btn btn-lightblue btn-size2" href="?cate=2&label=ASUS">ASUS華碩</a>
                    <a type="button" class="btn btn-lightblue btn-size2" href="?cate=2&label=GIGABYTE">GIGABYTE技嘉</a>
                    <a type="button" class="btn btn-lightblue btn-size2" href="?cate=2&label=MSI">MSI微星</a>

                    <?php elseif($cate==3): ?>
                    <p class="mb-2 mt-4 dark">廠牌</p>
                    <a type="button" class="btn btn-lightblue btn-size2" href="?cate=3">ADATA威剛</a>
                    <a type="button" class="btn btn-lightblue btn-size2" href="?cate=3">Kingston金士頓</a>
                    <a type="button" class="btn btn-lightblue btn-size2" href="?cate=3">Micron美光</a>
                    <a type="button" class="btn btn-lightblue btn-size2" href="?cate=3">Transcend創見</a>
                    <a type="button" class="btn btn-lightblue btn-size2" href="?cate=3">UMAX世成</a>
                    <?php elseif($cate==4): ?>
                    <p class="mb-2 mt-4 dark">廠牌</p>
                    <a type="button" class="btn btn-lightblue btn-size2" href="?cate=4">ADATA威剛</a>
                    <a type="button" class="btn btn-lightblue btn-size2" href="?cate=4">Kingston金士頓</a>
                    <a type="button" class="btn btn-lightblue btn-size2" href="?cate=4">SanDisk晟碟</a>
                    <a type="button" class="btn btn-lightblue btn-size2" href="?cate=4">Micron美光</a>
                    <a type="button" class="btn btn-lightblue btn-size2" href="?cate=4">WD威騰</a>
                    <?php elseif($cate==5): ?>
                    <p class="mb-2 mt-4 dark">廠牌</p>
                    <a type="button" class="btn btn-lightblue btn-size2" href="?cate=5">Seagate希捷</a>
                    <a type="button" class="btn btn-lightblue btn-size2" href="?cate=5">Toshiba東芝</a>
                    <a type="button" class="btn btn-lightblue btn-size2" href="?cate=5">WD威騰</a>
                    <?php elseif($cate==6): ?>
                    <p class="mb-2 mt-4 dark">廠牌</p>
                    <a type="button" class="btn btn-lightblue btn-size2" href="?cate=6">ASUS華碩</a>
                    <a type="button" class="btn btn-lightblue btn-size2" href="?cate=6">GIGABYTE技嘉</a>
                    <a type="button" class="btn btn-lightblue btn-size2" href="?cate=6">MSI微星</a>
                    <?php elseif($cate==7): ?>
                    <p class="mb-2 mt-4 dark">廠牌</p>
                    <a type="button" class="btn btn-lightblue btn-size2" href="?cate=7">台達</a>
                    <?php elseif($cate==8): ?>

                    <?php endif; ?>
                </div>

                <div class="moreSearchArea">
                    <?php if($cate==1): ?>
                    <p class="mb-2 mt-4 dark">價格</p>
                    <a type="button" class="btn btn-lightblue btn-size2" value="5000元以下">5000元以下</a>
                    <a type="button" class="btn btn-lightblue btn-size2" value="5000元以上">5000元以上</a>
                    <?php elseif($cate==2): ?>
                    <p class="mb-2 mt-4 dark">價格</p>
                    <a type="button" class="btn btn-lightblue btn-size2" value="3000元以下">3000元以下</a>
                    <a type="button" class="btn btn-lightblue btn-size2" value="3000到5000">3000到5000</a>
                    <a type="button" class="btn btn-lightblue btn-size2" value="5000元以上">5000元以上</a>
                     <?php elseif($cate==3): ?>
                     <p class="mb-2 mt-4 dark">價格</p>
                    <a type="button" class="btn btn-lightblue btn-size2" value="2000元以下">2000元以下</a>
                    <a type="button" class="btn btn-lightblue btn-size2" value="2000到4000">2000到4000</a>
                    <a type="button" class="btn btn-lightblue btn-size2" value="4000元以上">4000元以上</a>	
                    <?php elseif($cate==4): ?>
                    <p class="mb-2 mt-4 dark">價格</p>
                    <a type="button" class="btn btn-lightblue btn-size2" value="2000元以下">2000元以下</a>
                    <a type="button" class="btn btn-lightblue btn-size2" value="2000到5000">2000到5000</a>
                    <a type="button" class="btn btn-lightblue btn-size2" value="5000元以上">5000元以上</a>	
                    <?php elseif($cate==5): ?>
                    <p class="mb-2 mt-4 dark">價格</p>
                    <a type="button" class="btn btn-lightblue btn-size2" value="3000元以下">3000元以下</a>
                    <a type="button" class="btn btn-lightblue btn-size2" value="3000到5000">3000到5000</a>
                    <a type="button" class="btn btn-lightblue btn-size2" value="5000元以上">5000元以上</a>	                        
                    <?php elseif($cate==6): ?>
                    <p class="mb-2 mt-4 dark">價格</p>
                    <a type="button" class="btn btn-lightblue btn-size2" value="3000元以下">3000元以下</a>
                    <a type="button" class="btn btn-lightblue btn-size2" value="3000到6000">3000到6000</a>
                    <a type="button" class="btn btn-lightblue btn-size2" value="6000到9000">6000到9000</a>
                    <a type="button" class="btn btn-lightblue btn-size2" value="9000到12000">9000到12000</a>
                    <a type="button" class="btn btn-lightblue btn-size2" value="12000到18000">12000到18000</a>
                    <a type="button" class="btn btn-lightblue btn-size2" value="18000元以上">18000元以上</a>	
                    <?php elseif($cate==7): ?>
                    <?php elseif($cate==8): ?>
                    <p class="mb-2 mt-4 dark">價格</p>
                    <a type="button" class="btn btn-lightblue btn-size2" value="2000元以下">2000元以下</a>
                    <a type="button" class="btn btn-lightblue btn-size2" value="2000元以上">2000元以上</a>
                    <?php endif; ?>	
                </div>

                <div class="moreSearchArea">
                    <?php if($cate==1): ?>
                        <p class="mb-2 mt-4 dark">CPU類型</p>		
                        <a type="button" class="btn btn-lightblue btn-size2" value="Kaby Lake">Kaby Lake</a>
                        <a type="button" class="btn btn-lightblue btn-size2" value="Coffee Lake">Coffee Lake</a>
                        <a type="button" class="btn btn-lightblue btn-size2" value="Ryzen 1000">Ryzen 1000</a>
                        <a type="button" class="btn btn-lightblue btn-size2" value="Ryzen 2000">Ryzen 2000</a>
                    <?php elseif($cate==2): ?>
                        <p class="mb-2 mt-4 dark">Intel晶片組</p>		
                        <a type="button" class="btn btn-lightblue btn-size2" value="H110">H110</a>
                        <a type="button" class="btn btn-lightblue btn-size2" value="B250">B250</a>
                        <a type="button" class="btn btn-lightblue btn-size2" value="B360">B360</a>
                        <a type="button" class="btn btn-lightblue btn-size2" value="Z370">Z370</a>
                    	<p class="mb-2 mt-4 dark">AMD晶片組</p>		
                        <a type="button" class="btn btn-lightblue btn-size2" value="A320">A320</a>
                        <a type="button" class="btn btn-lightblue btn-size2" value="B350">B350</a>
                        <a type="button" class="btn btn-lightblue btn-size2" value="X370">X370</a>
                        <a type="button" class="btn btn-lightblue btn-size2" value="X470">X470</a>		
                    <?php elseif($cate==3): ?>
                        <p class="mb-2 mt-4 dark">記憶體大小</p>		
                        <a type="button" class="btn btn-lightblue btn-size3" value="4G">4G</a>                     	
                        <a type="button" class="btn btn-lightblue btn-size3" value="8G">8G</a>
                        <a type="button" class="btn btn-lightblue btn-size3" value="16G">16G</a>
                     <?php elseif($cate==4): ?>
                        <p class="mb-2 mt-4 dark">容量大小</p>		
                        <a type="button" class="btn btn-lightblue btn-size2" value="<512G"><512G</a>
                        <a type="button" class="btn btn-lightblue btn-size2" value="512G~1TB">512G~1TB</a>
                        <a type="button" class="btn btn-lightblue btn-size2" value=">1TB">>1TB</a>
                     <?php elseif($cate==5): ?>
                        <p class="mb-2 mt-4 dark">容量大小</p>		
                        <a type="button" class="btn btn-lightblue btn-size2" value="<2TB"><2TB</a>
                        <a type="button" class="btn btn-lightblue btn-size2" value="2TB~4TB">2TB~4TB</a>
                        <a type="button" class="btn btn-lightblue btn-size2" value=">4TB">>4TB</a>

                     <?php elseif($cate==6): ?>
                        <p class="mb-2 mt-4 dark">NVIDIA顯示晶片組</p>		
                        <a type="button" class="btn btn-lightblue btn-size3" value="GT1030">GT1030</a>
                        <a type="button" class="btn btn-lightblue btn-size3" value="GT1050">GT1050</a>
                        <a type="button" class="btn btn-lightblue btn-size3" value="GT1050Ti">GT1050Ti</a>
                        <a type="button" class="btn btn-lightblue btn-size3" value="GT1060">GT1060</a>
                        <a type="button" class="btn btn-lightblue btn-size3" value="GT1060Ti">GT1060Ti</a>
                        <a type="button" class="btn btn-lightblue btn-size3" value="GT1070">GT1070</a>
                        <a type="button" class="btn btn-lightblue btn-size3" value="GT1070Ti">GT1070Ti</a>
                        <a type="button" class="btn btn-lightblue btn-size3" value="GT1080">GT1080</a>
                        <a type="button" class="btn btn-lightblue btn-size3" value="GT1080Ti">GT1080Ti</a>			
                        <p class="mb-2 mt-4 dark">AMD顯示晶片組</p>		
                        <a type="button" class="btn btn-lightblue btn-size3" value="R7 240">R7 240</a>
                        <a type="button" class="btn btn-lightblue btn-size3" value="R7 250">R7 250</a>
                        <a type="button" class="btn btn-lightblue btn-size3" value="RX550">RX550</a>
                        <a type="button" class="btn btn-lightblue btn-size3" value="RX560">RX560</a>
                        <a type="button" class="btn btn-lightblue btn-size3" value="RX570">RX570</a>
                        <a type="button" class="btn btn-lightblue btn-size3" value="RX580">RX580</a>

                     <?php elseif($cate==7): ?>
                        <p class="mb-2 mt-4 dark">瓦數</p>
                        <a type="button" class="btn btn-lightblue btn-size2" value="400W">400W</a>
                        <a type="button" class="btn btn-lightblue btn-size2" value="450W">450W</a>
                        <a type="button" class="btn btn-lightblue btn-size2" value="500W">500W</a>
                        <a type="button" class="btn btn-lightblue btn-size2" value="600W">600W</a>

                     <?php elseif($cate==8): ?>
                     


                    <?php endif; ?>                     
                </div>
                                            
            </div>
        </div>                             
        <!--product-->
        <div class="col-md-9 col-xs-12 pl-3">
            <div class="row">
                <?php while ($r = $product_rs->fetch_assoc()): ?>
                    <div class="col-md-3">
                        <div class="productitem">
                            <div class="producteach">
                                <div class="producteach_img" data-sid="<?= $r['sid'] ?>"><img src="imgs/small/<?= $r['sid'] ?>.jpg" alt="" width="200px" height="200px"></div>
                                <a href="#"><?= $r['ProductName'] ?></a>
                                <h3>$<?= $r['Price'] ?></h3>
                                <div class="productitem_btn">加入購物袋</div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
                
            <div class="row d-flex justify-content-center mt-3">
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
    
<?php include __DIR__ . '/__footer.php' ?> 
   <script>
        $('.productitem_btn').click(function () {
            var card = $(this).closest('.card');
            var sid = card.attr('data-sid');
            var qty = card.find('.qty').val();
            console.log(`sid : ${sid}, qty:${qty}`);
            $.get('add_to_cart.php', {sid: sid, qty: qty}, function (data) {
                console.log(data)
                changeQty(data);
            }, 'json');
        });

   </script>  
<?php include __DIR__ . '/__html_foot.php' ?>