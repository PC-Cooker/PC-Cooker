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
/* footer */
.black{
	background: url(img/footer_bg.svg)no-repeat center center;
    background-size: cover;
}

footer{
   padding: 30px 0;
   color: #fff;
}

.f-logo{
	margin-top: 9px;
}
footer .nav-link{
	font-size: 12px;
	padding-right: 5rem;
	font-weight: 300;
}

a.f-title{
	font-size: 16px;
	font-weight: 400;
}

footer > p{
	text-align: center;
	color: #fff;
	font-weight: 200;
	font-size: 12px;
	font-family: Arial;
	margin-top:30px;
}

footer > p::before,
footer > p::after{
	transform: translateY(-2px);
	width: 400px;
	content:"";
	height: 1px;
	background-color: #fff;
	display: inline-block;
	margin: 0 30px;
	vertical-align: middle;
}

@media screen and (max-width: 576px)  {
	*{
		overflow-x: hidden;
	}
	/* 響應式 footer 手風琴 */
	.tab {
	  position: relative;
	  margin-bottom: 1px;
	  width: 100%;
	  color: #fff;
	  overflow: hidden;
	}
	input.f-tab {
	  position: absolute;
	  opacity: 0;
	  z-index: -1;
	}
	label.f-tab {
	  position: relative;
	  display: block;
	  padding: 0 0 0 1em;
	  background: #708090;
	  line-height: 3;
	  cursor: pointer;
	  border-bottom: 1px solid #fff;
	}
	.tab-content {
	  max-height: 0;
	  overflow: hidden;
	  background: #708090;
	  -webkit-transition: max-height .35s;
	  -o-transition: max-height .35s;
	  transition: max-height .35s;
	}

	.tab-content ul {
	  margin: 0.5em 1em;
	}
	.tab-content li{
	  line-height: 2;
	  font-weight: 300;
	}
	.tab-content ul li a{
		color: #fff;
	}
	.tab-content ul li a:hover{
		color: #eee;
		text-decoration: none;
	}
	/* :checked */
	input.f-tab:checked ~ .tab-content {
	  max-height: 10em;
	}
	/* Icon */
	label.f-tab::after {
	  position: absolute;
	  right: 0;
	  top: 0;
	  display: block;
	  width: 3em;
	  height: 3em;
	  line-height: 3;
	  text-align: center;
	  -webkit-transition: all .35s;
	  -o-transition: all .35s;
	  transition: all .35s;
	}
    input.f-tab[type=checkbox] + label::after {
	  content: "+";
	}
	input.f-tab[type=radio] + label.f-tab::after {
	  content: "\25BC";
	}
    input.f-tab[type=checkbox]:checked + label.f-tab::after {
	  transform: rotate(315deg);
	}
    input.f-tab[type=radio]:checked + label.f-tab::after {
	  transform: rotateX(180deg);
	}
	/* 響應式手風琴 end */
}
</style>

<!-- footer -->
<div class="container-fluid black">
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-4 d-none d-sm-block">
					<img src="img/logo_footer.svg" class="f-logo">
				</div>
				<div class="col-12 col-sm-8 d-none d-sm-block">
					<nav class="nav">
						<ul class="nav justify-content-center">
							<li class="nav-item"><a class="nav-link f-title" href="#">顧客服務</a>
								<ul>
									<li><a class="nav-link" href="#">配件/軟體加購</a></li>
									<li><a class="nav-link" href="#">保固方式</a></li>
									<li><a class="nav-link" href="#">送貨資訊</a></li>
									<li><a class="nav-link" href="#">退換貨方式</a></li>
								</ul>
							</li>
							<li class="nav-item"><a class="nav-link f-title" href="#">支援服務</a>
								<ul>
									<li><a class="nav-link" href="#">網站導覽</a></li>
									<li><a class="nav-link" href="#">聯絡我們</a></li>
									<li><a class="nav-link" href="#">線上客服</a></li>
									<li><a class="nav-link" href="#">隱私權條款</a></li>
								</ul>
							</li>
							<li class="nav-item"><a class="nav-link f-title" href="#">關於我們</a>
								<ul>
									<li><a class="nav-link" href="#">關於酷客</a></li>
									<li><a class="nav-link" href="#">最新活動</a></li>
									<li><a class="nav-link" href="#">我要組電腦</a></li>
									<li><a class="nav-link" href="#">我要買零件</a></li>
								</ul>
							</li>
						</ul>	
					</nav>	
				</div>
			</div>
		</div>
		<!-- 手機 footer 手風琴 -->
		<div class="container d-md-none">
			<div class="tab">
		        <input id="tab-one" type="checkbox" name="tabs" class="f-tab">
			    <label for="tab-one" class="f-tab">顧客服務</label>
			    <div class="tab-content">
			        <ul>
						<li><a class="" href="#">配件/軟體加購</a></li>
						<li><a class="" href="#">保固方式</a></li>
						<li><a class="" href="#">送貨資訊</a></li>
						<li><a class="" href="#">退換貨方式</a></li>
					</ul>
	      	  	</div>
		    </div>
		    <div class="tab">
		      <input id="tab-two" type="checkbox" name="tabs" class="f-tab">
		      <label for="tab-two" class="f-tab">支援服務</label>
		      <div class="tab-content">
		         <ul>
					<li><a class="" href="#">網站導覽</a></li>
					<li><a class="" href="#">聯絡我們</a></li>
					<li><a class="" href="#">線上客服</a></li>
					<li><a class="" href="#">隱私權條款</a></li>
				 </ul>
		      </div>
		    </div>
		    <div class="tab">
		      <input id="tab-three" type="checkbox" name="tabs" class="f-tab">
		      <label for="tab-three" class="f-tab">關於我們</label>
		      <div class="tab-content">
		         <ul>
					<li><a class="" href="#">關於酷客</a></li>
					<li><a class="" href="#">最新活動</a></li>
					<li><a class="" href="#">我要組電腦</a></li>
					<li><a class="" href="#">我要買零件</a></li>
				 </ul>
		      </div>
		    </div>
		</div>
		<p class="py-3">Copyright © 2018 PC COOKER All rights reserved.</p>	
	</footer>
</div>
