<?php
/**
 * Block Name - Banner: Featured Prints
 * 
 * A Block for a featured prints banner
 */

 $featured_prints = get_field('featured_prints');
 $headers = array(
    'Square-Version'            => '2023-04-19',
    'Authorization'             =>  'Bearer '. SQUARE_SCRT,
    'Content-Type'              =>  'application/json'
 );
 $body = json_encode(array(
    "object_types" => ["ITEM"],
 ));
 $args = array(
        'headers' => $headers,
        'body'    => $body,
 );
 $response = json_decode(wp_remote_retrieve_body(wp_remote_post('https://connect.squareup.com/v2/catalog/search', $args)));
 $products = $response->objects;
?>

<section id="<?php echo $block['id']; ?>" class="block banner-featured-prints bg-yellow">
    <div class="wrapper flex">
        <?php if (get_field('heading')): ?>
            <h2><?php the_field('heading'); ?></h2>
        <?php endif; ?>
        <?php if (get_field('subheading')):?>
            <p class="subheading"><?php the_field('subheading'); ?></p>
        <?php endif; ?>
        <a href="$" class="btn btn-primary">See all prints</a>
        <?php if(!empty($featured_prints)): ?>
            <div class="featured-prints flex">
                <?php foreach($products as $product): ?>
                    <?php if (in_array($product->id, $featured_prints)): ?>
                        <?php $image_url = $product->item_data->ecom_image_uris[0]; ?>
                        <?php get_template_part('template-parts/product-item', '', array("product" => $product, "image_url" => $image_url)); ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>