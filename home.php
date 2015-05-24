<?php global $novah_core; ?>
<?php get_header();?>
<?php get_template_part( 'horizontal' , 'menu' );?>
<?php get_template_part( 'horizontal' , 'title' );?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
        	<?php if( have_posts() ): while( have_posts() ): the_post();?>
            <div class="blog_grid">
                <h2 class="post_title"><a href="#"><?php the_title();?></a></h2>
                <?php if( has_post_thumbnail( get_the_ID() ) ):?>
                <a href="#"><img src="images/b1.jpg" class="img-responsive" alt=""></a>
                <?php endif;?>
                <ul class="links">
                    <li><i class="fa fa-calendar"></i> <?php the_date();?></li>
                    <li><i class="fa fa-user"></i> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php echo get_the_author_link() ;?></a></li>
                    <?php if( __riake( 'show-comments-count' , $novah_core->options ) == 'true' ):?>
                    	<?php 
						$nbr_comments	=	wp_count_comments( get_the_ID() );
						if( $nbr_comments->approved > 1 )
						{
							$string		=	sprintf( __( '%s Comments' , $novah_core->textdomain ) , $nbr_comments->approved );
						}
						else if( $nbr_comments->approved == 1 )
						{
							$string		=	sprintf( __( 'One Comment' , $novah_core->textdomain ) , $nbr_comments->approved );
						}
						else
						{
							$string		=	sprintf( __( 'No Comments' , $novah_core->textdomain ) , $nbr_comments->approved );
						}
						?>
                    <li class="last"><i class="fa fa-comments"></i> <a href="<?php comments_link();?>"><?php echo $string;?></a></li>
                    <?php endif;?>
                </ul>
                <p><?php the_excerpt();?></p>
                <a href="<?php echo get_the_permalink( get_the_ID() );?>" class="blog_btn"><?php echo __riake( 'post-read-more-label' , $novah_core->defaults );?></a>
            </div>
            <div class="pagination pagination__posts">
            	<?php echo $novah_core->framework->get_pagination();?>
            </div>
            <?php endwhile; else: ?>
				
			<?php endif; ?>
        </div>
        <div class="col-md-4 blog_sidebar">
            <ul class="sidebar">
                <h3>Categories</h3>
                <li><a href="#">Lacinia fringilla</a></li>
                <li><a href="#">Curabitur consequat</a></li>
                <li><a href="#">Suspendisse</a></li>
                <li><a href="#">Mirum est</a></li>
                <li><a href="#">Vivamus efficitur</a></li>
            </ul>
            <ul class="sidebar">
                <h3>Recent posts</h3>
                <li><a href="#">Mauris lacinia fringilla lacus</a></li>
                <li><a href="#">Curabitur consequat vel nisl et eleifend</a></li>
                <li><a href="#">Suspendisse laoreet luctus</a></li>
                <li><a href="#">Mirum est notare quam littera</a></li>
                <li><a href="#">Vivamus efficitur gravida mi</a></li>
            </ul>
            <ul class="sidebar">
                <h3>Popular posts</h3>
                <li><a href="#">Mirum est notare quam littera</a></li>
                <li><a href="#">Vivamus efficitur gravida mi</a></li>
                <li><a href="#">Mauris lacinia fringilla lacus</a></li>
                <li><a href="#">Curabitur consequat vel nisl et eleifend</a></li>
                <li><a href="#">Suspendisse laoreet luctus</a></li>
            </ul>
        </div>
    </div>
</div>
<?php get_footer();?>
