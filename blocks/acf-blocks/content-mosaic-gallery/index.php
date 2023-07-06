<?php
/**
 * Block Name - Content: Mosaic Gallery
 * 
 * A Block for the Mosaic Gallery
 */
?>

<section id="<?php echo $block['id']; ?>" class="block mosaic-gallery">
    <div class="wrapper">
        <div class="gallery-info flex">
            <?php if(get_field('title')): ?>
                <h2><?php the_field('title'); ?></h2>
            <?php endif; ?>
            <?php if(get_field('description')): ?>
                <div class="description">
                    <?php the_field('description'); ?>
                </div>
            <?php endif; ?>
        </div>
        <?php if( have_rows('links') ): ?>
            <div class="gallery-links flex">
                <?php while( have_rows('links') ): the_row(); ?>
                    <?php $link = get_sub_field('link'); ?>
                    <?php if(!empty($link)): ?>
                        <a class="btn btn-primary" href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <?php if( have_rows('gallery') ): ?>
            <div class="gallery grid">
                <?php while( have_rows('gallery') ): the_row(); ?>
                    <?php $image = get_sub_field('image'); ?> 
                    <?php $title = get_sub_field('image_title'); ?>
                    <?php $description = get_sub_field('image_description'); ?>
                    <?php $image_link = get_sub_field('image_link'); ?>
                    <?php $has_hover = !empty($title) || !empty($description) || !empty($image_link); ?>

                    <article class="item <?php echo get_sub_field('layout') === 'horz' ? 'horz' : 'vert' ?><?php echo $has_hover ? ' hover' : '';  ?>">
                        <div class="image-container" style="background-image: url(<?php echo $image['url']; ?>);"></div>
                        <div class="text-container">
                            <?php if(!empty($title)): ?>
                                <h3><?php the_sub_field('image_title'); ?></h3>
                            <?php endif; ?>
                            <?php if(!empty($description)): ?>
                                <p><?php the_sub_field('image_description'); ?></p>
                            <?php endif; ?>
                            <?php if(!empty($link)): ?>
                                <a href="<?php echo $image_link['url']; ?>"><?php echo $image_link['title']; ?></a>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php endif; ?> 
    </div>
</section>