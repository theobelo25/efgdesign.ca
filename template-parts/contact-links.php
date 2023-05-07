<?php
/**
 * Template part for displaying social links
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package efgerofsky.com
 */


?>

<div class="contact-info flex">
    <?php if (get_field('phone', 'option')): ?>
        <a href="tel:<?php the_field('phone', 'option'); ?>" class="contact-link hover">
            <span class="sr-only">Phone</span>			
            <svg class="icon">
                <use xlink:href="<?php echo get_template_directory_uri()?>/src/assets/icons/contact-icons.svg#phone"></use>
            </svg>
            <?php the_field('phone', 'option') ?>
        </a>
    <?php endif; ?>
    <?php if (get_field('email', 'option')): ?>
        <a href="mailto:<?php the_field('email', 'option'); ?>" class="contact-link hover">
            <span class="sr-only">Email</span>	
            <svg class="icon">
                <use xlink:href="<?php echo get_template_directory_uri()?>/src/assets/icons/contact-icons.svg#email"></use>
            </svg>
            <?php the_field('email', 'option') ?>
        </a>
    <?php endif; ?>
</div>