<?php
/**
 * Block Name - CV: Film Work
 * 
 * A Block for the CV page fill work section
 */

?>

<section id="<?php echo $block['id']; ?>" class="block cv-film-work bg-yellow">
    <div class="wrapper">
        <?php if(get_field('title')):?>
            <h2><?php the_field('title')?></h2>
        <?php endif; ?>
        <?php if(get_field('description')):?>
            <p class="subheading"><?php the_field('description')?></p>
        <?php endif; ?>
        <?php if(have_rows('cv_entries')):?>
            <div class="film-work-entries">
                <?php while(have_rows('cv_entries')): the_row(); ?>
                    <div class="film-work-entry grid">    
                        <p class="position"><?php the_sub_field('position'); ?></p>
                        <?php if(get_sub_field('imdb_url')): ?>
                            <a href="<?php the_sub_field('imdb_url'); ?>" class="title" target="_blank" rel="noopener noreferrer"><?php the_sub_field('title'); ?></a>
                        <?php else: ?>
                            <p class="title"><?php the_sub_field('title'); ?></p>
                        <?php endif; ?>
                        <p class="year"><?php the_sub_field('year'); ?></p>
                        <p class="company"><?php the_sub_field('company'); ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>