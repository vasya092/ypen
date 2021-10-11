<section class="clothes-header">
<div class="clothes-header__container">
    <div class="medium-title">Детская одежда<br>На каждый день</div>
</div>
</section>

<section class="products__archive">
<div class="products__wrapper">
<?

if ( is_product_category() ) {

    $term_id  = get_queried_object_id();
    $taxonomy = 'product_cat';

    // Get subcategories of the current category
    $terms    = get_terms([
        'taxonomy'    => $taxonomy,
        'hide_empty'  => true,
        'parent'      => get_queried_object_id()
    ]); 

    // Loop through product subcategories WP_Term Objects
    foreach ( $terms as $term ) {
        ?> <div class="archive-products">
            
       <?
        echo '<div class="mini-title">'.$term->name.' на каждый день</div>';
        $termPosts = get_posts( array(
            'post_type' => 'product',
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'id',
                    'terms' => $term->term_id,
                    'operator' => 'IN',
                )
                ),
                
            'orderby'     => 'date',
	        'order'       => 'DESC',
        ) );
        $resultIds = "";
        foreach ( $termPosts as $termPost ) {
            $resultId = strval($termPost->ID);
            $resultIds .= $resultId.',';
        }
        echo do_shortcode('[products ids="'.$resultIds.'"]');
        ?> 
            </div>
        <?

    }
}


?>

</section>
</div>