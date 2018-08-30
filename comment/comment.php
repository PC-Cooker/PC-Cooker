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
					<h1>用戶評論</h1>
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
												<th scope="col">機殼</th>
												<td>全漢 CMT230</td>
											</tr>
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
												<td>ASUS ROG STRIX-GTX1070-O8G-GAMING</td>
											</tr>
											<tr>
												<th scope="row">電源</th>
												<td>台達500W</td>
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
									<img src="img/user.svg"><span>爾尼翰<br><span class="username">@erniehan1024</span></span>
								</div>
								<div class="p-text">買ROG STRIX 系列指定顯示卡，登錄送限量「Steam美金20點」，活動期間買ROG STRIX 顯示卡，登錄送限量「Steam 美金20點」ROG STRIX顯卡玩家必備電競首選。<a href="#">閱讀更多</a>
									<div class="p-img my-3"><img src="img/userpost2.jpg"></div>
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
												<th scope="col">機殼</th>
												<td>全漢 CMT230</td>
											</tr>
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
									<div class="p-img my-3"><img src="img/gaming.png"></div>
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
												<th scope="col">機殼</th>
												<td>全漢 CMT230</td>
											</tr>
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
												<th scope="col">機殼</th>
												<td>全漢 CMT230</td>
											</tr>
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
									<img src="img/user.svg"><span>爾尼翰<br><span class="username">@erniehan1024</span></span>
								</div>
								<div class="p-text">買ROG STRIX 系列指定顯示卡，登錄送限量「Steam美金20點」，活動期間買ROG STRIX 顯示卡，登錄送限量「Steam 美金20點」ROG STRIX顯卡玩家必備電競首選。<a href="#">閱讀更多</a>
									<div class="p-img my-3"><img src="img/userpost2.jpg"></div>
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
												<th scope="col">機殼</th>
												<td>全漢 CMT230</td>
											</tr>
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
									<div class="p-img my-3"><img src="img/gaming.png"></div>
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
												<th scope="col">機殼</th>
												<td>全漢 CMT230</td>
											</tr>
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
					<button class="loginNow">立即登入</button>
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
<?php include __DIR__ . '/__html_foot.php' ?>