<?php



/**

 * SpyroPress Dashboard

 *
 * Dashboard contains Latest News, Theme Info, Lates Tweets, etc.
 *
 */

global $spyropress;
?>

<div class="wrap spyropress-wrap">
	
    <?php get_spyropress_badge(); ?>
    <h1><?php echo $spyropress->theme_name.' '.__( 'Dashboard', 'spyropress' ); ?></h1>
    <div class="teaser-text">

		<?php _e( 'Thank you for using ThemeSquared. ThemeSquared will improve your overall web publishing experience.', 'spyropress' ); ?>

	</div>
	<div class="clear"></div>
	<div id="dashboard-widgets" class="metabox-holder columns-2">
		<div id="postbox-container-1" class="postbox-container">
			<div id="dashboard_theme_info" class="postbox">
				<h3 class="hndle">
                    <?php _e( 'Theme Info', 'spyropress'); ?>
				</h3>
				<div class="inside">
					<ul>
						<li>
							<?php _e( 'Framework Version:', 'spyropress'); ?>
							<strong>
								<?php echo spyropress_get_version(); ?>
							</strong>
						</li>
                        <li>
							<?php _e( 'Product Version:', 'spyropress'); ?>
							<strong>
								<?php echo $spyropress->theme_version; ?>
							</strong>
						</li>
						<li>
							<?php _e( 'Product Support:', 'spyropress'); ?>
							<?php get_support_forum_link(); ?>
						</li>
					</ul>
					<br class="clear"/>
				</div>
			</div>
		</div>
		<div id="postbox-container-2" class="postbox-container">
			<div id="dashboard_spyropress_changelog" class="postbox">
				<h3 class="hndle">
					<?php _e( 'Theme Changelog', 'spyropress'); ?>
				</h3>
				<div class="inside">
					<?php $theme_log = spyropress_get_theme_changelog(); if ( !empty( $theme_log ) ) echo $theme_log->changelog; ?>
<p><b>Version 2.1.1</b></br>
                            	&nbsp;&nbsp;&nbsp;<b>Bug Removed</b><br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- (Google Map not working issue Fix)<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- (Portfolio Compatible with WordPress 4.4 issue Fix)<br />
                        </p>
                        <hr />

<p><b>Version 2.1.0</b></br>
                            	&nbsp;&nbsp;&nbsp;<b>Feature Added</b><br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- (Video Open in LightBox in Portfolio Added)<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- (Fontawesome Social Icon Added)<br />
                        </p>
                        <hr />

<p><b>Version 2.0.9</b></br>
                            	&nbsp;&nbsp;&nbsp;<b>Bug Removed</b><br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- (Added Translation for Word "All" in Portfolio Filter)<br />
                        </p>
                        <hr /> 

<p><b>Version 2.0.8</b></br>
                            	&nbsp;&nbsp;&nbsp;<b>Bug Removed</b><br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- (Top Bar Disable issue Fix)<br />
                        </p>
                        <hr /> 

<p><b>Version 2.0.7</b></br>
                            	&nbsp;&nbsp;&nbsp;<b>Bug Removed</b><br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- (WordPress 4.3 compatibility issue Fix)<br />
                        </p>
                        <hr />
 
 <p><b>Version 2.0.6</b></br>
                            	&nbsp;&nbsp;&nbsp;<b>Bug Removed</b><br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- (TMG Plugin issue Fix Again)<br />

</p>
                        <hr />
						
							   <p><b>Version 2.0.5</b></br>
                            	&nbsp;&nbsp;&nbsp;<b>Bug Removed</b><br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- (TMG Plugin issue Fix)<br />

</p>
                        <hr />
                                <p><b>Version 2.0.4</b></br>
                            	&nbsp;&nbsp;&nbsp;<b>Bug Removed</b><br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- ( Skill not loading until mouse move issue Fix )<br />
                                &nbsp;&nbsp;&nbsp;<b>New Feature Added</b><br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- ( Enable/Disable Related Portfolio Link in New Window option in Theme Option. )</br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- ( Enable/Disable Potfolio Link Icon Option from portfolio. )</br>
                        </p>
                        <hr />


                                <p><b>Version 2.0.3</b></br>
                            	&nbsp;&nbsp;&nbsp;<b>Bug Removed</b><br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- ( Custom Css issue Fix )<br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- ( Header Style 1 JS issue fix )<br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- ( WordPress Customization issue Fix )<br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- ( Portfolio Category Archive Page Fix )<br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- ( Google Analytic issue Fix )<br />
                                &nbsp;&nbsp;&nbsp;<b>New Feature Added</b><br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- ( Enable/Disable Portfolio Link in New Window option in Theme Option. )</br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- ( Enable/Disable Lightbox Option from portfolio. )</br>
                        </p>
                        <hr />
                        <p><b>Version 2.0.2</b></br>
                            	&nbsp;&nbsp;&nbsp;<b>Bug Removed</b><br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- ( Shortcode useless Button removed )</p><hr />
                        <p><b>Version 2.0.1</b></br>
                            	&nbsp;&nbsp;&nbsp;<b>Bug Removed</b><br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- ( Child theme issue fix )</p><hr />
                        <p><b>Version 2.0.0</b></br>
                            	&nbsp;&nbsp;&nbsp;<b>Bug Removed</b></br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- (Fix Related Portfolio bug opening same project )</br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- (About me builder button bug fix ) </br>
                                &nbsp;&nbsp;&nbsp;<b>New Feature Added</b></br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- (Portfolio Listing background changed )</br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- (Mouse Zooming enable/disable option added in Google Map Marker Module )</br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- (Translation added for Portfolio )<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- (Launch Project button setting added )<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- (Breadcrumb added for porfolio single )<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- (Header style setting added in page options )
                                
                        </p><hr/>
                        
                        <p><b>Version 1.0.1</b></br>
                            	&nbsp;&nbsp;&nbsp;<b>Bug Removed</b></br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- ( Footer social icon link bug fixed )<br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- ( Skill animation bug fixed )
                        </p><hr/>
                        <p><b>Initial Version 1.0.0</b>
                        </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- (<b>Theme Released</b> )
				        </p><br class="clear"/>
				</div>
			</div>
		</div>
		<div class="clear">
		</div>
	</div>
</div>