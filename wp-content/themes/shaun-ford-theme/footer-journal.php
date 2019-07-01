		<?php $page_contacto = new Cltvo_Page_Contact ?>
		<div class="alert__box" id="messages-box">
			<div class="grid__container">
				<div class="alert__message" id="messages">
					<!-- Here goes the messages -->
				</div>
			</div>
			<span class="alert__close" id="messages-close">
				x close
			</span>
		</div>
		<footer class="journal__footer" id="newsletter-journal">
			<div class="journal__footer--container">
				<div class="journal__footer--col" id="newsleteer-journal">
					<h5 class="journal__footer--ttl">Suscribe to the journal</h5>
					<form action="" id="register_js" class="journal__footer--newsletter">
						<input type="text" name="register_js[firstname]" placeholder="FIRST NAME" class="journal__footer--newsletter--input left">
						<input type="text" name="register_js[lastname]" placeholder="LAST NAME" class="journal__footer--newsletter--input ">
						<br>
						<input type="text" name="register_js[email]" placeholder="EMAIL" class="journal__footer--newsletter--input left">
						<input type="text" placeholder="CITY" class="journal__footer--newsletter--input">
						<br>	
						<div class="journal__footer--newsletter-contenedor">				
							<select id="" class="journal__footer--newsletter-contenedor--select" >
							    <option value="">Country</option>
							    <option value="">CDMX</option>
							    <option value="">Chihuahua</option>
	  						</select>
							<!--<i class="fa fa-angle-down journal__footer--newsletter-contenedor--icon" aria-hidden="true"></i>-->	  						
							<span class="journal__footer--newsletter-contenedor--icon">V</span>
	  					</div>
						<input type="submit" id="register-submit_js" value="Submit" class="journal__footer--newsletter--submit">
					</form>
				</div>
				<div class="journal__footer--col">
					<h5 class="journal__footer--ttl">Links</h5>
					<ul class="">
						<li class="journal__footer-links"><a class="journal__footer--link" href="<?php echo THEMEURL ?>">Main site</a></li>
						<li class="journal__footer-links"><a class="journal__footer--link" href="<?php echo $page_contacto->social_net['instagram']['link'] ?>" target="_blank">Instagram</a></li>
						<li class="journal__footer-links"><a class="journal__footer--link" href="<?php echo $page_contacto->social_net['facebook']['link'] ?>" target="_blank">Facebook</a></li>
						<li class="journal__footer-links"><a class="journal__footer--link" href="<?php echo specialPagePermalink('careers') ?>">Careers</a></li>
					</ul>
				</div>
				<div class="journal__footer--col">
					<h5 class="journal__footer--ttl">Contact</h5>
					<ul class="journal__footer-address">
						<address class="journal__footer--domicilio">
							<?php echo wpautop($page_contacto->social_net['address']) ?>
						</address>
						<br>
						<li class="journal__footer--domicilio"><a href="mailto:<?php echo $page_contacto->social_net['mail'] ?>"><?php echo $page_contacto->social_net['mail'] ?></a></li>
						<li class="journal__footer--domicilio"><a href="tel:<?php echo $page_contacto->social_net['phone'] ?>"><?php echo $page_contacto->social_net['phone'] ?></a></li>
					</ul>
				</div>
				<div class="journal__footer--col relative">
					<h5 class="journal__footer--ttl back"><a href="" class="bktop">BACK TO TOP</a></h5>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="journal__footer--down">
				<h6>© SHAUN FORD & CO. <?php echo date("Y"); ?></h6>
			</div>
		</footer>

		<?php wp_footer(); ?>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.25/jquery.fancybox.js"></script>
	</body>
</html>