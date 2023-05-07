<?php
/**
 * Block Name - Hero: Primary
 * 
 * A Block for the homepage hero
 */

?>

<section id="<?php echo $block['id']; ?>" class="block hero-primary bg-pink">
    <div class="wrapper">
        <h1><?php the_field('heading'); ?></h1>
        <p><?php the_field('subheading'); ?></p>
    </div>
</section>