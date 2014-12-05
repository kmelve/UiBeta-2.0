<?php get_header();
/*
Template Name: Authors page
*/
// List all authors on UiBeta

$all_authors = get_users('orderby=post_count&order=DESC');

$authors = array();

//
foreach ($all_authors as $current_author) {
    if (!in_array('subscriber', $current_author->roles))
    {
        $authors[] = $current_author;
    }
}
?>
<div id="content">
    <div id="inner-content" class="row clearfix">
        <div id="main" class="medium-8 first clearfix">
        <?php foreach ($authors as $author) : ?>
            <div class="author">
                <div class="authoravatar">
                    <?php echo get_avatar( $author->user_email, '128' ); ?>
                </div>
                <div class="authorinfo">
                    <h2 class="authorname"><?php echo $author->display_name; ?></h2>
                    <p class="authordescription"><?php echo get_user_meta($author->ID, 'description', true); ?></p>
                    <p class="authorlinks"><a href="<?php echo get_author_posts_url( $author->ID ); ?>">View Author Links</a></p>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>