<?php
require __DIR__ . '/__db_connect.php';
$pageName = 'stepbystep';
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
<link rel="stylesheet" type="text/css" href="stepbystep.css">
</head>
<body>
<!-- navbar -->
<?php include __DIR__ . '/__navbar.php' ?>
<!-- end of navbar -->
	<!-- stepbystep 上面區塊 -->
	<div class="stepbystep_100vw">
		<div class="stepbystep_top_container">
			<!-- 下方浮出的選單 -->
			<div class="li_down">
				<div class="li_down_left">
					<ul class="down_ul">
						<li class="software_li down_li down_software"><img src="img/li01-down.svg"><br>軟體</li>
						<li class="cpu_li down_li down_cpu"><img src="img/li02-down.svg"><br>中央處理器</li>
						<li class="mb_li down_li down_mb"><img src="img/li03-down.svg"><br>主機板</li>
						<li class="ram_li down_li down_ram"><img src="img/li04-down.svg"><br>記憶體</li>
						<li class="gpu_li down_li down_gpu"><img src="img/li05-down.svg"><br>顯示卡</li>
						<li class="hdd_li down_li down_hdd"><img src="img/li06-down.svg"><br>硬碟</li>
						<li class="power_li down_li down_power"><img src="img/li07-down.svg"><br>電源供應器</li>
						<li class="case_li down_li down_case"><img src="img/li08-down.svg"><br>機殼</li>
					</ul>
				</div>
				<div class="li_down_right">
					<div class="d-flex">
						<p>目前合計：NT$</p>
						<div class="price_text"></div>
					</div>
					<a href="cart.php" data-sids="15,46,101,137,171,200,204" class="package_btn"><div class="li_shop"><h5>查看挑選清單</h5></div></a>
				</div>
			</div>

			<h1>我要組電腦</h1>
			<h3>從主機板、顯示卡一步一步選購最符合你的需求<br>
				最佳最嚴謹的篩選條件，讓您不會組裝失誤</h3>
			<div class="process">	
			<ul	class="stepbystep_items">
				<li class="software_li"><img src="img/li01.svg"> 軟體</li>
				<li class="cpu_li"><img src="img/li02.svg"> 中央處理器</li>
				<li class="mb_li"><img src="img/li03.svg"> 主機板</li>	
				<li class="ram_li"><img src="img/li04.svg"> 記憶體</li>
				<li class="gpu_li"><img src="img/li05.svg"> 顯示卡</li>
				<li class="hdd_li"><img src="img/li06.svg"> 硬碟</li>
				<li class="power_li"><img src="img/li07.svg"> 電源供應器</li>
				<li class="case_li"><img src="img/li08.svg"> 機殼</li>
			</ul>
			<div class="point_container">
				<div class="point point_software"><img src="img/point.svg"></div>
			</div>
			</div>
			<ul	class="stepbystep_items_mobile">
					<li class="software_li"><img src="img/li01.svg"></li>
					<li class="cpu_li"><img src="img/li02.svg"></li>
					<li class="mb_li"><img src="img/li03.svg"></li>	
					<li class="ram_li"><img src="img/li04.svg"></li>
					<li class="gpu_li"><img src="img/li05.svg"></li>
					<li class="hdd_li"><img src="img/li06.svg"></li>
					<li class="power_li"><img src="img/li07.svg"></li>
					<li class="case_li"><img src="img/li08.svg"></li>
			</ul>
		</div>
	</div>
	<!-- stepbystep 軟體分類挑選 -->
	<div class="stepbystep_software_container">
		<!-- <div class="next_page_btn"></div> -->
		<h1>請選擇平時使用電腦的用途？</h1>
		<div class="software_01">
			<div class="three_software music">
				<div class="software_img"><img src="img/software_music.svg"></div>
				<h2>影音編輯</h2>
				<h3>Video Editor</h3>
				<!-- <a  href="" class="learnmore_btn">瞭解更多</a> -->
			</div>
			<div class="three_software book">
				<div class="software_img"><img src="img/software_book.svg"></div>
				<h2>文書處理</h2>
				<h3>Document Processing</h3>
				<!-- <a href="" class="learnmore_btn">瞭解更多</a> -->
			</div>
			<div class="three_software paint">
				<div class="software_img"><img src="img/software_paint.svg"></div>
				<h2>繪圖設計</h2>
				<h3>Design&Draw</h3>
				<!-- <a href="" class="learnmore_btn">瞭解更多</a> -->
			</div>
		</div>
		<div class="rem_music">
			<div class="rem_text">
				<h2>影音編輯推薦</h2>
				<h3>如果平時你是使用Ae特效居多的工作者，推薦您的電腦效能為</h3>
				<!-- <img class="rem_cancel" src="img/rem_cancel.svg"> -->
			</div>
			<div class="rem_music_flex">
				<div class="rem_music_div">
					<div class="rem_music_img"><img src="img/case-image-1.png" width="200px"></div>
					<p>影音編輯超值組合一號餐</p>
					<h4>NT$29900</h4>
					<div class="rem_btn">放入購物袋</div>
				</div>
				<div class="rem_music_div">
					<div class="rem_music_img"><img src="img/case-image-1.png" width="200px"></div>
					<p>影音編輯超值組合二號餐</p>
					<h4>NT$29900</h4>
					<div class="rem_btn">放入購物袋</div>
				</div>
				<div class="rem_music_div">
					<div class="rem_music_img"><img src="img/case-image-1.png" width="200px"></div>
					<p>影音編輯超值組合三號餐</p>
					<h4>NT$29900</h4>
					<div class="rem_btn">放入購物袋</div>
				</div>
			</div>
		</div>

		<div class="rem_book">
			<div class="rem_text">
					<h2>文書處理推薦</h2>
					<h3>如果平時你是使用Ae特效居多的工作者，推薦您的電腦效能為</h3>
				</div>
				<div class="rem_music_flex">
					<div class="rem_music_div">
						<div class="rem_music_img"><img src="img/case-image-1.png" width="200px"></div>
						<p>影音編輯超值組合一號餐</p>
						<h4>NT$29900</h4>
						<div class="rem_btn">放入購物袋</div>
					</div>
					<div class="rem_music_div">
						<div class="rem_music_img"><img src="img/case-image-1.png" width="200px"></div>
						<p>影音編輯超值組合二號餐</p>
						<h4>NT$29900</h4>
						<div class="rem_btn">放入購物袋</div>
					</div>
					<div class="rem_music_div">
						<div class="rem_music_img"><img src="img/case-image-1.png" width="200px"></div>
						<p>影音編輯超值組合三號餐</p>
						<h4>NT$29900</h4>
						<div class="rem_btn">放入購物袋</div>
					</div>
				</div>
		</div>

		<div class="rem_paint">
			<div class="rem_text">
					<h2>繪圖設計推薦</h2>
					<h3>如果平時你是使用Ae特效居多的工作者，推薦您的電腦效能為</h3>
				</div>
				<div class="rem_music_flex">
					<div class="rem_music_div">
						<div class="rem_music_img"><img src="img/case-image-1.png" width="200px"></div>
						<p>影音編輯超值組合一號餐</p>
						<h4>NT$29900</h4>
						<div class="rem_btn">放入購物袋</div>
					</div>
					<div class="rem_music_div">
						<div class="rem_music_img"><img src="img/case-image-1.png" width="200px"></div>
						<p>影音編輯超值組合二號餐</p>
						<h4>NT$29900</h4>
						<div class="rem_btn">放入購物袋</div>
					</div>
					<div class="rem_music_div">
						<div class="rem_music_img"><img src="img/case-image-1.png" width="200px"></div>
						<p>影音編輯超值組合三號餐</p>
						<h4>NT$29900</h4>
						<div class="rem_btn">放入購物袋</div>
					</div>
				</div>
		</div>
		<h1>請告訴我你平時玩什麼？</h1>
		<div class="software_game">
			<img src="img/software_game.svg" alt="">
			<h2>電玩遊戲</h2>
			<h3>Games</h3>
		</div>
		<div class="software_02">
			<div class="game">
				<div class="select_not"><img src="img/not_select.svg"></div>
				<div class="select"><img src="img/select.svg"></div>
				<img class="game_img" src="img/game01.png" ><br>
				<div>
				<p>英雄聯盟</p>
				</div>
			</div>
			
			<div class="game">
					<div class="select_not"><img src="img/not_select.svg"></div>
					<div class="select"><img src="img/select.svg"></div>
					<img class="game_img" src="img/game02.png" alt=""><br>
					<div>
					
					<p>爐石戰記</p>
					</div>
			</div>
			<div class="game">
					<div class="select_not"><img src="img/not_select.svg"></div>
					<div class="select"><img src="img/select.svg"></div>
					<img class="game_img" src="img/game03.png" alt=""><br>
					<div>
					
					<p>暗黑破壞神III</p>
					</div>
			</div>
			<div class="game">
					<div class="select_not"><img src="img/not_select.svg"></div>
					<div class="select"><img src="img/select.svg"></div>
					<img class="game_img" src="img/game04.png" alt=""><br>
					<div>
					
					<p>絕地求生</p>
					</div>
			</div>
			<div class="game">
					<div class="select_not"><img src="img/not_select.svg"></div>
					<div class="select"><img src="img/select.svg"></div>
					<img class="game_img" src="img/game05.png" alt=""><br>
					<div>
					
					<p>流亡黯道</p>
					</div>
			</div>
			<div class="game">
					<div class="select_not"><img src="img/not_select.svg"></div>
					<div class="select"><img src="img/select.svg"></div>
					<img class="game_img" src="img/game06.png" alt=""><br>
					<div>
					
					<p>要塞英雄</p>
					</div>
			</div>
			<div class="game">
					<div class="select_not"><img src="img/not_select.svg"></div>
					<div class="select"><img src="img/select.svg"></div>
					<img class="game_img" src="img/game07.png" alt=""><br>
					<div>
					
					<p>魔物獵人:世界</p>
					</div>
			</div>
			<div class="game">
					<div class="select_not"><img src="img/not_select.svg"></div>
					<div class="select"><img src="img/select.svg"></div>
					<img class="game_img" src="img/game08.png" alt=""><br>
					<div>
					
					<p>黑色沙漠</p>
					</div>
			</div>
			<div class="game">
					<div class="select_not"><img src="img/not_select.svg"></div>
					<div class="select"><img src="img/select.svg"></div>
					<img class="game_img" src="img/game09.png" alt=""><br>
					<div>
					<p>俠盜獵車手</p>
					</div>
			</div>
			<div class="game_more">
					<div>
					<p>更多選擇...</p>
					</div>
			</div>
		</div>
	</div>
	<!-- 中央處理器 -->
	<div class="sale_container sale_cpu">
		<div class="cpu_text">
			<h3>您選擇了 <span class="ms_text">魔物獵人:世界</span> 以下為您推薦適合的中央處理器<br>完美的效能表現最貼近您的使用、遊玩需求</h3>
		</div>
		<div class="cpu_flex cpu_01">
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/15.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">4000</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/16.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">4000</span></h2>
			</div>
			<div class="cpu_text">
				<h3>查看更多其他中央處理器</h3>
			</div>
			
			<div class="cpu_sale cpu_02">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">600</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/4.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">5300</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/5.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1200</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/17.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
				
		</div>
		
	</div>
	<!-- 主機板 -->
	<div class="sale_container sale_mb">
		<div class="cpu_text">
			<h3>您選擇了 <span class="ms_text">魔物獵人:世界</span> 以下為您推薦適合的主機板</h3>
		</div>
		<div class="cpu_flex">
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/10.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">3000</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">2000</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_text">
				<h3>查看更多其他中央處理器</h3>
			</div>
			
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
		</div>
	
			
	</div>
	<!-- 記憶體 -->
	<div class="sale_container sale_ram">
		<div class="cpu_text">
			<h3>您選擇了 <span class="ms_text">魔物獵人:世界</span> 以下為您推薦的記憶體</h3>
		</div>
		<div class="cpu_flex">
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_text">
				<h3>查看更多其他中央處理器</h3>
			</div>
			
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
		</div>
		
			
	</div>
	<!-- 顯示卡 -->
	<div class="sale_container sale_gpu">
		<div class="cpu_text">
			<h3>您選擇了 <span class="ms_text">魔物獵人:世界</span> 以下為您推薦適合的顯示卡</h3>
		</div>
		<div class="cpu_flex">
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_text">
				<h3>查看更多其他中央處理器</h3>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
				
		</div>
		
	</div>
	<!-- 硬碟 -->
	<div class="sale_container sale_hdd">
		<div class="cpu_text">
			<h3>您選擇了 <span class="ms_text">魔物獵人:世界</span> 以下為您推薦適合的硬碟</h3>
		</div>
		<div class="cpu_flex">
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_text">
				<h3>查看更多其他中央處理器</h3>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
		</div>
		
	</div>
	<!-- 電源供應器 -->
	<div class="sale_container sale_power">
		<div class="cpu_text">
			<h3>您選擇了 <span class="ms_text">魔物獵人:世界</span> 以下為您推薦適合的電源供應器</h3>
		</div>
		<div class="cpu_flex">
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_text">
				<h3>查看更多其他中央處理器</h3>
			</div>
			
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
		</div>
		
	</div>
	<!-- 機殼 -->
	<div class="sale_container sale_case">
		<div class="cpu_text">
			<h3>您選擇了 <span class="ms_text">魔物獵人:世界</span> 機殼</h3>
		</div>
		<div class="cpu_flex">
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_text">
				<h3>查看更多其他中央處理器</h3>
			</div>
			
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
			<div class="cpu_sale">
				<div class="cpu_sale_img">
					<div class="select_no"><img src="img/not_select.svg"></div>
					<div class="select_yes"><img src="img/select.svg"></div>
					<img src="img/small/1.jpg">
				</div>
				<h1>Intel KabyLake Core i3-7100 3.9GHz 51W</h1>
				<h2>NT$<span class="price">1000</span></h2>
			</div>
				
		</div>
	</div>

