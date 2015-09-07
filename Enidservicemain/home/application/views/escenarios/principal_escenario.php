<style type="text/css">
</style>

<link href="<?=base_url('application/tema/css/style.css')?>" rel="stylesheet" >
<link href="<?=base_url('application/tema/fonts/fontello/css/fontello.css')?>" rel="stylesheet">




					<div class="row">

							<article class="blogpost">
								<div id="carousel-blog-post" class="carousel slide" data-ride="carousel">
									<!-- Indicators -->
									<ol class="carousel-indicators bottom margin-clear">
										<li data-target="#carousel-blog-post" data-slide-to="0" class=""></li>
										<li class="" data-target="#carousel-blog-post" data-slide-to="1"></li>
										<li class="active" data-target="#carousel-blog-post" data-slide-to="2"></li>
									</ol>

									<!-- Wrapper for slides -->
									<div class="carousel-inner" role="listbox">
										<div class="item">
											<div class="overlay-container">
												<img src="<?=base_url('application/uploads/uploads/1/IMG_20150301_194122071.jpg')?>" alt="">
												
												<a class="overlay-link" href="blog-post.html"><i class="fa fa-link"></i></a>
											</div>
										</div>
										<div class="item">
											<div class="overlay-container">
												<img src="<?=base_url('application/uploads/uploads/1/IMG_20150301_195020439.jpg')?>" alt="">
												<a class="overlay-link" href="blog-post.html"><i class="fa fa-link"></i></a>
											</div>
										</div>
										<div class="item active">
											<div class="overlay-container">
												<img src="<?=base_url('application/uploads/uploads/1/IMG_20150301_185446523.jpg')?>" alt="">
												<a class="overlay-link" href="blog-post.html"><i class="fa fa-link"></i></a>
											</div>
										</div>
									</div>
								</div>
								
								
							</article>
							

					</div>















<!---->
<div class='row'>
	<div class="col-md-12">
		<div class='blue-col-enid' style='padding: 15px;'>
		
			<h1 class=""><a href="#"><?=$escenario["nombre"];?></a></h1>
			<h3 class="title" style='color:white;'>Lo que vivirás </h3>	
			<?=$escenario["descripcion"];?>



			
			<div class="pull-right">Escenario <?=$escenario["tipoescenario"];?>    |  <?=$escenario["fecha_presentacion_inicio"]?>  - <?=$escenario["fecha_presentacion_termino"]?> </div> 


		</div>	
	</div>
