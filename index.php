<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="row clearfix">
			
				    <div id="main" class="large-8 medium-8 columns clearfix" role="main">

					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    	<?php get_template_part( 'partials/loop', 'archive' ); ?>
					
					    <?php endwhile; ?>	
					
					        <?php if (function_exists('joints_page_navi')) { ?>
					            <?php joints_page_navi(); ?>
					        <?php } else { ?>
					        
					            <nav class="wp-prev-next">
					                <ul class="clearfix">
					        	        <li class="prev-link"><?php next_posts_link(__('&laquo; Eldre innlegg', "jointstheme")) ?></li>
					        	        <li class="next-link"><?php previous_posts_link(__('Nyere innlegg &raquo;', "jointstheme")) ?></li>
					                </ul>
					            </nav>
					        <?php } ?>		
					
					    <?php else : ?>
					    
    						<?php get_template_part( 'partials/missing', 'content' ); ?>
					
					    <?php endif; ?>
			
				    </div> <!-- end #main -->
				<?php get_sidebar('right'); ?>
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>