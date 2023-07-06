<?php
/**
 * Block Name - CV: Education
 * 
 * A Block for the CV page education section
 */

?>

<section id="<?php echo $block['id']; ?>" class="block cv-education bg-white">
    <div class="wrapper">
        <?php if(get_field('title')):?>
            <h2><?php the_field('title')?></h2>
        <?php endif; ?>
        <?php if(get_field('description')):?>
            <p class="subheading"><?php the_field('description')?></p>
        <?php endif; ?>
        <?php if(have_rows('cv_entries')):?>
            <div class="education-items grid">
                <?php while(have_rows('cv_entries')): the_row(); ?>
                    <div class="education-item flex">
                        <div class="item-left">
                            <p><?php the_sub_field('school'); ?></p>
                            <p><?php the_sub_field('degree'); ?></p>
                        </div>
                        <div class="item-right">
                            <p><?php the_sub_field('date'); ?></p>
                        </div>
                        <p class="item-fw"><?php the_sub_field('additional_notes'); ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>