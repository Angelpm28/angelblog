<div class="row">
	<div class="span4">
		<?php spyropress_logo(); ?>
	</div>
	<!-- end span4 -->
	<div class="span8">
		<?php if ( get_setting( 'bnb_enable', false ) ) { ?>
        <a href="<?php echo get_setting( 'bnb_link' ); ?>" class="button icon-right fr top-cta"><?php echo get_setting( 'bnb_text' ); ?> <i class="icon-chevron-right"></i></a>
        <?php } ?>
        <ul class="header-information">
			<?php if ( get_setting( 'ph_enable', false ) ) { ?>
            <li class="phone-info">
				<p>
					<?php echo get_setting( 'ph_label' ); ?>
				</p>
				<p>
					<strong>
						<?php echo get_setting( 'ph_number' ); ?>
					</strong>
				</p>
			</li>
            <?php } ?>
            <?php if ( get_setting( 'email_enable', false ) ) { ?>
			<li class="email-info">
				<p>
					<?php echo get_setting( 'email_label' ); ?>
				</p>
				<p>
					<a href="<?php echo get_setting( 'email_address' ); ?>"><?php echo get_setting( 'email_address' ); ?></a>
				</p>
			</li>
            <?php } ?>
		</ul>
	</div>
	<!-- end span8 -->
</div>
<!-- end row -->