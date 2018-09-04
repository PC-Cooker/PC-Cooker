<?php
require __DIR__ . '/__db_connect.php';
$pageName = 'comment';
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
	<link rel="stylesheet" type="text/css" href="comment.css">
</head>
<body>
	<!-- navbar -->
	<?php include __DIR__ . '/__navbar.php' ?>
	<!-- end of navbar -->	

	<!-- 用戶評論 hero section -->
	<div class="container-fluid h-section">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<h1>用戶評論區</h1>
					<p>透過會員們的分享購買心得<br>
					沒有頭緒的你 也可以挑選出最適合的商品</p>
				</div>
			</div>			
		</div>
		
	</div>

	
	<!-- 熱門評論 -->
	<div class="container comment">
		<div class="row">
			<div class="col-12">
				<!-- search bar -->
				<div class="s_bar d-flex flex-wrap">
					<div class="col-12">
						<div class="row">
							<div class="col-12 col-md-6">
								<div class="row">
									<input type="text" name="" placeholder="輸入產品關鍵字查詢用戶評論" class="searchbar">
									<img src="img/search.svg">
								</div>
							</div>
							<div class="col-12 col-md-6 pt-2">
								<div class="row">
									<p class="keyword"><span class="hot_keyword">熱門關鍵字</span> <span><span class="select"><a href="#">黑色沙漠</a></span><a href="#"> 吃雞</a><a href="#"> 魔物獵人 </a><a href="#">電競</a><a href="#"> LOL</a></span>
										<span class="d-none d-md-inline">ROG STRIX</span>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end of search bar -->
				
				<h3>最新評論</h3>
				<div class="col-12 c-space my-3">
					<div class="row">
						<div class="col-12 col-sm-6">
							<div class="post">
								<div class="profile d-flex">
									<img src="https://picsum.photos/300/200?random=1"><span>爾尼翰<br><span class="username">贊助</span></span>
								</div>
								<div class="p-text">買ROG STRIX 系列指定顯示卡，登錄送限量「Steam美金20點」，活動期間買ROG STRIX 顯示卡，登錄送限量「Steam 美金20點」ROG STRIX顯卡玩家必備電競首選。<a href="#">閱讀更多</a>
									<div class="p-img my-3"><img src="img/GraphicCard.jpg"></div>
								</div>
				
							</div>
						</div>
						<div class="col-12 col-sm-6 list">
							<h4>購買清單<img src="img/dropdown.svg" class="d-md-none d-inline-flex row-reverse" width="15px"></h4>
							<div class="pd-list d-none d-sm-flex flex-wrap justify-content-center">
								<div class="pd d-flex flex-wrap pd-desktop">
									<table class="pd table text-left">
										<tbody>
											<tr>
												<th scope="row">CPU</th>
												<td>Intel i5-8400</td>
											</tr>
											<tr>
												<th scope="row">主機板</th>
												<td>微星 B360M FIRE</td>
											</tr>
											<tr>
												<th scope="row">記憶體</th>
												<td>創見 8G 2400MHz</td>
											</tr>
											<tr>
												<th scope="row">硬碟</th>
												<td>美光 MX500 500G</td>
											</tr>
											<tr>
												<th scope="row">顯卡</th>
												<td>ROG STRIX-GTX1070 GAMING</td>
											</tr>
											<tr>
												<th scope="row">電源</th>
												<td>海韻 Focus SSR-650FM 650W</td>
											</tr>
											<tr>
												<th scope="col">機殼</th>
												<td>賽德斯 荷魯斯</td>
											</tr>
										</tbody>
									</table>							   
									<div class="cta-button mx-auto pb-3">
										<button class="package_btn" data-sids="13,47,97,134,167,199,210">加入購物車</button>
									</div>
								</div>
							</div>							
						</div>
					</div>
				</div>
				
				<div class="col-12 c-space my-3">
					<div class="row">
						<div class="col-12 col-sm-6">
							<div class="post">
								<div class="profile d-flex">
									<img src="img/7msyuyu.jpg"><span>大魚<br><span class="username">@7msyuyu</span></span>
								</div>
								<div class="p-text">上次在實況上面組了6小時 這是第一次一個人重頭組到底<br>第一次開不了機 我還以為壞了 好忐忑啊! 還好最後弄好了!!! 哈哈<br>用了新電腦配上新螢幕玩吃雞!! 玩得潮爽的~~~~<a href="#">閱讀更多</a>
									<div class="p-img my-3"><img src="img/7msyuyu2.jpg"></div>
								</div>
				
							</div>
						</div>
						<div class="col-12 col-sm-6 list">
							<h4>購買清單<img src="img/dropdown.svg" class="d-md-none d-inline-flex row-reverse" width="15px"></h4>
							<div class="pd-list d-none d-sm-flex flex-wrap justify-content-center">
								<div class="pd d-flex flex-wrap pd-desktop">
									<table class="pd table text-left">
										<tbody>
											<tr>
												<th scope="row">CPU</th>
												<td>Intel i7-8700K</td>
											</tr>
											<tr>
												<th scope="row">主機板</th>
												<td>MSI Gaming Carbon</td>
											</tr>
											<tr>
												<th scope="row">記憶體</th>
												<td>威剛 8G*2 3200</td>
											</tr>
											<tr>
												<th scope="row">硬碟</th>
												<td>威剛XPG SX950 240G</td>
											</tr>
											<tr>
												<th scope="row">顯卡</th>
												<td>MSI GTX 1080ti Gaming 11G</td>
											</tr>
											<tr>
												<th scope="row">電源</th>
												<td>全漢 皇鈦極V 750W 白金牌</td>
											</tr>
											<tr>
												<th scope="col">機殼</th>
												<td>聯立 Alpha 550x</td>
											</tr>
										</tbody>
									</table>							   
									<div class="cta-button mx-auto pb-3">
										<button>加入購物車</button>
									</div>
								</div>
							</div>							
						</div>
					</div>
				</div>
				<div class="col-12 c-space my-3">
					<div class="row">
						<div class="col-12 col-sm-6">
							<div class="post">
								<div class="profile d-flex">
									<img src="img/mita.jpg"><span>Mita<br><span class="username">@mitaliang</span></span>
								</div>
								<div class="p-text">很多人詢問我的吃雞配備，最近組了一台新電腦剛好可以分享給大家參考～ 這次是在 PC Cooker 上購買，他們的客製組裝服務能依需求自動配對適合自己的主機，讓我邊吃雞開實況不卡頓<a href="#">閱讀更多</a>
									<div class="p-img my-3"><img src="img/mita2.jpg"></div>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-6 list">
							<h4>購買清單<img src="img/dropdown.svg" class="d-md-none d-inline-flex row-reverse" width="15px"></h4>
							<div class="pd-list d-none d-sm-flex flex-wrap justify-content-center">
								<div class="pd d-flex flex-wrap pd-desktop">
									<table class="pd table text-left">
										<tbody>
											<tr>
												<th scope="row">CPU</th>
												<td>Intel i3-7100</td>
											</tr>
											<tr>
												<th scope="row">主機板</th>
												<td>微星 B250M PRO-VDH</td>
											</tr>
											<tr>
												<th scope="row">記憶體</th>
												<td>金士頓 8G DDR4</td>
											</tr>
											<tr>
												<th scope="row">硬碟</th>
												<td>Toshiba 1TB</td>
											</tr>
											<tr>
												<th scope="row">顯卡</th>
												<td>微星 GTX1050Ti 4GT</td>
											</tr>
											<tr>
												<th scope="row">電源</th>
												<td>台達500W</td>
											</tr>
											<tr>
												<th scope="col">機殼</th>
												<td>全漢 CMT230</td>
											</tr>
										</tbody>
									</table>							   
									<div class="cta-button mx-auto pb-3">
										<button>加入購物車</button>
									</div>
								</div>
							</div>							
						</div>
					</div>
				</div>

				<!-- 新增的用戶評論 -->
				<div class="col-12 c-space my-3">
					<div class="row">
						<div class="col-12 col-sm-6">
							<div class="post">
								<div class="profile d-flex">
									<img src="img/blusewilly_retry.jpg"><span>餐餐自由配<br><span class="username">@blusewilly_retry</span></span>
								</div>
								<div class="p-text">廠商找我工商，受不了，只好開個了，廠商說這裡要記得PO文，想打遊戲看我這台下面的簡介就是了，旁邊購物車按下去就對了。<a href="#">閱讀更多</a>
									<div class="p-img my-3"><img src="img/blusewilly_retry2.jpg"></div>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-6 list">
							<h4>購買清單<img src="img/dropdown.svg" class="d-md-none d-inline-flex row-reverse" width="15px"></h4>
							<div class="pd-list d-none d-sm-flex flex-wrap justify-content-center">
								<div class="pd d-flex flex-wrap pd-desktop">
									<table class="pd table text-left">
										<tbody>
											<tr>
												<th scope="row">CPU</th>
												<td>Intel i7-8700</td>
											</tr>
											<tr>
												<th scope="row">主機板</th>
												<td>GIGABYTE B360M D3H</td>
											</tr>
											<tr>
												<th scope="row">記憶體</th>
												<td>金士頓 8G DDR4-2666 x4</td>
											</tr>
											<tr>
												<th scope="row">硬碟</th>
												<td>Toshiba 1TB</td>
											</tr>
											<tr>
												<th scope="row">顯卡</th>
												<td>技嘉 GTX1080 G1 Gaming 8G</td>
											</tr>
											<tr>
												<th scope="row">電源</th>
												<td>Seasonic 650W</td>
											</tr>
											<tr>
												<th scope="col">機殼</th>
												<td>視博通 噬魂者</td>
											</tr>
										</tbody>
									</table>							   
									<div class="cta-button mx-auto pb-3">
										<button>加入購物車</button>
									</div>
								</div>
							</div>							
						</div>
					</div>
				</div>
				
				<div class="col-12 c-space my-3">
					<div class="row">
						<div class="col-12 col-sm-6">
							<div class="post">
								<div class="profile d-flex">
									<img src="img/godJJ.jpg"><span>接接<br><span class="username">@godjj</span></span>
								</div>
								<div class="p-text">大家好，我是GodJJ，曾於AZB TPS擔任隊長以及在HKE、LD等隊伍擔任AD，現在是魔競旗下的實況主。目前會每天開台跟大家見面，請大家多多支持。<a href="#">閱讀更多</a>
									<div class="p-img my-3"><img src="img/godjj2.jpg"></div>
								</div>
				
							</div>
						</div>
						<div class="col-12 col-sm-6 list">
							<h4>購買清單<img src="img/dropdown.svg" class="d-md-none d-inline-flex row-reverse" width="15px"></h4>
							<div class="pd-list d-none d-sm-flex flex-wrap justify-content-center">
								<div class="pd d-flex flex-wrap pd-desktop">
									<table class="pd table text-left">
										<tbody>
											<tr>
												<th scope="row">CPU</th>
												<td>Intel i3-7100</td>
											</tr>
											<tr>
												<th scope="row">主機板</th>
												<td>微星 B250M PRO-VDH</td>
											</tr>
											<tr>
												<th scope="row">記憶體</th>
												<td>金士頓 8G DDR4</td>
											</tr>
											<tr>
												<th scope="row">硬碟</th>
												<td>Toshiba 1TB</td>
											</tr>
											<tr>
												<th scope="row">顯卡</th>
												<td>微星 GTX1050Ti 4GT</td>
											</tr>
											<tr>
												<th scope="row">電源</th>
												<td>海韻 Focus SSR-650FM 650W</td>
											</tr>
											<tr>
												<th scope="col">機殼</th>
												<td>AIGO T400</td>
											</tr>
										</tbody>
									</table>							   
									<div class="cta-button mx-auto pb-3">
										<button>加入購物車</button>
									</div>
								</div>
							</div>							
						</div>
					</div>
				</div>
				<div class="col-12 c-space my-3">
					<div class="row">
						<div class="col-12 col-sm-6">
							<div class="post">
								<div class="profile d-flex">
									<img src="img/ShinaChen.jpg"><span>陳品妡<br><span class="username">@ShinaChen</span></span>
								</div>
								<div class="p-text"><span class="fakelink">@葉宗翰 @翁偉豪 @林婉婷 @劉序泰</span><br>快來陪我打<a href="#">閱讀更多</a>
									<div class="p-img my-3"><img src="img/ShinaChen2.jpg"></div>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-6 list">
							<h4>購買清單<img src="img/dropdown.svg" class="d-md-none d-inline-flex row-reverse" width="15px"></h4>
							<div class="pd-list d-none d-sm-flex flex-wrap justify-content-center">
								<div class="pd d-flex flex-wrap pd-desktop">
									<table class="pd table text-left">
										<tbody>
											<tr>
												<th scope="row">CPU</th>
												<td>Intel i7-8700</td>
											</tr>
											<tr>
												<th scope="row">主機板</th>
												<td>GIGABYTE B360 HD3</td>
											</tr>
											<tr>
												<th scope="row">記憶體</th>
												<td>ADATA 8G 2400MHz</td>
											</tr>
											<tr>
												<th scope="row">硬碟</th>
												<td>WD Blue 250G</td>
											</tr>
											<tr>
												<th scope="row">顯卡</th>
												<td>技嘉 GTX1070 G1 Gaming 8G</td>
											</tr>
											<tr>
												<th scope="row">電源</th>
												<td>海韻 Focus SSR-750FM 750W</td>
											</tr>
											<tr>
												<th scope="col">機殼</th>
												<td>BitFenix Enso TG</td>
											</tr>
										</tbody>
									</table>							   
									<div class="cta-button mx-auto pb-3">
										<button class="package_btn" data-sids="15,46,101,137,171,200,204">加入購物車</button>
									</div>
								</div>
							</div>							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- pagination -->
	<ul class="pagination justify-content-center d-md-flex d-none">
	    <li class="page-item disabled">
	      <a class="page-link" href="#" tabindex="-1">上一頁</a>
	    </li>
	    <li class="page-item"><a class="page-link" href="#">1</a></li>
	    <li class="page-item"><a class="page-link" href="#">2</a></li>
	    <li class="page-item"><a class="page-link" href="#">3</a></li>
	    <li class="page-item">
	      <a class="page-link" href="#">下一頁</a>
	    </li>
  	</ul>
	

		<!-- 投稿欄位 -->

		<!-- 未登入狀態 -->
		<div class="container-fluid unLogin py-4">
			<div class="container">
				<div class="caption">
					<p>喔喔！看來你還沒登入喔！登入即可投稿與留言！</p>
					<button class="loginNow"><a href="login.php">立即登入</a></button>
				</div>
			</div>
		</div>





	<!-- footer -->
