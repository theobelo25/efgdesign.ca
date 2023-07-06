<?php
/**
 * Block Name - CV: Theatre Credits
 * 
 * A Block for the CV page theatre credits section
 */

?>

<section id="<?php echo $block['id']; ?>" class="block cv-theatre-credits bg-pink">
    <div class="wrapper">
        <?php if(get_field('title')):?>
            <h2><?php the_field('title')?></h2>
        <?php endif; ?>
        <?php if(get_field('description')):?>
            <p class="subheading"><?php the_field('description')?></p>
        <?php endif; ?>
        <?php if(have_rows('cv_entries')):?>
            <div class="theatre-credit-entries">
                <?php while(have_rows('cv_entries')): the_row(); ?>
                    <div class="theatre-credit-entry grid">    
                        <p class="position"><?php the_sub_field('position'); ?></p>
                        <?php if(get_sub_field('imdb_url')): ?>
                            <a href="<?php the_sub_field('imdb_url'); ?>" class="title" target="_blank" rel="noopener noreferrer"><?php the_sub_field('title'); ?></a>
                        <?php else: ?>
                            <p class="title"><?php the_sub_field('title'); ?></p>
                        <?php endif; ?>
                        <p class="name"><?php the_sub_field('name'); ?></p>
                        <p class="company"><?php the_sub_field('company'); ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>