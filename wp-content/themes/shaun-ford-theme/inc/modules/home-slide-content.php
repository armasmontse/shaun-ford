<div class="home__layer"></div>
<div class="grid__row--fullscreen home__row">
	<div class="home__container" style="align-items: flex-end;">
		<div class="home__slide-content <?php echo $position ?>">
			<?php if (isset($subtitle) && !empty($subtitle)): ?>
				<span class="home__slide-subtitle"><?php echo $subtitle ?></span>
			<?php endif ?>
			<h2 class="home__slide-title"><?php echo $title ?></h2>
			<div class="home__slide-text">
				<?php echo wpautop($content) ?>
			</div>
			<?php if (isset($target) && !empty($target)): ?>
				<a href="<?php echo $target ?>" class="home__slide-link"><?php echo $link ?></a>
			<?php endif ?>
		</div>
	</div>
</div>