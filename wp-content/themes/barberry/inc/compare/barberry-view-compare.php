<?php
global $product;
$products = $barberry_compare->get_products_list();
$fields = $barberry_compare->fields();
?>

<div class="barberry-wrap-table-compare">
    <?php
    if ($products) :
        $add_to_cart = array(); ?>
        <ul data-equalizer data-equalize-on="medium">
            <?php 
            $index = 0;
            foreach ($products as $product_id => $product) :
            $th_class = ($index % 2 == 0 ? 'odd' : 'even');
            ?>

                 <li data-equalizer-watch>
                    <div class="compare-product-inner" >

                    <?php 
                        $barberry_title = isset($product->fields['title']) ? $product->fields['title'] : '';
                        $href = get_permalink($product_id);
                    ?>

                        <div class="image-wrap"><?php 
                        echo wp_kses( $product->get_image('thumbnail', array('alt' => esc_attr($barberry_title))), array( 'img' => array('class' => true,'width' => true,'height' => true,'src' => true,'alt' => true) ) );?></div>
                        <h5 class="compare-product-title"><?php echo esc_attr($barberry_title); ?></h5>

                    <?php ?>
                    </div>
                 </li>
          
            <?php
            ++$index;
            endforeach;
            ?>             
        </ul>

        <table class="barberry-table-compare">
            <thead>
                <tr>
                    <th class="empty-cell"></th>
                    <?php 
                    $index = 0;
                    foreach ($products as $product_id => $product) :
                    $th_class = ($index % 2 == 0 ? 'odd' : 'even');
                    ?>

                         <th class="<?php echo esc_attr($th_class); ?>">

                            <?php 
                                $barberry_title = isset($product->fields['title']) ? $product->fields['title'] : '';
                                $href = get_permalink($product_id);
                            ?>

                            <a href="<?php echo esc_url($href); ?>" title="<?php echo esc_attr($product->fields['title']); ?>">
                                <div class="image-wrap"><?php 
                        echo wp_kses( $product->get_image('thumbnail', array('alt' => esc_attr($barberry_title))), array( 'img' => array('class' => true,'width' => true,'height' => true,'src' => true,'alt' => true) ) );?></div>
                                <h5 class="compare-product-title"><?php echo esc_attr($barberry_title); ?></h5>
                            </a>



                            <?php ?>

                         </th>
                  
                    <?php
                    ++$index;
                    endforeach;
                    ?>  
                </tr>            
                
            </thead>

            <tbody>
            <?php 
            foreach ($fields as $field => $name) :
                if ($field == 'title') :
                    continue;
                endif;
                ?>
                <tr class="<?php echo esc_attr($field); ?>">
                    <td class="left-cell">
                        <?php echo esc_attr($field == 'image') ? esc_html__('Product', 'barberry') : $name; ?>
                        <?php echo esc_attr($field == 'image') ? '<div class="fixed-th"></div>' : ''; ?>
                    </td>

                    <?php
                    $index = 0;
                    foreach ($products as $product_id => $product) :
                        $product_class = ($index % 2 == 0 ? 'odd' : 'even') . ' barberry-compare-view-product_' . $product_id;
                        ?>
                        <td class="<?php echo esc_attr($product_class); ?>">
                            <?php
                            switch ($field) :

                                default:
                                    echo empty($product->fields[$field]) ? '&nbsp;' : $product->fields[$field];
                                    break;
                            endswitch;
                            ?>
                        </td>
                        <?php
                        ++$index;
                    endforeach;
                    ?>

                </tr>


            <?php endforeach; ?>

            <?php if (get_option('yith_woocompare_price_end') == 'yes' && isset($fields['price'])) : ?>
                <tr class="price repeated">
                    <td class="left-cell"><?php echo esc_attr($fields['price']); ?></td>

                    <?php
                    $index = 0;
                    foreach ($products as $product_id => $product) :
                        $product_class = ($index % 2 == 0 ? 'odd' : 'even') . ' barberry-compare-view-product_' . $product_id
                        ?>
                        <td class="<?php echo esc_attr($product_class); ?>">
                            <?php echo wp_kses_post($product->fields['price']); ?>
                        </td>
                        <?php
                        ++$index;
                    endforeach;
                    ?>

                </tr>
            <?php endif; ?>

            <?php if (get_option('yith_woocompare_add_to_cart_end') == 'yes' && isset($fields['add-to-cart'])) : ?>
                <tr class="add-to-cart repeated">
                    <td class="left-cell"><?php echo esc_attr($fields['add-to-cart']); ?></td>
                    <?php
                    $index = 0;
                    foreach ($products as $product_id => $product) :
                        $product_class = ($index % 2 == 0 ? 'odd' : 'even') . ' barberry-compare-view-product_' . $product_id
                        ?>
                        <td class="<?php echo esc_attr($product_class); ?>">
                            <?php
                            if (isset($add_to_cart[$product_id])) :
                                echo esc_attr($add_to_cart[$product_id]);
                            else:
                                woocommerce_template_loop_add_to_cart();
                            endif;
                            ?>
                        </td>
                        <?php
                        ++$index;
                    endforeach;
                    ?>
                </tr>
            <?php endif; ?>            

            <tr class="remove-item">
                <td class="left-cell">&nbsp;</td>

                <?php
                $index = 0;
                foreach ($products as $product_id => $product) :
                    $product_class = ($index % 2 == 0 ? 'odd' : 'even') . ' barberry-compare-view-product_' . $product_id
                    ?>
                    <td class="<?php echo esc_attr($product_class); ?>">
                        <a href="javascript:void(0);" class="barberry-remove-compare" data-prod="<?php echo esc_attr($product_id); ?>"><?php echo esc_html__('Remove', 'barberry'); ?></a>
                    </td>
                    <?php
                    ++$index;
                endforeach;
                ?>
            </tr>
                
            </tbody>
        </table>
    <?php
    else:
        echo '<div class="empty-compare-section"><i class="barberry-empty-icon"></i>';
        echo '<h4 class="text-center margin-bottom-30 empty woocommerce-compare__empty-message">' . esc_html__('No product added to compare!', 'barberry') . '</h4>';
        echo '<p class="text-center"><a href="' . esc_url(get_permalink(wc_get_page_id('shop'))) . '" class="button barberry-sidebar-return-shop btn--border" title="' . esc_attr__('Return to shop', 'woocommerce') . '">' . esc_html__('Return to shop', 'woocommerce') . '</a></p></div>';

    endif;
    ?>
</div>