<!-- footer -->
<?php include __DIR__ . '/__footer.php' ?> 

	<script>
	//挑選遊戲
	 $(".game").click(function(){
		 $(this).find('.select').toggleClass('select_light')
	 });
	 //挑選影音、設計、文書
	//  $('.three_software').click(function(){
	// 	 $(this).siblings().removeClass('three_software_active')
	// 	 $(this).toggleClass('three_software_active')
	//  });
	 $('.three_software.music').click(function(){
		 if($('.rem_book').hasClass('rem_book_open')||$('.rem_paint').hasClass('rem_paint_open')){
			 $('.rem_book').removeClass('rem_book_open')
			 $('.rem_paint').removeClass('rem_paint_open')
		 }
		 $('.rem_music').toggleClass('rem_music_open');
	 });
	 $('.three_software.book').click(function(){
		 if($('.rem_music').hasClass('rem_music_open')||$('.rem_paint').hasClass('rem_paint_open')){
			 $('.rem_music').removeClass('rem_music_open')
			 $('.rem_paint').removeClass('rem_paint_open')
		 }
		$('.rem_book').toggleClass('rem_book_open');
	 });
	 
	 $('.three_software.paint').click(function(){
		 if($('.rem_music').hasClass('rem_music_open')||$('.rem_book').hasClass('rem_book_open')){
			 $('.rem_music').removeClass('rem_music_open')
			 $('.rem_book').removeClass('rem_book_open')
		 }
		 $('.rem_paint').toggleClass('rem_paint_open');
	 });
	$('.rem_cancel').click(function(){
		$('.rem_music').removeClass('rem_music_open')
	});
	
	//挑選商品時的勾選
	$('.cpu_sale').click(function(){
		$(this).siblings().find('.select_yes').css('opacity','0')
		$(this).siblings().find('.select_no').css('opacity','1')
		$(this).find('.select_no').css('opacity','0')
		$(this).find('.select_yes').css('opacity','1')
		$(this).siblings().removeClass('cpu_border')
		$(this).addClass('cpu_border')
	});
	
	//指標三角形與更換頁面的的效果
	 	$('.software_li').click(function(){
			$('.point').removeClass('point_software')
			$('.point').removeClass('point_cpu')
			$('.point').removeClass('point_mb')
			$('.point').removeClass('point_ram')
			$('.point').removeClass('point_gpu')
			$('.point').removeClass('point_hdd')
			$('.point').removeClass('point_power')
			$('.point').removeClass('point_case')
			$('.point').addClass('point_software')
			//打開自己
			$('.stepbystep_software_container').removeClass('stepbystep_close')
			//關上別人
			$('.sale_cpu').removeClass('cpu_open')
			$('.sale_mb').removeClass('mb_open')
			$('.sale_ram').removeClass('ram_open')
			$('.sale_gpu').removeClass('gpu_open')
			$('.sale_hdd').removeClass('hdd_open')
			$('.sale_power').removeClass('power_open')
			$('.sale_case').removeClass('case_open')
			//
			$('.down_li').css('filter','opacity(.2)')
			$('.down_software').css('filter','opacity(1)')
			//移動的動畫
			$('html,body').animate({
            scrollTop: $(".stepbystep_software_container").offset().top-130},
            'slow');
		});
		$('.cpu_li').click(function(){
			$('.point').removeClass('point_software')
			$('.point').removeClass('point_cpu')
			$('.point').removeClass('point_mb')
			$('.point').removeClass('point_ram')
			$('.point').removeClass('point_gpu')
			$('.point').removeClass('point_hdd')
			$('.point').removeClass('point_power')
			$('.point').removeClass('point_case')
			$('.point').addClass('point_cpu')
			//先打開自己
			$('.sale_cpu').addClass('cpu_open')
			//再關上別人
			$('.stepbystep_software_container').addClass('stepbystep_close')
			$('.sale_mb').removeClass('mb_open')
			$('.sale_ram').removeClass('ram_open')
			$('.sale_gpu').removeClass('gpu_open')
			$('.sale_hdd').removeClass('hdd_open')
			$('.sale_power').removeClass('power_open')
			$('.sale_case').removeClass('case_open')
			//
			$('.down_li').css('filter','opacity(.2)')
			$('.down_cpu').css('filter','opacity(1)')
			//移動的動畫
			$('html,body').animate({
            scrollTop: $(".sale_cpu").offset().top-130},
            'slow');
		});
		$('.mb_li').click(function(){
			$('.point').removeClass('point_software')
			$('.point').removeClass('point_cpu')
			$('.point').removeClass('point_mb')
			$('.point').removeClass('point_ram')
			$('.point').removeClass('point_gpu')
			$('.point').removeClass('point_hdd')
			$('.point').removeClass('point_power')
			$('.point').removeClass('point_case')
			$('.point').addClass('point_mb')
			$('.sale_mb').addClass('mb_open')
			//打開自己
			$('.sale_mb').addClass('mb_open')
			//關上別人
			$('.stepbystep_software_container').addClass('stepbystep_close')
			$('.sale_cpu').removeClass('cpu_open')
			$('.sale_ram').removeClass('ram_open')
			$('.sale_gpu').removeClass('gpu_open')
			$('.sale_hdd').removeClass('hdd_open')
			$('.sale_power').removeClass('power_open')
			$('.sale_case').removeClass('case_open')
			//
			$('.down_li').css('filter','opacity(.2)')
			$('.down_mb').css('filter','opacity(1)')
			//移動的動畫
			$('html,body').animate({
            scrollTop: $(".sale_mb").offset().top-130},
            'slow');
		});
		
		$('.ram_li').click(function(){
			$('.point').removeClass('point_software')
			$('.point').removeClass('point_cpu')
			$('.point').removeClass('point_mb')
			$('.point').removeClass('point_ram')
			$('.point').removeClass('point_gpu')
			$('.point').removeClass('point_hdd')
			$('.point').removeClass('point_power')
			$('.point').removeClass('point_case')
			$('.point').addClass('point_ram')
			//
			$('.sale_ram').addClass('ram_open')
			//關上別人
			$('.stepbystep_software_container').addClass('stepbystep_close')
			$('.sale_cpu').removeClass('cpu_open')
			$('.sale_mb').removeClass('mb_open')
			$('.sale_gpu').removeClass('gpu_open')
			$('.sale_hdd').removeClass('hdd_open')
			$('.sale_power').removeClass('power_open')
			$('.sale_case').removeClass('case_open')
			//
			$('.down_li').css('filter','opacity(.2)')
			$('.down_ram').css('filter','opacity(1)')
			//移動的動畫
			$('html,body').animate({
            scrollTop: $(".sale_ram").offset().top-130},
            'slow');
		});
		$('.gpu_li').click(function(){
			$('.point').removeClass('point_software')
			$('.point').removeClass('point_cpu')
			$('.point').removeClass('point_mb')
			$('.point').removeClass('point_ram')
			$('.point').removeClass('point_gpu')
			$('.point').removeClass('point_hdd')
			$('.point').removeClass('point_power')
			$('.point').removeClass('point_case')
			$('.point').addClass('point_gpu')
			//
			$('.sale_gpu').addClass('gpu_open')
			//關上別人
			$('.stepbystep_software_container').addClass('stepbystep_close')
			$('.sale_cpu').removeClass('cpu_open')
			$('.sale_mb').removeClass('mb_open')
			$('.sale_ram').removeClass('ram_open')
			$('.sale_hdd').removeClass('hdd_open')
			$('.sale_power').removeClass('power_open')
			$('.sale_case').removeClass('case_open')
			//
			$('.down_li').css('filter','opacity(.2)')
			$('.down_gpu').css('filter','opacity(1)')
			//移動的動畫
			$('html,body').animate({
            scrollTop: $(".sale_gpu").offset().top-130},
            'slow');
		});
		$('.hdd_li').click(function(){
			$('.point').removeClass('point_software')
			$('.point').removeClass('point_cpu')
			$('.point').removeClass('point_mb')
			$('.point').removeClass('point_ram')
			$('.point').removeClass('point_gpu')
			$('.point').removeClass('point_hdd')
			$('.point').removeClass('point_power')
			$('.point').removeClass('point_case')
			$('.point').addClass('point_hdd')
			//
			$('.sale_hdd').addClass('hdd_open')
			//關上別人
			$('.stepbystep_software_container').addClass('stepbystep_close')
			$('.sale_cpu').removeClass('cpu_open')
			$('.sale_mb').removeClass('mb_open')
			$('.sale_ram').removeClass('ram_open')
			$('.sale_gpu').removeClass('gpu_open')
			$('.sale_power').removeClass('power_open')
			$('.sale_case').removeClass('case_open')
			//
			$('.down_li').css('filter','opacity(.2)')
			$('.down_hdd').css('filter','opacity(1)')
			//移動的動畫
			$('html,body').animate({
            scrollTop: $(".sale_hdd").offset().top-130},
            'slow');
		});
		$('.power_li').click(function(){
			$('.point').removeClass('point_software')
			$('.point').removeClass('point_cpu')
			$('.point').removeClass('point_mb')
			$('.point').removeClass('point_ram')
			$('.point').removeClass('point_gpu')
			$('.point').removeClass('point_hdd')
			$('.point').removeClass('point_power')
			$('.point').removeClass('point_case')
			$('.point').addClass('point_power')
			//
			$('.sale_power').addClass('power_open')
			//關上別人
			$('.stepbystep_software_container').addClass('stepbystep_close')
			$('.sale_cpu').removeClass('cpu_open')
			$('.sale_mb').removeClass('mb_open')
			$('.sale_ram').removeClass('ram_open')
			$('.sale_gpu').removeClass('gpu_open')
			$('.sale_hdd').removeClass('hdd_open')
			$('.sale_case').removeClass('case_open')
			//
			$('.down_li').css('filter','opacity(.2)')
			$('.down_power').css('filter','opacity(1)')
			//移動的動畫
			$('html,body').animate({
            scrollTop: $(".sale_power").offset().top-130},
            'slow');
		});
		$('.case_li').click(function(){
			$('.point').removeClass('point_software')
			$('.point').removeClass('point_cpu')
			$('.point').removeClass('point_mb')
			$('.point').removeClass('point_ram')
			$('.point').removeClass('point_gpu')
			$('.point').removeClass('point_hdd')
			$('.point').removeClass('point_power')
			$('.point').removeClass('point_case')
			$('.point').addClass('point_case')
			//
			$('.sale_case').addClass('case_open')
			//關上別人
			$('.stepbystep_software_container').addClass('stepbystep_close')
			$('.sale_cpu').removeClass('cpu_open')
			$('.sale_mb').removeClass('mb_open')
			$('.sale_ram').removeClass('ram_open')
			$('.sale_gpu').removeClass('gpu_open')
			$('.sale_hdd').removeClass('hdd_open')
			$('.sale_power').removeClass('power_open')
			//
			$('.down_li').css('filter','opacity(.2)')
			$('.down_case').css('filter','opacity(1)')
			//移動的動畫
			$('html,body').animate({
            scrollTop: $(".sale_case").offset().top-130},
            'slow');
		});
		
		// var a = $(".navbar").offset().bottom;
     	// $(window).scroll(function(){
        //  var p = $(this).scrollTop();
        //  var no = false;
        //  console.log(p);
        // if( p < a ){
        //         $(".navbar").removeClass("navbar_appear");
        //         no = false;
        // }else{
        //         $(".navbar").addClass("navbar_appear");
        //         no = true;
        // }
		// var a = $('.stepbystep_software_container').offset().top-340;
		// 	console.log(a);
		// 	$(window).scroll(function(){
		// 	var p = $(this).scrollTop();
		// 	console.log(p);
		// 	if(p>a){
		// 		$('.navbar').addClass('navbar_appear')
		// 	}else{
		// 		$('.navbar').removeClass('navbar_appear')
		// 	}
		// });
		// 
			
		//捲動時的進度條
		var processTop = $('.process').offset().top-80;
		console.log(processTop)
		$(window).scroll(function(){
			var processFixed = $(this).scrollTop();
			if( processFixed > processTop){
				$('.li_down').css('bottom','0px')
			}else{
				$('.li_down').css('bottom','-80px')
			}
		});
		$('.down_li').click(function(){
			$(this).siblings().css('filter','opacity(.2)')
			$(this).css('filter','opacity(1)')
		});
		
		// var price = $('.price').text()
		// console.log(price);
		var total_price = 0;
		var cpu_sales = $('.cpu_sale');
		cpu_sales.click(function(){
			var price; // = $(this).find('.price').text();
			//alert(price);
			total_price = 0;
			cpu_sales.each(function(){
				if($(this).hasClass('cpu_border')){
					price = parseInt($(this).find('.price').text());
					total_price += price;
					console.log(price, total_price);
				}
				$('.price_text').html(total_price);
			});
			
			// alert(total_price);
		});
        $('.package_btn').click(function(){
             var sids = $(this).attr('data-sids');
	         $.get('add_to_cart2.php',{sids:sids},function(data){
             });
         })
	</script>
<?php include __DIR__ . '/__html_foot.php' ?>