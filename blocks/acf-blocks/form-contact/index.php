<?php
/**
 * Block Name - Form: Contact
 * 
 * A Block for the contact form
 */

?>

<section id="<?php echo $block['id']; ?>" class="block contact-form-section bg-yellow">
    <div class="wrapper grid">
        <div class="contact-information">
            <h1>Contact us</h1>
            <?php get_template_part('template-parts/contact-links', '', array('background' => 'dark')); ?>
            <p>Whatever cardigan seitan yuccie fixie vexillologist +1 locavore copper mug migas microdosing synth beard palo santo intelligentsia. Sriracha air plant tumeric freegan blog.</p>
            <?php get_template_part('template-parts/social-links', '', array('background' => 'light')); ?>
        </div>
        <div class="contact-form">
            <?php echo do_shortcode('[wpforms id="35" title="false"]'); ?>
        </div>
    </div>
</section>