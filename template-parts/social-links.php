<?php
/**
 * Template part for displaying social links
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package efgerofsky.com
 */


?>

<div class="social-media-links flex">
    <?php if (get_field('pinterest', 'option') && $args['background'] === 'light'): ?>
        <a href="<?php the_field('pinterest', 'option'); ?>" target="_blank" rel="noopener noreferrer" class="social-link hover">
            <svg class="icon">
                <use xlink:href="<?php echo get_template_directory_uri()?>/src/assets/icons/social-icons.svg#pinterest-light"></use>
            </svg>
        </a>
    <?php else: ?>
        <a href="<?php the_field('pinterest', 'option'); ?>" target="_blank" rel="noopener noreferrer" class="social-link hover">
            <svg class="icon">
                <use xlink:href="<?php echo get_template_directory_uri()?>/src/assets/icons/social-icons.svg#pinterest"></use>
            </svg>
        </a>
    <?php endif; ?>
    <?php if (get_field('twitter', 'option')): ?>
        <a href="<?php the_field('twitter', 'option'); ?>" target="_blank" rel="noopener noreferrer" class="social-link hover">
            <svg class="icon">
                <use xlink:href="<?php echo get_template_directory_uri()?>/src/assets/icons/social-icons.svg#twitter"></use>
            </svg>
        </a>
    <?php endif; ?>
    <?php if (get_field('instagram', 'option')): ?>
        <a href="<?php the_field('instagram', 'option'); ?>" target="_blank" rel="noopener noreferrer" class="social-link hover">
            <svg class="icon">
                <use xlink:href="<?php echo get_template_directory_uri()?>/src/assets/icons/social-icons.svg#instagram"></use>
            </svg>
        </a>
    <?php endif; ?>
</div>