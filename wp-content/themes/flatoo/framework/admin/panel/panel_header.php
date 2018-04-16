<?php global $spyropress; ?>
<!-- panel-header -->
<div class="panel-header">
	<div class="panel-logo pull-left">
		<a href="<?php echo get_company_link(); ?>"></a>
	</div>
	<div class="panel-info pull-right">
		<div class="info theme">
			<?php echo $spyropress->theme_name.' '.$spyropress->theme_version; ?>
		</div>
		<div class="info framework">
			Framework <?php esc_html_e( $spyropress->version ); ?>
		</div>
	</div>
	<div class="clear"></div>
</div>
<!-- /panel-header -->
<!-- panel-toolbar-top -->
<div class="panel-footer panel-fixed" id="panel-fixed-toolbar">
    <input type="submit" value="<?php esc_attr_e( 'Reset All Options', 'spyropress' ); ?>" class="button-red pull-left reset-options"/>
	<input type="submit" value="<?php esc_attr_e( 'Save All Changes', 'spyropress' ); ?>" class="button-green pull-right save-options"/>
	<div class="clear"></div>
</div>
<!-- /panel-toolbar-top -->