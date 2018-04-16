<?php
$img = ( $icon ) ? '<img src="' . assets_img() . 'features/' . $icon . '" alt="Feature" />' : '';
?>
<div class="feature-item clearfix">
    <?php echo $img; ?>
    <div class="content">
        <h4><?php echo $title; ?></h4>
        <p><?php echo $teaser; ?></p>
    </div>
</div>