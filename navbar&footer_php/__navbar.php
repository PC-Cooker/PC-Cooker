	<style type="text/css">
		@import url(https://fonts.googleapis.com/earlyaccess/notosanstc.css);
	*{
		padding: 0;
		margin: 0;
	    font-family: 'Noto Sans TC', Arial, sans-serif;
	    list-style: none;
	}

	.container{
		width: 100%;
	}

	button:focus{
		outline: 0;
	}



	/* start of navbar*/
	.navbar{
		background-color: rgba(132, 169, 205, 0.85);
		width: 100%;
		height: 80px;
		padding: 10px 0;
		font-size: 18px;
	}

	.nav-item .nav-link{
		color: #fff;
	}
	.nav-item a{
		font-size:16px;
	}
	button{
		border: none;
		background: transparent;
		cursor: pointer;
		border-radius: 5px;
	}

	.cart, .login{
		padding: 5px 10px;
		transform: scale(0.85);
		position: relative;
		display: block;
	}


		/* 改變預設字體粗度 */
	.navbar-expand-lg .navbar-nav .nav-link{
	    font-weight: 300;
	}

		/* navbar 字體 hover */
	.navbar-expand-lg .navbar-nav li.nav-item{
	    position: relative;
	}

	.navbar-expand-lg .navbar-nav a.nav-link:hover:after {
	    width: 69%;
	}

	a.element:not([href]):not([tabindex]):hover{
		color: #fff;
	}


	 /* 下拉選單 */
	.list-group{
		min-width: 160px;
		top: 43px; /* 位置要設近一點，滑鼠比較容易摸到 */
		right: -33px;
		height: auto;
		color: rgba(0, 0, 0, 0.6);
		position: absolute;
		display: none;
		z-index: 10;
		transition: top 0.3s;
		font-size: 14px;
		line-height: 20px;
		box-shadow: 0px 2px 10px rgba(0,0,0,0.2);
		border-radius: 0.25rem;
	}

	/* 會員下拉選單 */
	button.login .list-group{
		min-width: 150px;
		top: 43px; /* 位置要設近一點，滑鼠比較容易摸到 */
		left: -16px;
		height: auto;
		color: rgba(0, 0, 0, 0.6);
		position: absolute;
		display: none;
		z-index: 10;
		transition: top 0.3s;
		font-size: 14px;
		line-height: 20px;
		box-shadow: 0px 2px 10px rgba(0,0,0,0.2);
		border-radius: 0.25rem;
	}


	li.nav-item .list-group-item{
		padding: 5px 5px 3px 10px;
		border: transparent;
		border-left: 5px solid transparent;
		color: #666;
	}
	button.login > ul.list-group > .list-group-item{
		border: transparent;
	    border-left: 5px solid transparent;
	    color: #666;
		padding: .75rem;
	}

	li.nav-item .list-group-item.active, li.nav-item .list-group-item-action:hover, button.login > ul.list-group > .list-group-item.active, button.login > ul.list-group > .list-group-item:hover{
		background-color: #e5e5e5;
		border-left: 5px solid #fac375;
	}

	.list-group a{
		font-size: 16px;
		font-weight: 400;
	}

	button.login a{
		font-size: 18px;
		font-weight: 400;
	}



	li.nav-item{
		position: relative;
		color: #fff;
	}

	li.nav-item:hover .list-group, a.element:hover .list-group, .list-group:hover, .list-group-item:hover,  button.login:hover ul.list-group, button.login:hover a.list-group-item{
		display: block;
		cursor: pointer;
	}

	.list-group span{
		font-size: 10px;
		color: #9b9b9b;
	}

	 /* 下拉選單end */



	.navbar-expand-lg .navbar-nav a.nav-link:after {
	   	content: '';
	    position: absolute;
	    left: 7px;
	    bottom: -2px;
	    width: 0;
	    height: 2px;
	    border-radius: 5px;
	    background: #eee;
	    transition: width 0.4s cubic-bezier(0.22, 0.61, 0.36, 1);
	}

	.m_navbar{
		position: relative;
	}

	/*手機版時不要出現*/
	.dropMenu{
		width: 100vw;
		min-height: 0;
		height: 0;
		background-color: #84A9CD;
		transition: all .3s;
		position: fixed;
		z-index: 1000;
		overflow: hidden;
	}

	.dropMenu ul{
		width: 100%;
	}
	/* click menu and toggle */
	.dropMenu-collapsed{
		min-height: 100vh;
		transition: all .3s;
		position: fixed;
		overflow: hidden;
	}

	.dropMenu a{
		width: 100%;
		display: block;
		color: #fff;
		font-size: 18px;
		padding: 5px;
		font-weight: 300;
	}
	.dropMenu a:hover, .active2{
		background: #283f4e;
		text-decoration: none;
		border-radius: 5px 5px 0 0;
	}
	.dropMenu li{
		padding: 5px;
	}

	.m_list{
		width: 100%;
		display: flex;
	    flex-direction: row;
	    flex-wrap: wrap;
	    border-radius: 0 0 5px 5px;
	}
	ul.b_list{
		width: 50%;
	}

	.social_icon{
		position: absolute;
		bottom: 50px;
		left: 28%;
		padding: 10px;
	}

	.social_icon img{
		padding: 10px;
	}

	.b_list li{
		padding: 0;
		border-bottom: 1px solid #ccc;
		background: #fff;
		border-right: 1px solid #ccc;
	}
	.b_list li:last-child{
		border-bottom: 0;
	}
	.b_list + .b_list li{
		border-right:0;
	}
	.b_list li a{
		font-size: 16px;
		padding: 4px;
		color: #84A9CD;
	}
	.b_list li a:hover{
		color: #fff;
		border-radius: 0;
	}


	 /* 手機清單的navbar fixed-top雷 */
	.fixed-top-space2{
		height: 70px;
		background-color: #84A9CD;
	}
	/* here's the end of navbar*/




	/* bs4 的雷，Navbar 設 fixed-top 下面文字會被遮住，下面是解法 */
	.fixed-top-space{
		height: 90px;
		background-color: #84A9CD;
	}

	.blue{
		background-color: #84A9CD;
	}

	@media screen and (max-width: 576px)  {
		*{
			overflow-x: hidden;
		}
		.navbar{
			height: 70px;
		}
	}
	</style>

	<!-- navbar -->
	<div class="container-fluid">		
		<nav class="navbar navbar-expand-lg fixed-top d-none d-sm-block">	
			<div class="container pt-2">
				<a class="navbar-brand" href="#"><img src="img/logo_big.svg"></a>
				<ul class="navbar-nav mr-auto">
					<li class="nav-item pr-4">
						<a class="nav-link" href="#">最新活動</a>
					</li>
					<li class="nav-item pr-4">
						<a class="nav-link" href="#">我要組電腦</a>
					</li>
					<li class="nav-item pr-4">
						<a class="nav-link element">我要買零件</a>
						<ul class="list-group">
							<a href="#" class="list-group-item list-group-item-action active">
								中央處理器
								<br>
								<span>Central Processing Unit</span>	
							</a>
							<a href="#" class="list-group-item list-group-item-action">
								主機板
								<br>
								<span>Motherboard</span>
							</a>
							<a href="#" class="list-group-item list-group-item-action">
								顯示卡
								<br>
								<span>Graphics Card</span>
							</a>
							<a href="#" class="list-group-item list-group-item-action">
								記憶體
								<br>
								<span>Random Access Memory</span>
							</a>
							<a href="#" class="list-group-item list-group-item-action">
								內接硬碟
								<br>
								<span>Hard Drive Disk</span>
							</a>
							<a href="#" class="list-group-item list-group-item-action">
								固態硬碟
								<br>
								<span>Solid-Slate Disk</span>
							</a>
							<a href="#" class="list-group-item list-group-item-action">
								機殼
								<br>
								<span>Computer Case</span>
							</a>
							<a href="#" class="list-group-item list-group-item-action">
								電源
								<br>
								<span>Power Supply Unit</span>
							</a>
						</ul>
					</li>
					<li class="nav-item pr-4">
						<a class="nav-link" href="#">用戶評論</a>
					</li>
					<li class="nav-item pr-4">
						<a class="nav-link" href="#">科普小遊戲</a>
					</li>
				</ul>
				<button type="login" class="login"><img src="img/user_icon.svg">
					<ul class="list-group text-left">
							<a href="#" class="list-group-item list-group-item-action active">
								會員資料修改	
							</a>
							<a href="#" class="list-group-item list-group-item-action">
								訂單查詢
							</a>
							<a href="#" class="list-group-item list-group-item-action">
								購物金
							</a>
							<a href="#" class="list-group-item list-group-item-action">
								專屬優惠
							</a>
							<a href="#" class="list-group-item list-group-item-action">
								客服中心
							</a>
						</ul>
				</button>

				<button type="cart" class="cart"><img src="img/shoppingbag_icon.svg"></button>
			</div>
		</nav>
		<!-- 手機版 navbar -->
		<div class="row  d-md-none m_navbar">
			<nav class="navbar navbar-expand-lg fixed-top justify-content-around">
				<button class="m_menu"><img src="img/menu_mobile.svg" alt=""></button>
				<a href="#"><img src="img/logo_mobile.svg" alt=""></a>
				<a href="#"><img src="img/shoppingbag_icon.svg"></a>
			</nav>
			<div class="dropMenu">
				<div class="fixed-top-space2"></div>
				<ul class="text-center">
					<li><a href="#">最新活動</a></li>
					<li><a href="#">我要組電腦</a></li>
					<li class="buy_component"><a href="#">我要買零件 <img src="img/dropdown.svg" alt="" width="12px" class="ml-1"></a>
						<div class="m_list d-md-none d-none flex-wrap flex-row">
							<div class="m_list">
								<ul class="b_list">
									<li><a href="#">中央處理器</a></li>
									<li><a href="#">主機板</a></li>
									<li><a href="#">顯示卡</a></li>
									<li><a href="#">記憶體</a></li>
								</ul>
								<ul class="b_list">
									<li><a href="#">內接硬碟</a></li>
									<li><a href="#">固態硬碟</a></li>
									<li><a href="#">電源供應器</a></li>
									<li><a href="#">機殼</a></li>
								</ul>
							</div>
						</div>
					</li>
					<li><a href="#">用戶評論區</a></li>
					<li><a href="#">科普小遊戲</a></li>
				</ul>
				<div class="social_icon">
					<img src="img/footer_facebook.png" alt="">
					<img src="img/footer_instagram.png" alt="">
					<img src="img/footer_Twitter.png" alt="">
				</div>
			</div>
		</div>
		<!-- 手機版 navbar end -->
	</div>
	<!-- end of navbar -->	


	<!-- bs4 的 雷，Navbar 設 fixed-top 下面文字會被遮住，下面是解法 -->
	<div class="container-fluid blue">
		<div class="fixed-top-space"></div>
	</div>
	<script type="text/javascript">
		// mouseover 第一個active 要 remove 掉
		$('.nav-item > .list-group > a').mouseover(function(){
		  $('.nav-item > .list-group > a:first-child').removeClass('active');		   
		});
		$('.list-group.text-left > a').mouseover(function(){
		  $('.list-group.text-left > a:first-child').removeClass('active');		   
		});

		// 手機版 menu 
        $('.m_menu').click(function(){
        	
        	if ($('.dropMenu').hasClass('dropMenu-collapsed')) {
        		$('.dropMenu').removeClass('dropMenu-collapsed');
        		$('.m_menu > img').attr('src','img/menu_mobile.svg');
        	} 
        	else {
        		$('.dropMenu').addClass('dropMenu-collapsed');
	        	$('.m_menu > img').attr('src','img/clear.svg');
        	}        	      	       	
        });
	</script>
