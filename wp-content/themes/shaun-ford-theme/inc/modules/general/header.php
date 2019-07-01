<?php $contact = new Cltvo_Page_Contact ?>
<div class="navbar is-transparent is-fixed nav-down">
	<div class="grid__container">
		<div class="navbar-brand">
			<a class="navbar-item" href="<?php echo BLOGURL ?>">
				<img src="<?php echo THEMEURL ?>images/logo.svg" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
			</a>
			<div class="navbar-burger burger" data-target="navMenubd-example">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>
		<div id="navMenubd-example" class="navbar-menu">
			<nav class="navbar-start">
				<a class="navbar-item <?php if(is_active('services')): ?>is-active<?php endif ?>" href="<?php echo specialPagePermalink('services') ?>">Services</a>
				<a class="navbar-item <?php if(is_active('showroom')): ?>is-active<?php endif ?>" href="<?php echo specialPagePermalink('showroom') ?>">Showroom</a>
				<a class="navbar-item <?php if(is_active('products')): ?>is-active<?php endif ?>" href="<?php echo specialPagePermalink('products') ?>">Products</a>
				<a class="navbar-item <?php if(is_active('projects')): ?>is-active<?php endif ?>" href="<?php echo specialPagePermalink('projects') ?>">Projects</a>
				<a class="navbar-item <?php if(is_active('contact')): ?>is-active<?php endif ?>" href="<?php echo specialPagePermalink('contact') ?>">Contact</a>
			</nav>
			<nav class="navbar-end">
				<a class="navbar-item" href="<?php echo specialPagePermalink('journal') ?>">Journal</a>
				<a class="navbar-item <?php if(is_active('careers')): ?>is-active<?php endif ?>" href="<?php echo specialPagePermalink('careers') ?>">Careers</a>
				<a class="navbar-item" href="<?php echo $contact->social_net['facebook']['link'] ?>" target="_blank">Facebook</a>
				<a class="navbar-item instagram_JS">Instagram</a>
			</nav>
		</div>
	</div>
</div>