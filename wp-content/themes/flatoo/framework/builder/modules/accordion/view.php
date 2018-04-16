<?php

// chcek
if ( empty( $accordions ) ) return;

global $accordion_ids;
$count = 0;
$content = '';
++$accordion_ids;

foreach( $accordions as $tab ) {
    ++$count;
    $active = ( $count == 1 ) ? ' in' : '';
    
    // content
    if( isset( $tab['bucket'] ) ) {
        $args = array(
            'post_type' => 'bucket',
            'p' => $tab['bucket']
        );
        $query = new WP_Query( $args );
        while( $query->have_posts() ) {
            $query->the_post();
            $xcontent = spyropress_get_the_content();
        }
        wp_reset_query();
    }
    else {
        $xcontent = $tab['content'];
    }
    
    $icon = isset( $tab['icon'] ) ? '<span class="sosa">&#x' . $tab['icon'] . ';</span>' : '';
    $content .= '
    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion' . $accordion_ids . '" href="#collapse' . $count . '">' . $icon . $tab['title'] . '</a>
        </div>
        <div id="collapse' . $count . '" class="accordion-body collapse' . $active . '">
            <div class="accordion-inner">' . $xcontent . '</div>
        </div>
    </div>';
}
wp_reset_query();
?>
<div class="accordion no-margin" id="accordion<?php echo $accordion_ids; ?>">
    <?php echo $content; ?>
</div> <!-- end tabbable -->