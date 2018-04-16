<?php
// Filters
$instance = spyropress_clean_array( $instance );
$filters = '';
$filter = ( isset( $instance['settings'] ) && in_array( 'filters', $instance['settings'] ) ) ? true : false;

if ( $filter ) {
    $terms = get_terms('portfolio_category');
    $filters .= '<ul><li><a href="#" data-filter="*" class="current">'. $all .'</a></li>';
    foreach ($terms as $term) {
        $filters .= '<li><a href="#" data-filter=".' . $term->slug . '">' . $term->name .'</a></li>';
    }
    $filters .= '</ul>';
}
$tmpl = '';
if ( !empty( $filters ) )
    $tmpl .= '<div class="portfolioFilter">' . $filters .'</div>';


    $tmpl .= '<ul class="portfolioContainer row">
                    {content}
              </ul>';

echo $before_widget;

echo $this->query( $instance, $tmpl );

echo $after_widget;

?>