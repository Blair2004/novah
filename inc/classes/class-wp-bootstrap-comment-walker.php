<?php
/**
 * A custom WordPress comment walker class to implement the Bootstrap 3 Media object in wordpress comment list.
 *
 * @package     WP Bootstrap Comment Walker
 * @version     1.0.0
 * @author      Edi Amin <to.ediamin@gmail.com>
 * @license     http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link        https://github.com/ediamin/wp-bootstrap-comment-walker
 */
class Bootstrap_Comment_Walker extends Walker_Comment {
	/**
	 * Output a comment in the HTML5 format.
	 *
	 * @access protected
	 * @since 1.0.0
	 *
	 * @see wp_list_comments()
	 *
	 * @param object $comment Comment to display.
	 * @param int    $depth   Depth of comment.
	 * @param array  $args    An array of arguments.
	 */
	protected function html5_comment( $comment, $depth, $args ) {
		$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
		if( __riake( 'has_children' , $args ) )
		{
			//var_dump( $comment , $depth , $args );
			?>
            <<?php echo $tag; ?> class="media" id="comment-<?php comment_ID(); ?>">
                <div class="pull-left">
                    <?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
                </div>
                <div class="media-body">
                    <div class="well">
                        <div class="media-heading">
                            <strong>
								<?php printf( __( '%s' ), sprintf( '<b class="fn">%s</b>', get_comment_author_link() ) ); ?>
							</strong>&nbsp; 
                            <small>
                            	<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>">
                                    <time datetime="<?php comment_time( 'c' ); ?>">
                                        <?php printf( _x( '%1$s at %2$s', '1: date, 2: time' ), get_comment_date(), get_comment_time() ); ?>
                                    </time>
                                </a>
                        	</small>
                            <div class="comment-metadata">
                                <a class="pull-right" href="#"><i class="icon-repeat"></i>
                                	<?php
									comment_reply_link( array_merge( $args, array(
										'add_below' => 'div-comment',
										'depth'     => $depth,
										'max_depth' => $args['max_depth'],
										'before'    => '',
										'after'     => ''
									) ) );
									?>
                                </a>
                            </div>
                        </div>
                        <?php if ( '0' == $comment->comment_approved ) : ?>
                        <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
                        <?php endif; ?>
                        <div class="comment-content">
							<?php comment_text(); ?>
                        </div><!-- .comment-content -->
                    </div>
            <?php
		}
		else
		{
			?>
            <<?php echo $tag; ?> class="media" id="comment-<?php comment_ID(); ?>">
                <div class="pull-left">
                    <?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
                </div>
                <div class="media-body">
                    <div class="well">
                        <div class="media-heading">
                            <strong>
								<?php printf( __( '%s' ), sprintf( '<b class="fn">%s</b>', get_comment_author_link() ) ); ?>
							</strong>&nbsp; 
                            <small>
                            	<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>">
                                    <time datetime="<?php comment_time( 'c' ); ?>">
                                        <?php printf( _x( '%1$s at %2$s', '1: date, 2: time' ), get_comment_date(), get_comment_time() ); ?>
                                    </time>
                                </a>
                        	</small>
                            <small>(<?php edit_comment_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ); ?>)</small>
                            <div class="comment-metadata">
                            	<?php
									comment_reply_link( array_merge( $args, array(
										'add_below' => 'div-comment',
										'depth'     => $depth,
										'max_depth' => $args['max_depth'],
										'before'    => '',
										'after'     => ''
									) ) );
									?>
                                <a class="pull-right" href="#"><i class="icon-repeat"></i>
                                	
                                </a>
                            </div>
                        </div>
                        <?php if ( '0' == $comment->comment_approved ) : ?>
                        <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
                        <?php endif; ?>
                        <div class="comment-content">
							<?php comment_text(); ?>
                        </div><!-- .comment-content -->
                    </div>
                </div>
            </<?php echo $tag; ?>>
            <?php
		}
	}	
}