</div>
					<div class="row">
						<div class="main col-md-8">
							<h1 class="page-title">Artistas</h1>


							<!-- blogpost start -->
							<article class="blogpost">
								<div class="row grid-space-10">
									<div class="col-md-6">
										<div class="audio-wrapper">
											<iframe class="margin-clear" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/106329682&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_artwork=true&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false" height="166"></iframe>
										</div>
									</div>
									<div class="col-md-6">
										<header>
											<h2><a href="blog-post.html">Audio post</a></h2>
											<div class="post-info">
												<span class="post-date">
													<i class="icon-calendar"></i>
													<span class="day">10</span>
													<span class="month">May 2015</span>
												</span>
												<span class="submitted"><i class="icon-user-1"></i> by <a href="#">John Doe</a></span>
												<span class="comments"><i class="icon-chat"></i> <a href="#">22 comments</a></span>
											</div>
										</header>
										<div class="blogpost-content">
											<p>Mauris dolor sapien, malesuada at interdum ut, hendrerit eget lorem. Nunc interdum mi neque, et  sollicitudin purus fermentum ut. Suspendisse faucibus nibh odio, a vehicula eros pharetra in.</p>
										</div>
									</div>
								</div>
								<footer class="clearfix">
									<div class="tags pull-left"><i class="icon-tags"></i> <a href="#">tag 1</a>, <a href="#">tag 2</a>, <a href="#">long tag 3</a></div>
									<div class="link pull-right"><i class="icon-link"></i><a href="#">Read More</a></div>
								</footer>
							</article>
							<!-- blogpost end -->

							<!-- blogpost start -->
							<article class="blogpost">
								<div class="row grid-space-10">
									<div class="col-md-6">
										<div class="overlay-container">
											<img src="images/blog-2.jpg" alt="">
											<a class="overlay-link" href="blog-post.html"><i class="fa fa-link"></i></a>
										</div>
									</div>
									<div class="col-md-6">
										<header>
											<h2><a href="blog-post.html">Cute Robot</a></h2>
											<div class="post-info">
												<span class="post-date">
													<i class="icon-calendar"></i>
													<span class="day">09</span>
													<span class="month">May 2015</span>
												</span>
												<span class="submitted"><i class="icon-user-1"></i> by <a href="#">John Doe</a></span>
												<span class="comments"><i class="icon-chat"></i> <a href="#">22 comments</a></span>
											</div>
										</header>
										<div class="blogpost-content">
											<p>Mauris dolor sapien, malesuada at interdum ut, hendrerit eget lorem. Nunc interdum mi neque, et  sollicitudin purus fermentum ut. Suspendisse faucibus nibh odio, a vehicula eros pharetra in. Maecenas  ullamcorper commodo rutrum. In iaculis lectus vel augue eleifend dignissim.</p>
										</div>
									</div>
								</div>
								<footer class="clearfix">
									<div class="tags pull-left"><i class="icon-tags"></i> <a href="#">tag 1</a>, <a href="#">tag 2</a>, <a href="#">long tag 3</a></div>
									<div class="link pull-right"><i class="icon-link"></i><a href="#">Read More</a></div>
								</footer>
							</article>
							<!-- blogpost end -->

							<!-- blogpost start -->
							<article class="blogpost">
								<div class="row grid-space-10">
									<div class="col-md-6">
										<div class="embed-responsive embed-responsive-16by9">
											<iframe class="embed-responsive-item" src="http://www.youtube.com/embed/v1uyQZNg2vE"></iframe>
										</div>
									</div>
									<div class="col-md-6">
										<header>
											<h2><a href="blog-post.html">Blogpost with embedded youtube video</a></h2>
											<div class="post-info">
												<span class="post-date">
													<i class="icon-calendar"></i>
													<span class="day">08</span>
													<span class="month">May 2015</span>
												</span>
												<span class="submitted"><i class="icon-user-1"></i> by <a href="#">John Doe</a></span>
												<span class="comments"><i class="icon-chat"></i> <a href="#">22 comments</a></span>
											</div>
										</header>
										<div class="blogpost-content">
											<p>Mauris dolor sapien, malesuada at interdum ut, hendrerit eget lorem. Nunc interdum mi neque, et  sollicitudin purus fermentum ut. Suspendisse faucibus nibh odio, a vehicula eros pharetra in.</p>
										</div>
									</div>
								</div>
							</article>


							<article>


								<div class='row'>

<div class='col-xs-12  col-sm-12 col-md-12 col-lg-12'>
<table class="table table-colored">
								<thead>
									<tr>
										<th>#</th>
										<th>Nombre</th>
										<th>Inicia</th>
										<th>Termina</th>
									</tr>
								</thead>
								<tbody>
									<?=$artitas;?>
								</tbody>
							</table>
</div>							
<a href="#" class="btn btn-default col-xs-12  col-sm-12 col-md-4 col-lg-4">
	<i class="fa fa-cloud-download"></i>
 lleva contigo el horario</a>	

</div>


							</article>

							<!-- blogpost end -->


							
						</div>
						<!-- main end -->

						<!-- sidebar start -->
						<!-- ================ -->
						<aside class="col-md-4 col-lg-3 col-lg-offset-1">
							<div class="sidebar">
								
								<?=$generos_tags?>
								<div class="block clearfix">
									
									<div class="separator-2"></div>
									<?=$otros_escenarios;?>
									
								</div>
								


								
							</div>
						</aside>
						<!-- sidebar end -->

					</div>
				





















<!--***********************************INICIA SERVICIOS MODAL  *************************-->
  <?php $this->load->view("eventos/modal_config_event_template");?>
<!--***********************************TERMINA SERVICIOS MODAL  *************************-->



	