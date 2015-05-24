<?php
$top_offset	=	'';
if( is_user_logged_in() )
{
	$top_offset = 'top-offset-25';
}
?>

<div class="header">
    <div class="container">
        <div class="logo">
            <a href="index.html"><img src="images/logo.png" alt="Nova"></a>
        </div>
        <div class="menu">
            <a class="toggleMenu" href="#"><img src="images/nav_icon.png" alt="" /> </a>
            <?php
			$defaults = array(
				'theme_location'  => '',
				'menu'            => '',
				'container'       => '',
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => 'nav',
				'menu_id'         => 'nav',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s<div class="clear"></div></ul>',
				'depth'           => 1,
				'walker'          => ''
			);
			
			wp_nav_menu( $defaults );
			?>
            <!--<ul class="nav" id="nav">
                <li class="current"><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="contact.html">Contact</a></li>
                <div class="clear">
                </div>
            </ul>
            -->
        </div>
        <div class="clearfix">
        </div>
    </div>
</div>
