<?php
global $novah_core;

if( __riake( 'enable-title'  , $novah_core->defaults ) === 'true' ):
	// check if for a page or a post title has been disabled
?>
<div class="about">
    <div class="container">
        <section class="title-section">
            <h1 class="title-header"> Blog </h1>
        </section>
    </div>
</div>
<?php endif;?>