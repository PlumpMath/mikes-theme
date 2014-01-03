<?php
/*
 * Template Name: Portfolio
 * Description: A simple portfolio template that implements mixitup (mixitup.io) 
 * and Lightbox 2 by Lokesh Dhakar (lokeshdhakar.com/projects/lightbox2/).
 */

get_header(); ?>

    <div class="controls">
        <span id="filters">
        <h3>Categories</h3>
        <ul id="filters">
            <li class="filter" data-filter="all">All</li>
            <?php
                $args = array('exclude' => '1');
                $categories = get_categories($args);
                foreach ($categories as $category) {
                    echo '<li class="filter" data-filter="' . $category->slug . '">' . $category->name . '</li>';
                }
            ?>
        </ul>
        </span>
        <span id="sorts"> 
        <h3>Sort</h3>
        <ul>
            <li class="sort" data-sort="default" data-order="asc">Default</li>
            <li class="sort" data-sort="random">Randomize</li>
        </ul>
        </span>
    </div>

    <?php while ( have_posts() ) : the_post(); ?>
        <ul id="Grid">
<?php
                $args = Array('post_type' => 'attachment', 'numberposts' => -1, 'post-mime-type' => 'image');
                $attachments = get_posts($args);
            if ($attachments) {
                foreach ($attachments as $attachment) {
                    $post_id = $attachment->post_parent;
                    $post_cat = get_the_category($post_id);
                    $post_title = $attachment->post_title;
                    $cat_name = $post_cat[0]->cat_name;
                    $cat_slug = $post_cat[0]->slug;

                    echo '<li class="mix ' . $cat_slug . '">';
                    echo '<a href="' . wp_get_attachment_url($attachment->ID) . '">';
                    echo wp_get_attachment_image($attachment->ID, 'thumbnail');
                    echo '</a></li>';
                }
            }
        ?>
        <li class="break"></li>
        </ul>
        <?php endwhile; ?>
<?php get_footer() ?>
