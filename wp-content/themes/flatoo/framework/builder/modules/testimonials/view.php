<div class="testimonial-item">
    <?php if( $image ) echo '<img src="' . $image . '" alt="" class="float-left">'; ?>
	<div class="arrow"></div>
	<div class="text">
		<?php echo $content; ?>
	</div>
	<div class="name">
		<strong><?php echo $author; ?></strong>
        <?php if( $website ) echo ', ' . $website; ?>
	</div>
</div>