<?php include __DIR__ . '/__footer.php' ?> 

	<!-- 回到頂端 -->
	<div class="toTop d-md-none">
		<button class="circle">
			<img src="img/up.svg">
		</button>
	</div>


	<script type="text/javascript">
		 // 購買清單下拉選單
		$('.list > h4').click(function(){
			$(this).next('div.pd-list').toggleClass('d-none');
			$('.list > h4 > img').toggleClass('dpn');
		});
		
		// 手機版才會有的「回到頂端」
		if ($('.circle').length) {
                var scrollTrigger = 1000,
                    backToTop = function () {
                        var scrollTop = $(window).scrollTop();
                        if (scrollTop > scrollTrigger) {
                            $('.circle').addClass('show');
                        } else {
                            $('.circle').removeClass('show');
                        }
                    };
                backToTop();
                $(window).on('scroll', function () {
                    backToTop();
                });
                $('.circle').on('click', function (e) {
                    e.preventDefault();
                    $('html, body').animate({
                        scrollTop: 0
                    }, 500);
                });
        };

	</script>
	<!-- sweet alert -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script>
	     $('.cta-button').click(function(){
	         swal({
	            title: "商品已成功加入購物車",
	            text: false,
	            icon: "success",
	            timer: 1500, 
	            button: false,
	        });
	     });
	     $('.package_btn').click(function(){
             var sids = $(this).attr('data-sids');
	         $.get('add_to_cart2.php',{sids:sids},function(data){
             });
         })
	</script>
<?php include __DIR__ . '/__html_foot.php' ?>