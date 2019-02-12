<?php
/**
 *
 * Blackoot Lite WordPress Theme by Iceable Themes | https://www.iceablethemes.com
 *
 * Copyright 2014-2018 Iceable Media - Mathieu Sarrasin
 *
 * Main Index
 *
 */

get_header();

get_template_part( 'part-title' );

?>
<div id="main-content" class="container">
	<div id="page-container">
		<?php

		if ( have_posts() ) :
			while ( have_posts() ) :

				the_post();

				?>
                <div style="float: left;" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <?php
                    /* Post thumbnail (Featured Image) */
                    if ('' !== get_the_post_thumbnail()) : // As recommended from the WP codex, has_post_thumbnail() is not reliable
                        ?>
                        <div class="thumbnail">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <?php
                                the_post_thumbnail('thumb');
                                ?>
                            </a>
                        </div>
                    <?php
                    endif;

                    /* Post Metadata */
                    ?>
                    <h4 style="margin-top: 10px;width: 130px;
    line-height: 30px;
    text-align: center;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    display: block;">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
                            <?php the_title(); ?>
                        </a>
                    </h4>
                </div>

				<?php

			endwhile;

		else : // If there is no post in the loop

			if ( is_search() ) : // Empty search results

				?>
				<h2><?php esc_html_e( 'Not Found', 'blackoot-lite' ); ?></h2>
				<p>
					<?php
					echo sprintf(
						// Translators: %s is the search term
						esc_html__( 'Your search for "%s" did not return any result.', 'blackoot-lite' ),
						get_search_query()
					);
					?>
					<br />
					<?php esc_html_e( 'Would you like to try another search ?', 'blackoot-lite' ); ?>
				</p>
				<?php
				get_search_form();

			else : // Empty loop (this should never happen!)

				?>
				<h2><?php esc_html_e( 'Not Found', 'blackoot-lite' ); ?></h2>
				<p><?php esc_html_e( 'What you are looking for isn\'t here...', 'blackoot-lite' ); ?></p>
				<?php

			endif;

		endif;

		?>
		<div class="page_nav">
			<?php

			if ( null !== get_next_posts_link() ) :
				?>
				<div class="previous navbutton"><?php next_posts_link( '<i class="fa fa-angle-double-left"></i>' . __( 'Previous Posts', 'blackoot-lite' ) ); ?></div>
				<?php
			endif;

			if ( null !== get_previous_posts_link() ) :
				?>
				<div class="next navbutton"><?php previous_posts_link( __( 'Next Posts', 'blackoot-lite' ) . '<i class="fa fa-angle-double-right"></i>' ); ?></div>
				<?php
			endif;

			?>
		</div>
	</div>
</div>
<?php

get_footer();
