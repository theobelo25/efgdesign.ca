<?php
/**
 * Block Name - CV: Skills
 * 
 * A Block for the CV page skills section
 */

?>

<section id="<?php echo $block['id']; ?>" class="block cv-skills bg-white">
    <div class="wrapper">
        <?php if(get_field('title')):?>
            <h2><?php the_field('title')?></h2>
        <?php endif; ?>
        <?php if(get_field('description')):?>
            <p class="subheading"><?php the_field('description')?></p>
        <?php endif; ?>
        <?php if(have_rows('cv_entries')):?>
            <div class="skills flex">
                <?php while(have_rows('cv_entries')): the_row(); ?>
                    <div class="skill">
                        <p><?php the_sub_field('skill'); ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>