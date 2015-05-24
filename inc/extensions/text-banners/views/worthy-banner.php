<?php 
ob_start();
global $vc_bootstrap;
global $vcb_array;
?>
<div id="banner" class="banner">
    <div class="banner-image">
        <div class="backstretch">
            <img src="<?php echo __riake( 'background_img' , $vcb_array );?>">
        </div>
    </div>
    <div class="banner-caption">
        <div class="vcb-container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 object-non-visible animated object-visible fadeIn" data-animation-effect="fadeIn">
                    <h1 class="text-center"><?php echo __riake( 'title' , $vcb_array );?></h1>
                    <p class="lead text-center"><?php echo __riake( 'description' , $vcb_array );?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php return ob_get_clean();?>