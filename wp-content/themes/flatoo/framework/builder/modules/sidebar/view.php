<?php

echo $before_widget;
    spyropress_before_sidebar();
    dynamic_sidebar($sidebar);
    spyropress_after_sidebar();
    echo '<div class="clear"></div>';
echo $after_widget;
?>