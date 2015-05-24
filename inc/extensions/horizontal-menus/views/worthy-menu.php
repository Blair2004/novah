<?php
ob_start();
global $vcb_array;

$top_string			=	__riake( 'menu_is_fixed' , $vcb_array , 'false' ) === 'true' && is_user_logged_in() ? 'top:32px' : '';
$fixed_class		=	__riake( 'menu_is_fixed' , $vcb_array , 'false' ) === 'true' ? 'navbar-fixed-top' : '';
$item_id			=	vcb_get_item_id( 'worthy-menu' );
?>
<div class="before-header-<?php echo $item_id;?>">
<header class="header fixed clearfix navbar <?php echo $fixed_class;?>" style="<?php echo $top_string;?>;border-radius:0px;
	<?php if( __riake( 'menu_is_fixed' , $vcb_array , 'false' ) === 'false' ):?>
    	margin-bottom:0px;
    <?php endif;?>
">
    <div class="vcb-container">
        <div class="row">
            <div class="col-md-4">

                <!-- header-left start -->
                <!-- ================ -->
                <div class="header-left clearfix">

                    <!-- logo -->
                    <div class="logo smooth-scroll">
                        <a href="javascript:void(0)"><img id="logo" src="<?php echo __riake( 'logo_path' , $vcb_array );?>" alt="Worthy"></a>
                    </div>

                    <!-- name-and-slogan -->
                    <div class="site-name-and-slogan smooth-scroll">
                        <div class="site-name"><a href="javascript:void(0)"><?php echo __riake( 'header_title' , $vcb_array , __( 'Untitled' ) );?></a></div>
                        <div class="site-slogan"><?php echo __riake( 'header_description' , $vcb_array , __( 'Untitled' ) );?></div>
                    </div>

                </div>
                <!-- header-left end -->

            </div>
            <div class="col-md-8">

                <!-- header-right start -->
                <!-- ================ -->
                <div class="header-right clearfix">

                    <!-- main-navigation start -->
                    <!-- ================ -->
                    <div class="main-navigation animated">

                        <!-- navbar start -->
                        <!-- ================ -->
                        <nav class="navbar navbar-default" role="navigation">
                            <div class="container-fluid">

                                <!-- Toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>

                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse scrollspy smooth-scroll" id="navbar-collapse-1">
                                	<?php 
									wp_nav_menu( array(
										'theme_location'	=>	'worthy_menu',
										'container'			=>	'',
										'menu_class'		=>	'nav navbar-nav navbar-right',
										'deph'				=>	1
									) );
									?>
                                </div>

                            </div>
                        </nav>
                        <!-- navbar end -->

                    </div>
                    <!-- main-navigation end -->

                </div>
                <!-- header-right end -->

            </div>
        </div>
    </div>
</header>
</div>
<script>
<?php 
if( __riake( 'menu_is_fixed' , $vcb_array , 'false' ) === 'true' && is_user_logged_in() )
{
	?>
jQuery(window).scroll(function($) {
	var	$	=	jQuery;
	if (($(".before-header-<?php echo $item_id;?> .header.fixed").length > 0)) { 
		if( ( $( this ).scrollTop() > 0) && ( $( window ).width() > 767 ) ) {
			$(".before-header-<?php echo $item_id;?>").addClass("fixed-header-on");
		} else {
			$(".before-header-<?php echo $item_id;?>").removeClass("fixed-header-on");
		}
	};
});
	<?php
}
else
{
	?>
jQuery(document).ready(function($) {
   $( '.before-header-<?php echo $item_id;?>' ).addClass( 'fixed-header-on' ); 
});
	<?php
}
?>
</script>
<?php return ob_get_clean();?>