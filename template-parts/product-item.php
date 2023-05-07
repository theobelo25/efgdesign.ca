<?php
/**
 * Template part for displaying product items
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package efgerofsky.com
 */
    $product = $args['product']->item_data;
    $image_url = $args['image_url'];
    $ecom_link = $product->ecom_uri;
    $image_url = $product->ecom_image_uris[0];
?>

<article class="print">
    <div class="image-container">
        <img src="<?php echo $image_url?>" alt="<?php echo $product->name; ?>" />
    </div>
    <div class="text-content">
        <div class="product-info">
            <h3><?php echo $product->name; ?></h3>
            <p>$<?php echo number_format(($product->variations[0]->item_variation_data->price_money->amount) / 100, 2); ?> <?php echo $product->variations[0]->item_variation_data->price_money->currency; ?></p>
            <p><?php echo $product->description; ?></p>
        </div>
        <a href="<?php echo $ecom_link?>" class="btn btn-primary">View in store</a>
    </div>
</article>