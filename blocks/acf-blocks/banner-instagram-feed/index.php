<?php
/**
 * Block Name - Banner: Instagram Feed
 * 
 * A Block for an instagram feed
 */
?>

<section id="<?php echo $block['id']; ?>" class="block banner-instagram-feed bg-white">
    <div class="wrapper">
        <?php if (get_field('title')): ?>
            <h2><?php the_field('title'); ?></h2>
        <?php endif; ?>
        <?php if (get_field('subheading')): ?>
            <p class="subheading"><?php the_field('subheading'); ?></p>
        <?php endif; ?>
        <?php echo do_shortcode('[insta-gallery id="1"]'); ?>
    </div>
</section>