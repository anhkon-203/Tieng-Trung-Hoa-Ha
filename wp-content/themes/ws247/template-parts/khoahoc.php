<?php
/**
Template Name: Khóa học
 */

get_header();
?>

<main>
	<section class="banner-page page-custom">
		<div class="img-banner-page banner-khoa-hoc">
			<img class="w-100" src="<?php the_field('t1_img') ?>" alt="<?php the_title() ?>">
		</div>
		<div class="text-banner">
			<div class="container h-100">
				<div class="row h-100">
					<div class="col-md-12 h-100">
						<div class="title-khoa-hoc">
							<?php if(have_rows('t1_title')){ ?>
								<?php while(have_rows('t1_title')): the_row() ?>
									<h3><?php the_sub_field('title_1') ?></h3>
									<h1><?php the_sub_field('title_2') ?></h1>
								<?php endwhile; ?>
							<?php } ?>
							<p><?php the_field('t1_mota') ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="main-list-icon">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php if(have_rows('k2_re')){ ?>
						<div class="list-icon">
							<?php while(have_rows('k2_re')): the_row() ?>
								<div class="col-lg-3 col-md-6 col-custom">
									<div class="box-list-icon wow fadeInDown" data-wow-delay=".5s" data-wow-duration="1s">
										<div class="img-top">
											<img src="<?php the_sub_field('icon') ?>" alt="<?php the_title() ?>">
										</div>
										<p><?php the_sub_field('text') ?></p>
									</div>
								</div>
							<?php endwhile ?>
						</div>
					<?php } ?>
					<div class="content-list">
						<div class="title-content">
							<h2 class="wow fadeInDown"data-wow-delay=".25s" data-wow-duration="1s"><?php the_field('k3_title') ?></h2>
							<p class="wow fadeInDown"data-wow-delay=".5s" data-wow-duration="1s"><?php the_field('k3_mota') ?></p>
						</div>
						<?php if(have_rows('k3_re')){ ?>
							<div class="list-number-content">
								<div class="row">
									<?php $i=0 ?>
									<?php while(have_rows('k3_re')): the_row() ?>
										<?php $i++ ?>
										<div class="col-lg-6 col-custom">
											<div class="number-content wow fadeInDown" data-wow-delay=".5s" data-wow-duration="1s">
												<span class="number"><?php echo $i ?></span>
												<p><?php the_sub_field('text') ?></p>
											</div>
										</div>
									<?php endwhile; ?>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="main-teacher" style="background-image: url(<?php the_field('k4_bg') ?>);">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="teacher-left wow fadeInDown" data-wow-delay=".5s" data-wow-duration="1s">
						<?php if(have_rows('k4_title')){ ?>
							<?php while(have_rows('k4_title')): the_row() ?>
								<h2><?php the_sub_field('title_1') ?> <span><?php the_sub_field('title_2') ?></span></h2>
							<?php endwhile; ?>
						<?php } ?>
						<?php if(have_rows('k4_re')){ ?>
							<div class="list-gv-img tab-content">
								<?php $i=0 ?>
								<?php while(have_rows('k4_re')): the_row() ?>
									<?php $i++ ?>
									<div class="img-1 tab-pane fade <?php if($i==2) echo "show active" ?>" id="gv<?php echo $i ?>">
										<img class="w-100" src="<?php the_sub_field('img') ?>" alt="">
									</div>
								<?php endwhile; ?>
								<div class="bg-gv">
									<img class="w-100" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/bg-gv1.png" alt="">
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
				<?php if(have_rows('k4_re')){ ?>
					<div class="col-md-6">
						<div class="list-tab-teacher wow fadeInDown" data-wow-delay=".5s" data-wow-duration="1s">
							<ul class="nav d-block">
								<?php $i=0 ?>
								<?php while(have_rows('k4_re')): the_row() ?>
									<?php $i++ ?>
									<li class="nav-item">
										<a class="nav-link <?php if($i==2) echo "active " ?>" data-toggle="tab" href="#gv<?php echo $i ?>">
											<div><?php the_sub_field('noidung') ?></div>
										</a>
									</li>
								<?php endwhile; ?>
							</ul>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
	<section class="main-tab-responsive">
		<table class="table table-customize table-responsive">
			<thead>
				<tr>
					<th><?php the_field('k5_title_1') ?></th>
					<th><?php the_field('k5_title_2') ?></th>
					<th><?php the_field('k5_title_3') ?></th>
					<th><?php the_field('k5_title_4') ?></th>
					<th><?php the_field('k5_title_5') ?></th>
					<th><?php the_field('k6_title_5') ?></th>
					<th><?php the_field('k6_title_6') ?></th>
					<th><?php the_field('k7_title_6') ?></th>
				</tr>
			</thead>
			<?php if(have_rows('k7_re')){ ?>
				<tbody>
					<?php while(have_rows('k7_re')): the_row() ?>
						<?php $title = get_sub_field('title') ?>
						<?php $i=0 ?>
						<?php $count = count(get_sub_field('re')); ?>
						<?php if(have_rows('re')){ ?>
							<?php while(have_rows('re')): the_row() ?>
								<?php $i++ ?>
								<tr>
									<?php if($i==1){ ?>
										<td data-title="<?php the_field('k5_title_1') ?>" rowspan="<?php echo $count ?>"><?php echo $title ?></td>
									<?php } ?>
									<td data-title="<?php the_field('k5_title_2') ?>"><?php the_sub_field('capdo') ?></td>
									<td data-title="<?php the_field('k5_title_3') ?>"><?php the_sub_field('pointvao') ?></td>
									<td data-title="<?php the_field('k5_title_4') ?>"><?php the_sub_field('pointra') ?></td>
									<td data-title="<?php the_field('k5_title_5') ?>"><?php the_sub_field('time') ?></td>
									<td data-title="<?php the_field('k6_title_5') ?>"><?php the_sub_field('sogio') ?></td>
									<td data-title="<?php the_field('k6_title_6') ?>"><?php the_sub_field('sobuoi') ?></td>
									<td data-title="<?php the_field('k7_title_6') ?>"><?php the_sub_field('tongchiphi') ?></td>
								</tr>
							<?php endwhile ?>
						<?php } ?>
					<?php endwhile; ?>
				</tbody>
			<?php } ?>
		</table>
	</section> 
	<section class="main-nono">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title-nono">
						<?php if(have_rows('k8_tite')){ ?>
							<?php while(have_rows('k8_tite')): the_row() ?>
								<h2 class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="1s"><?php the_sub_field('title_1') ?> <span><?php the_sub_field('title_2') ?></span></h2>
							<?php endwhile; ?>
						<?php } ?>
					</div>
					<?php if(have_rows('k8_re')){ ?>
						<div class="list-sinh-vien">
							<div class="row row-custom">
								<?php while(have_rows('k8_re')): the_row() ?>
									<div class="col-lg-3 col-md-4 col-custom">
										<div class="box-studying wow fadeInDown" data-wow-delay=".5s" data-wow-duration="1s">
											<div class="img-top">
												<a href="javascript:void(0)" title=""><img src="<?php the_sub_field('img') ?>" alt="<?php the_sub_field('name') ?>"></a>
											</div>
											<div class="title-studying">
												<h3><?php the_sub_field('name') ?></h3>
												<p><?php the_sub_field('unvier') ?></p>
												<?php if(have_rows('social')){ ?>
													<ul>
														<?php while(have_rows('social')): the_row() ?>
															<li><a href="<?php the_sub_field('link') ?>"><i class="fa <?php the_sub_field('icon') ?>" aria-hidden="true"></i></a></li>
														<?php endwhile; ?>
													</ul>
												<?php } ?>
												</div>
												<?php if(have_rows('re')){ ?>
													<div class="diem-content">
														<?php while(have_rows('re')): the_row() ?>
															<div class="diem-lt">
																<p><?php the_sub_field('title') ?></p>
																<?php if(have_rows('point')){ ?>
																	<?php while(have_rows('point')): the_row() ?>
																		<h3><?php the_sub_field('name') ?> <span><?php the_sub_field('plk') ?></span></h3>
																	<?php endwhile; ?>
																<?php } ?>
															</div>
														<?php endwhile; ?>
													</div>
												<?php } ?>
											</div>
										</div>
									<?php endwhile; ?>
								</div>
							</div>
						<?php } ?>
						<?php if(have_rows('k8_button')){ ?>
							<?php while(have_rows('k8_button')): the_row() ?>
								<div class="login-a">
									<a href="<?php the_sub_field('link') ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <?php the_sub_field('title') ?></a>
								</div>
							<?php endwhile; ?>
						<?php } ?>
					</div>
				</div>
			</div>
		</section> 
	</main>

	<?php
	get_footer();
