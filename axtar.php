<?php
$con = mysqli_connect('localhost','filmbaxt_beybala','beybala1','filmbaxt_xebermedia') ;
?>
<html lang="az-Az">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Zola">
	<meta name="description" content="Concept Magazine News Blogs">
	<title>Xəbər media</title>
	<!-- Favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.png">
	<!-- Bootstrap 4 -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
	<!-- Swiper Slider -->
	<link rel="stylesheet" href="assets/css/swiper.min.css" type="text/css">
	<!-- Fonts -->
	<link rel="stylesheet" href="assets/fonts/fontawesome/font-awesome.min.css">
	<!-- OWL Carousel -->
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css" type="text/css">
	<link rel="stylesheet" href="assets/css/owl.theme.default.min.css" type="text/css">
	<!-- Animate -->
	<link rel="stylesheet" href="assets/css/animate.min.css" type="text/css">
	<!-- NProgress -->
	<link rel="stylesheet" href="assets/css/nprogress.css" type="text/css">
	<!-- Style -->
	<link rel="stylesheet" href="assets/css/style.css" type="text/css">
</head>

<body>
	<header class="header-01">
		<div class="topbar-01">
			<div class="container">
				<div class="row">
					<div class="left col-6 m-9">
						<div class="searchbar">
							<form action="axtar.php" method="post">
								<input type="text" name="axtar" placeholder="Axtar .." required>
								<button type="submit">
									<img src="assets/images/svg/050-magnifying-glass.svg" alt="Zola">
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<?php
    include "menu.php";
    
    $sec = mysqli_query($con,"SELECT * FROM xeber where (title like '%".$_POST['axtar']."%' or 
    metn like '%".$_POST['axtar']."%') ORDER BY tarix DESC LIMIT 1,4");
    $info = mysqli_fetch_array($sec);
  
    ?>

	<div id="section-slider" class="slider03">
		<!-- Slider Content -->
		<div class="slider-content">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- Item -->
						<?php
                        while($info = mysqli_fetch_array($sec))
                        {
                        $title=mb_substr($info['title'],0,60);
                        ?>
						<div class="thumbnail-1 v1">
							<a href="xeber.php?id=<?=$info['id']?>" title="<?=$info['title']?>">
								<img src="<?=$info['foto']?>" alt="<?=$info['title']?>">
								<div class="overlay">
									<div class="overlay-content">
										<div class="list-users-02">
											<h3 style="font-family: Tahoma, sans-serif;"><?=$title?></h3>
											<div class="like">
												<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
													xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
													viewBox="0 0 481.567 481.567"
													style="enable-background:new 0 0 481.567 481.567;"
													xml:space="preserve">
													<path d="M424.7,55.841c-19.8-15.2-43.3-25-68.1-28.2c-42.6-5.6-84.3,7.4-115.8,35.6c-31.5-28.5-73.4-41.5-116.2-35.8
															c-24.8,3.3-48.4,13.2-68.3,28.6c-35.8,27.9-56.4,69.6-56.3,114.6c0,38.5,15.1,74.8,42.4,102.1l172.9,172.9
															c6.6,6.6,15.2,9.8,23.8,9.8c8.6,0,17.2-3.3,23.8-9.8l26.8-26.8c7-7,7-18.4,0-25.5c-7-7-18.4-7-25.5,0l-25.1,25.1l-171.2-171.3
															c-20.5-20.5-31.8-47.7-31.9-76.7c0-33.7,15.4-65.1,42.4-86.1c14.8-11.5,32.4-18.9,50.9-21.3c34.2-4.5,67.6,6.7,91.7,30.9
															l19.8,19.8l19.6-19.6c24-24.1,57.4-35.3,91.5-30.8c18.5,2.4,36,9.7,50.8,21c28.2,21.7,43.8,54.4,42.8,89.6
															c-0.8,27.7-12.9,54.6-33.9,75.7l-91.2,91.1c-7,7-7,18.4,0,25.5c7,7,18.4,7,25.5,0l91.2-91.2c27.6-27.6,43.4-63.1,44.4-100.1
															C482.9,128.041,462.2,84.641,424.7,55.841z"></path>
												</svg>
												753 Baxış sayı
											</div>
										</div>
									</div>
								</div>
							</a>
						</div>
						<?php
                        }
                        ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
    $sec = mysqli_query($con,"SELECT * FROM xeber where (title like '%".$_POST['axtar']."%' or 
    metn like '%".$_POST['axtar']."%') ORDER BY tarix DESC LIMIT 4,22");
    $info = mysqli_fetch_array($sec);
    ?>
	<div id="section-contents">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="block-title-2">
						<h3>Ən son xəbərlər</h3>
					</div>
				</div>
				<?php
    			while($info = mysqli_fetch_array($sec))
                {
    			?>
				<div class="col-12 col-lg-4">
					<div class="block-style-12">
						<div class="contents">
							<div class="thumbnail-1">
								<span style="font-family: Tahoma, sans-serif;"
									class="bg-yellow"><?=$info['kat']?></span>
								<a href="xeber.php?id=<?=$info['id']?>" title="<?=$info['title']?>">
									<img style="height:250px;" src="<?=$info['foto']?>" alt="<?=$info['title']?>">
								</a>
							</div>
							<div class="content-wrapper">
								<div class="line">
								</div>
								<div class="title">
									<a href="xeber.php?id=<?=$info['id']?>" title="<?=$info['title']?>">
										<?php $title=mb_substr($info['title'],0,60); ?>
										<h2 style="font-family: Tahoma,sans-serif; font-weight:bold;"><?=$title?></h2>
									</a>
								</div>
								<div class="desc">
									<?php $qisaca=mb_substr($info['metn'],0,145); ?>
									<p><?=$qisaca?>...</p>
								</div>
								<!-- /.Description -->
							</div>
							<!-- Content Wrapper -->
							<!-- Peoples 
							<div class="peoples">
								<div class="list-users-04">
				    				<ul class="images">
				    					<li><img src="assets/images/profile_26.jpg" alt="Zola"></li>
				    				</ul>
				    				<p>Dan Woodstrap</p>
			    				</div>
							</div>
		    				Peoples -->
						</div>
						<!-- /.Contents -->
					</div>
				</div>
				<?php
                }
    		    ?>
				<!-- /.Block Style 12 -->
			</div>
			<div class="ts-space70"></div>
			<div class="block-style-7">
				<a href="#"><img class="img-fluid" src="assets/images/ads_07.jpg" alt="Zola"></a>
			</div>

			<?php
            $sec = mysqli_query($con,"SELECT * FROM xeber where (title like '%".$_POST['axtar']."%' or 
            metn like '%".$_POST['axtar']."%') ORDER BY tarix DESC LIMIT 25,22");
            $info = mysqli_fetch_array($sec);
            ?>
			<div class="ts-space100"></div>
			<div class="row">
				<!-- Block Style 12 -->
				<?php
                while($info = mysqli_fetch_array($sec))
                {
                ?>
				<div class="col-12 col-lg-4">
					<div class="block-style-12">
						<div class="contents">
							<div class="thumbnail-1">
								<span style="font-family: Tahoma,sans-serif;" class="bg-yellow"><?=$info['kat']?></span>
								<a href="xeber.php?id=<?=$info['id']?>" title="<?=$info['title']?>">
									<img style="height:250px;" src="<?=$info['foto']?>" alt="<?=$info['title']?>">
								</a>
							</div>
							<div class="content-wrapper">
								<div class="line"></div>
								<div class="title">
									<a href="xeber.php?id=<?=$info['id']?>" title="<?=$info['title']?>">
										<?php $title=mb_substr($info['title'],0,60); ?>
										<h2 style="font-family: Tahoma,sans-serif; font-weight:bold;"><?=$title?></h2>
									</a>
								</div>
								<div class="desc">
									<?php $metn=mb_substr($info['metn'],0,145); ?>
									<p><?=$metn?>...</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
                }
                ?>
				<div class="ts-space20"></div>
				<div class="col-12">
					<div class="load-more-btn">
						<a class="btn" href="#">Daha çox</a>
					</div>
				</div>
				<div class="ts-space30"></div>
			</div>
		</div>
	</div>
	<div id="section-footer" class="footer-04">
		<div class="container">
			<div class="row">
				<div class="ft-column col-12">
					<div class="logo">
						<a href="#"><img src="assets/images/footer_logo.png" alt="Zola"></a>
					</div>
					<p>Bizi həmçinin sosial şəbəklərdən izləyə bilərsiniz.Azərbaycanın xəbər portalı</p>
					<ul class="ft_social_links">
						<li><a href="#"><i class="fa fa-facebook fa-lg"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter fa-lg"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram fa-lg"></i></a></li>
						<li><a href="#"><i class="fa fa-slack fa-lg"></i></a></li>
						<li><a href="#"><i class="fa fa-snapchat-ghost fa-lg"></i></a></li>
					</ul>
				</div>
				<div class="ft_backtotop">
					<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
						xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="611.98px" height="611.98px"
						viewBox="0 0 611.98 611.98" style="enable-background:new 0 0 611.98 611.98;"
						xml:space="preserve">
						<g>
							<g id="Rocket">
								<g>
									<path d="M85.311,478.813c-21.604,0-39.875,14.307-45.832,33.957l-20.799,68.585c-0.268,0.881-0.402,1.82-0.402,2.797
				c0,5.286,4.29,9.576,9.576,9.576c0.977,0,1.916-0.153,2.796-0.402l68.585-20.8c19.65-5.956,33.957-24.228,33.957-45.832
				C133.192,500.245,111.76,478.813,85.311,478.813z M583.277,0c-103.291,0-202.961,4.501-286.81,59.104
				c-44.204,28.786-80.919,69.083-110.548,114.13c-71.688,4.386-138.416,40.699-180.57,99.785
				c-5.746,8.063-6.934,18.521-3.16,27.656c3.773,9.155,11.989,15.686,21.757,17.352c25.818,4.348,54.413,15.936,83.275,33
				c-5.209,19.114-9.461,37.673-12.468,55.045c-1.609,9.192,1.379,18.635,7.987,25.224l77.932,77.912
				c5.439,5.439,12.755,8.408,20.301,8.408c1.647,0,3.275-0.134,4.922-0.422c17.391-3.007,35.949-7.259,55.063-12.468
				c17.065,28.901,28.652,57.496,33.019,83.313c1.647,9.768,8.216,17.965,17.353,21.776c3.543,1.455,7.258,2.164,10.975,2.164
				c5.898,0,11.74-1.819,16.682-5.324c59.066-42.136,95.398-108.882,99.746-180.589c45.047-29.648,85.344-66.345,114.111-110.567
				c54.564-83.793,59.123-187.619,59.123-286.81C612.006,12.851,599.135,0,583.277,0z M63.056,278.382
				c25.319-26.009,57.477-44.146,92.468-52.555c-13.215,25.856-24.381,52.287-33.594,78.334
				C102.088,293.225,82.304,284.434,63.056,278.382z M333.623,548.949c-6.053-19.286-14.844-39.07-25.799-58.894
				c26.066-9.212,52.498-20.378,78.354-33.612C377.77,491.454,359.633,523.649,333.623,548.949z M504.732,284.166
				C445.188,375.619,316.77,436.218,210.568,457.86l-56.462-56.442c21.662-106.22,82.26-234.619,173.694-294.164
				c63.414-41.273,142.801-48.571,226.574-49.643C553.322,141.384,546.006,220.752,504.732,284.166z M410.904,248.983
				c26.449,0,47.881-21.432,47.881-47.881s-21.432-47.881-47.881-47.881s-47.881,21.432-47.881,47.881
				S384.455,248.983,410.904,248.983z" />
								</g>
							</g>
						</g>
					</svg>
				</div>

			</div>
		</div>
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="copyright-wrapper">
							<p>© Müəllif haqları qorunur , <a target="_blank"
									href="http://xebermedia.tk/">Xəbərmedia</a> Azərbaycanın xəbər portalı</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.Section Footer -->

	<!-- Javascript Files -->
	<script src="assets/js/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- Swiper Slider -->
	<script src="assets/js/swiper.min.js"></script>
	<!-- OWL Carousel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- Waypoint -->
	<script src="assets/js/jquery.waypoints.min.js"></script>
	<!-- Easy Waypoint -->
	<script src="assets/js/easy-waypoint-animate.js"></script>
	<!-- Counter -->
	<script src="assets/js/jquery.countup.js"></script>
	<!-- Counter -->
	<script src="assets/js/jquery.countup.js"></script>
	<!-- NProgress -->
	<script src="assets/js/nprogress.js"></script>
	<!-- Ticker -->
	<script src="assets/js/jquery.newsTicker.min.js"></script>
	<!-- Scripts -->
	<script src="assets/js/scripts.js"></script>

</body>

</html>