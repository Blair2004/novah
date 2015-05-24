<ul class="list-unstyled">
    <?php
	wp_list_comments( array(
		'style'         => 'div',
		'short_ping'    => true,
		'avatar_size'   => '64',
		'walker'        => new Bootstrap_Comment_Walker(),
	) );
    ?>
</ul><!-- .comment-list -->