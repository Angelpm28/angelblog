<?php
//check
if ( empty( $skills ) )return;

    //default arrguments.
    $atts = array(
        'callback' => array($this, 'skill_item_generator'),
        'column_class' => 'skillsArea',
        'row_class' => 'row',
        'columns' => $columns, 
    );
    
echo $before_widget;

    echo  spyropress_column_generator( $atts, $skills ) ;

echo $after_widget;
?>