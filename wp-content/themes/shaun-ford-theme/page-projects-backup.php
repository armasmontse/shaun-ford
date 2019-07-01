<?php $page_projects = new Cltvo_Page_Projects; ?>

<?php get_header(); ?>

	<section class="projects">
		<div class="grid__row">
			<div class="grid__container--fluid">
				<div class="projects__hero"> <!-- Contenedor que permite que la pantalla se ponga al 100% -->
					
					<div class="projects__slider-container">
						
						<div class="projects__content-wrapper">
							<div class="grid__row">
								<div class="grid__container projects__zoom-container">
									<p><button class="myImg projects__zoom-button open_JS" data-target=".projects__modal">view full image</button></p>
								</div>
							</div>
						</div>

						<div class="projects__slider-wrapper">
							<div class="grid__row--fullscreen">
								<div class="grid__container--fluid" style="height: 100%;">
									<div class="slick-wrapper">
										<?php foreach ($page_projects->projects as $project): ?>
											<?php if (!empty($project->thumbail_img)): ?>
											<div class="background-image--center projects__slide" style="background-image: url('<?php echo $project->thumbail_img->src ?>');">
												<div class="projects__layer"></div>
												<div class="grid__row--fullscreen">
													<div class="grid__container projects__slide-container">
														<div class="grid__col-1-1 projects__slide-content">
															<h2 class="projects__slide-title"><?php echo $project->post->post_title ?></h2>
														</div>
													</div>
												</div>
											</div>
											<?php endif ?>
										<?php endforeach ?>
									</div>
								</div>
							</div>
						</div>

						<div class="projects__thumbs-wrapper">
							<div class="grid__row">
								<div class="grid__container--fluid">
									<div class="projects__gallery-dots slick-dots-wrapper"></div>
									<div class="projects__gallery-open">
										<button class="projects__gallery-open-button projects__arrow--up open_JS" data-target=".slick-nav, .projects__slide-container" data-open="CLOSE GALLERY" data-close="OPEN GALLERY">
											Open gallery
										</button>
									</div>
									<div class="slick-nav">
										<?php foreach ($page_projects->projects as $project): ?>
											<?php if (!empty($project->thumbail_img)): ?>
											<div class="projects__gallery-image">
												<div class="projects__layer"></div>
												<img src="<?php echo $project->thumbail_img->src_medium ?>" alt="">
											</div>
											<?php endif ?>
										<?php endforeach ?>
									</div>
								</div>
							</div>
						</div>

						<button class="slick-prev slick-arrow" aria-label="Previous" type="button"></button>
						<button class="slick-next slick-arrow" aria-label="Next" type="button"></button>

					</div>

					<!-- The Modal -->
					<div id="myModal" class="projects__modal">

						<!-- The Close-modal Button -->
						<button class="projects__modal-close open_JS" data-target=".projects__modal">&times; close</button>

						<!-- Modal Content (The Image) -->
						<div class="projects__modal-content">
							<div class="slick-test">
								<?php foreach ($page_projects->projects as $project): ?>
									<?php if (!empty($project->thumbail_img)): ?>
									<div style="height: 100%;display: flex; align-content: center;">
										<img src="<?php echo $project->thumbail_img->src_large ?>" style="margin: auto; display: block; height: auto; width: auto; max-width: 700px; max-height: 100%;" alt="">
									</div>
									<?php endif ?>
								<?php endforeach ?>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>