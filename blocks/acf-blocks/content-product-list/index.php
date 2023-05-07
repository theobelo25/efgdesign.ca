<?php
/**
 * Block Name - Form: Contact
 * 
 * A Block for the contact form
 */
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

<section id="<?php echo $block['id']; ?>" class="block product-list-section">
    <div class="wrapper">
        <?php if(!empty($products)): ?>
            <div class="prints grid">
                <?php foreach($products as $product): ?>
                    <?php if($product->item_data->ecom_visibility === "VISIBLE" && !str_contains($product->item_data->name, "*Display Copy*")): ?>
                        <?php if($product->type == 'ITEM'): ?>
                            <?php get_template_part('template-parts/product-item', '', array("product" => $product)); ?>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>