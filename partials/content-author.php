<aside class="meta author show-for-medium-up " itemprop="articleMeta">

			<?php if ( function_exists( 'get_coauthors' ) && count( get_coauthors( get_the_id() ) ) > 1 ): ?>

                <h4 class="widgettitle">Hjernane bak innlegget</h4>

                <?php else: ?>

                <h4 class="widgettitle">Hjernen bak innlegget</h4>

            <?php endif; ?>

			<?php if ( class_exists( 'coauthors_plus' ) ) :
                global $post;
                echo '<ul>';
                foreach( get_coauthors() as $coauthor ): ?>
                <?php $author_id=$post->coauthor; ?>
                    <?php echo get_avatar( $coauthor->user_email, '512' ); ?>
                    <li><h5 class="co-author-display-name"><a href="<?php echo get_author_posts_url( $coauthor->ID, $coauthor->user_nicename ); ?>"><?php echo $coauthor->display_name; ?></a></span></h5></li>
                    <li class="author--description">
                    	<?php echo $coauthor->description; ?>
                    </li>
                <?php endforeach;
                echo '</ul>';
            endif;
            ?>

    <div id="sharing"></div>
</aside>
