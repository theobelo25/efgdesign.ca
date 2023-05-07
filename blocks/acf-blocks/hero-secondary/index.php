<?php
/**
 * Block Name - Hero: Secondary
 * 
 * A Block for the secondary hero
 */

 $link = get_field('link');

?>

<section id="<?php echo $block['id']; ?>" class="block hero-secondary bg-white">
    <div class="wrapper flex">
        <h1><?php the_title(); ?></h1>
        <?php if (get_field('description')): ?>
            <p class="subheading"><?php the_field('description'); ?></p>
        <?php endif; ?>
        <?php if(!empty($link)): ?>
            <a 
                href="<?php echo $link['url']; ?>" 
                <?php echo $link['target'] === "_blank" ? "taget='_blank' rel='noopener noreferrer'" : ''; ?>
                class="btn btn-primary"
            >
                <?php echo $link['title']; ?>
            </a>
        <?php endif; ?>
    </div>
</section>