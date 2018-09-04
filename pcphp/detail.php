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


$where = " WHERE 1 ";

if (!empty($cate)) {

    $where .= " AND category_sid=$cate ";
    $params['cate'] = $cate;
}


if (!empty($_GET['label'])) {
    $label = $_GET['label'];
    $where .= " AND `Label`='$label' ";
    $params['label'] = $label;
}
if (!empty($_GET['chipsets'])) {
    $chipsets = $_GET['chipsets'];
    $where .= " AND `Chipsets`='$chipsets' ";
    $params['chipsets'] = $chipsets;
}

if (!empty($_GET['chip'])) {
    $chip = $_GET['chip'];
    $where .= " AND `Chip`='$chip' ";
    $params['chip'] = $chip;
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
    <div class="container mt-8 mb-5">
        <div class="row">
<!-- search -->
            <!-- <div class="col-md-3 col-xs-12" >
                <div class="moreSearchBox">
                    <div class="moreSearchArea">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="darkblue">首頁</a></li>
                                <li class="breadcrumb-item"><a href="#" class="darkblue">零件單購</a></li>
                                <li class="breadcrumb-item active" aria-current="page">中央處理器</li>
                            </ol>
                        </nav>
                        <div class="selectArea">
                            <select name="" class="form-control">
                                <option value="1">中央處理器</option><option value="2">主機板</option><option value="3">顯示卡</option><option value="4">記憶體</option><option value="5">內接硬碟</option><option value="6">SSD固態硬碟</option><option value="7">電源供應器</option><option value="8">電腦機殼</option>					
                            </select>
                        </div>
                    </div>   
                    <div class="moreSearchArea">
                        <p class="mb-2 mt-4 dark">廠牌</p>
                        <input type="button" class="btn btn-lightblue btn-size2" value="Intel 英特爾"><input type="button" class="btn btn-lightblue btn-size2" value="AMD 超微">	
                    </div>	
                    <div class="moreSearchArea">
                        <p class="mb-2 mt-4 dark">價格</p>
                        <input type="button" class="btn btn-lightblue btn-size2" value="5000元以下"><input type="button" class="btn btn-lightblue btn-size2" value="5000元以上">	
                    </div>	  
                    <div class="moreSearchArea">
                        <p class="mb-2 mt-4 dark">CPU類型</p>		
                        <input type="button" class="btn btn-lightblue btn-size2" value="Kaby Lake"><input type="button" class="btn btn-lightblue btn-size2" value="Coffee Lake"><input type="button" class="btn btn-lightblue btn-size2" value="Ryzen 1000"><input type="button" class="btn btn-lightblue btn-size2" value="Ryzen 2000">		
                    </div>	
                </div>
            </div> -->
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
                    <a type="button" class="btn btn-lightblue btn-size2  <?= $chip=='Intel' ? 'btn_active' : '' ?>"   href="?cate=1&chip=Intel">Intel 英特爾</a>
                    <a type="button" class="btn btn-lightblue btn-size2 <?= $chip=='AMD' ? 'btn_active' : '' ?>"  href="?cate=1&chip=AMD">AMD 超微</a>	
                    
                    <?php elseif($cate==2): ?>
                    <p class="mb-2 mt-4 dark">廠牌</p>
                    <!-- 點了 asus 之後 應該要跳出 label（廠牌） 都是 asus 的商品 -->
                    <a type="button" class="btn btn-lightblue btn-size2 <?= $label=='ASUS' ? 'btn_active' : '' ?> "  href="?cate=2&label=ASUS">ASUS華碩</a>
                    <a type="button" class="btn btn-lightblue btn-size2 <?= $label=='GIGABYTE' ? 'btn_active' : '' ?> "  href="?cate=2&label=GIGABYTE">GIGABYTE技嘉</a>
                    <a type="button" class="btn btn-lightblue btn-size2 <?= $label=='MSI' ? 'btn_active' : '' ?> "   href="?cate=2&label=MSI">MSI微星</a>

                    <?php elseif($cate==3): ?>
                    <p class="mb-2 mt-4 dark">廠牌</p>
                    <a type="button" class="btn btn-lightblue btn-size2 <?= $label=='ADATA' ? 'btn_active' : '' ?>"  href="?cate=3&label=ADATA">ADATA威剛</a>
                    <a type="button" class="btn btn-lightblue btn-size2 <?= $label=='Kingston' ? 'btn_active' : '' ?>"  href="?cate=3&label=Kingston">Kingston金士頓</a>
                    <a type="button" class="btn btn-lightblue btn-size2 <?= $label=='Micron' ? 'btn_active' : '' ?>" href="?cate=3&label=Micron">Micron美光</a>
                    <a type="button" class="btn btn-lightblue btn-size2 <?= $label=='Transcend' ? 'btn_active' : '' ?>" href="?cate=3&label=Transcend">Transcend創見</a>
                    <a type="button" class="btn btn-lightblue btn-size2 <?= $label=='UMAX' ? 'btn_active' : '' ?>" href="?cate=3&label=UMAX">UMAX世成</a>
                    <?php elseif($cate==4): ?>
                    <p class="mb-2 mt-4 dark">廠牌</p>
                    <a type="button" class="btn btn-lightblue btn-size2 <?= $label=='ADATA' ? 'btn_active' : '' ?>" href="?cate=4&label=ADATA">ADATA威剛</a>
                    <a type="button" class="btn btn-lightblue btn-size2 <?= $label=='Kingston' ? 'btn_active' : '' ?>" href="?cate=4&label=Kingston">Kingston金士頓</a>
                    <a type="button" class="btn btn-lightblue btn-size2 <?= $label=='SanDisk' ? 'btn_active' : '' ?>" href="?cate=4&label=SanDisk">SanDisk晟碟</a>
                    <a type="button" class="btn btn-lightblue btn-size2 <?= $label=='Micron' ? 'btn_active' : '' ?>" href="?cate=4&label=Micron">Micron美光</a>
                    <a type="button" class="btn btn-lightblue btn-size2 <?= $label=='WD' ? 'btn_active' : '' ?>" href="?cate=4&label=WD">WD威騰</a>
                    <?php elseif($cate==5): ?>
                    <p class="mb-2 mt-4 dark">廠牌</p>
                    <a type="button" class="btn btn-lightblue btn-size2 <?= $label=='Seagate' ? 'btn_active' : '' ?>" href="?cate=5&label=Seagate">Seagate希捷</a>
                    <a type="button" class="btn btn-lightblue btn-size2 <?= $label=='Toshiba' ? 'btn_active' : '' ?>" href="?cate=5&label=Toshiba">Toshiba東芝</a>
                    <a type="button" class="btn btn-lightblue btn-size2 <?= $label=='WD' ? 'btn_active' : '' ?>" href="?cate=5&label=WD">WD威騰</a>
                    <?php elseif($cate==6): ?>
                    <p class="mb-2 mt-4 dark">廠牌</p>
                    <a type="button" class="btn btn-lightblue btn-size2 <?= $label=='ASUS' ? 'btn_active' : '' ?>" href="?cate=6&label=ASUS">ASUS華碩</a>
                    <a type="button" class="btn btn-lightblue btn-size2 <?= $label=='GIGABYTE' ? 'btn_active' : '' ?>" href="?cate=6&label=GIGABYTE">GIGABYTE技嘉</a>
                    <a type="button" class="btn btn-lightblue btn-size2 <?= $label=='MSI' ? 'btn_active' : '' ?>" href="?cate=6&label=MSI">MSI微星</a>
                    <?php elseif($cate==7): ?>
                    <p class="mb-2 mt-4 dark">廠牌</p>
                    <a type="button" class="btn btn-lightblue btn-size2 <?= $label=='Seasonic' ? 'btn_active' : '' ?>" href="?cate=7&label=Seasonic">海韻</a>
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
                    <a type="button" class="btn btn-lightblue btn-size2" value="3000元以下" >3000元以下</a>
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
                   <?php # if($cate==1): ?>
                        <!-- <p class="mb-2 mt-4 dark">CPU類型</p>		
                        <a type="button" class="btn btn-lightblue btn-size2" value="Kaby Lake">Kaby Lake</a>
                        <a type="button" class="btn btn-lightblue btn-size2" value="Coffee Lake">Coffee Lake</a>
                        <a type="button" class="btn btn-lightblue btn-size2" value="Ryzen 1000">Ryzen 1000</a>
                        <a type="button" class="btn btn-lightblue btn-size2" value="Ryzen 2000">Ryzen 2000</a> -->
                    <?php # echo '1'?>
                    <?php if($cate==1 && $chip=='Intel'): ?>
                        <p class="mb-2 mt-4 dark">CPU類型</p>		
                        <a type="button" class="btn btn-lightblue btn-size2" value="Kaby Lake">Kaby Lake</a>
                        <a type="button" class="btn btn-lightblue btn-size2" value="Coffee Lake">Coffee Lake</a>
                    <?php elseif($cate==1 && $chip=='AMD'): ?>
                        <p class="mb-2 mt-4 dark">CPU類型</p>		
                        <a type="button" class="btn btn-lightblue btn-size2" value="Ryzen 1000">Ryzen 1000</a>
                        <a type="button" class="btn btn-lightblue btn-size2" value="Ryzen 2000">Ryzen 2000</a>
                    <?php elseif($cate==2): ?>
                        <p class="mb-2 mt-4 dark">Intel晶片組</p>		
                        <a type="button" class="btn btn-lightblue btn-size2" value="H110" href="?cate=2&label=MSI&chipsets=H110">H110</a>
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
                    <div class="col-md-6">
                        <img src="img/detail.jpg" alt="" width="100%">
                    </div>
                    <div class="col-md-6">
                        <div class="rightbox">
                            <h4>ASUS ROG STRIX B250G GAMING</h4>
                            <span class="qty_price">購買數量</span>
                            <select class="qty">
                                <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
                            </select><br>
                            <span class="qty_price">網路售價</span>
                            <span class="price">NT$2,490</span>
                            <div class="d-flex align-items-center">
                                <button class="btn btn-orange btn_half">加入購物車</button>
                                <button class="btn btn-red btn_half">立即購買</button>
                            </div>
                            <h6 class="qty_price">商品規格</h6>
                            <p class="qty_price font-size">主流電競全新系列，承接 Pro Gaming 主機板優異效能<br>
                                ROG SupremeFX S1220A 音效晶片：優異音效技術搭載雙耳擴大器，打造水晶般清澈音質<br>
                                遊戲網路：同級最佳 Intel® Gigabit 乙太網路，提供絕佳區域網路、線上遊戲體驗，並配備 LANGuard 突波防護<br>
                                次世代連線功能：內建雙 M.2 插槽，提供高達 32Gbps PCIe 頻寬和 Intel® Optane™ memory ready<br>
                                申請專利中的 ASUS SafeSlot 可強化 PCIe 固定力與剪切阻力</p>
                        </div>
                    </div>
                </div>
                <h4 class="mt-3 ml-1">相關商品</h4>
                <div class="row ml-1">
                    <div class="col-md-3 pl-1 pb-2">
                        <img class="product-img moreimg" src="img/small/55.jpg" alt="Card image cap">
                    </div>
                    <div class="col-md-3 pl-1 pb-2">
                        <img class="product-img moreimg" src="img/small/56.jpg" alt="Card image cap">
                    </div>
                    <div class="col-md-3 pl-1 pb-2">
                        <img class="product-img moreimg" src="img/small/73.jpg" alt="Card image cap">
                    </div>
                    <div class="col-md-3 pl-1 pb-2">
                        <img class="product-img moreimg" src="img/small/70.jpg" alt="Card image cap">
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--footer-->
<?php include __DIR__ . '/__footer.php' ?>  
<?php include __DIR__ . '/__html_foot.php' ?>