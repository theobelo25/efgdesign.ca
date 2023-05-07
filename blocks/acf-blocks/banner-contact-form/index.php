<?php
/**
 * Block Name - Banner: Contact Form
 * 
 * A Block for a contact form banner
 */
?>

<section id="<?php echo $block['id']; ?>" class="block banner-contact-form bg-white">
    <div class="wrapper">
        <?php if(get_field('title')): ?>
            <h2><?php the_field('title'); ?></h2>
        <?php endif; ?>
        <?php if(get_field('content')): ?>
            <p class="subheading"><?php the_field('content'); ?></p>
        <?php endif; ?>    
        <?php echo do_shortcode('[wpforms id="35" title="false"]'); ?>
    </div>
</section>