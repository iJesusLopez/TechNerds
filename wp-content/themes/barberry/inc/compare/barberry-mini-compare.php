<?php $count_compare = count($barberry_compare_list); ?>
<div class="barberry-compare-list">
    <div class="grid-x compare-cells">
        <div class="cell large-8 medium-10 large-offset-2 medium-offset-1 compare-cell">
            <table>
                <tr>
                    <td class="barberry-td-30 compare_title_section">
                        <h5 class="clearfix barberry-compare-label"><span class="barberry-block"><?php esc_html_e('Compare Products', 'barberry'); ?></span><span class="barberry-block compare-count"> (<?php echo esc_attr($count_compare); ?> <?php esc_html_e('Products', 'barberry'); ?>)</span></h5>
                    </td>
                    <td class="barberry-td-40 compare_products_section max-compare-<?php echo esc_attr($max_compare); ?>">
                        <div class="grid-x grid-padding-x">
                            <?php 
                            $k = 0;
                            $class_item = $max_compare == 4 ? 'cell auto' : 'cell auto';
                            if ($barberry_compare_list) :
                                foreach ($barberry_compare_list as $product) :
                                    if ($k > $max_compare - 1):
                                        break;
                                    endif;
                                    $productId = $product->get_id();
                                    $barberry_title = $product->get_name();
                                    $barberry_href = $product->get_permalink();
                                    ?>
                                    <div class="<?php echo esc_attr($class_item); ?>">
                                        <div class="barberry-compare-wrap-item">
                                            <div class="barberry-compare-item-hover">
                                                <div class="barberry-compare-item-hover-wraper">
                                                    <a href="<?php echo esc_url($barberry_href); ?>" title="<?php echo esc_attr($barberry_title); ?>">
                                                        <?php echo wp_kses( $product->get_image(apply_filters('single_product_archive_thumbnail_size', 'shop_catalog'), array('alt' => esc_attr($barberry_title))), array( 'img' => array('class' => true,'width' => true,'height' => true,'src' => true,'alt' => true) ) ); ?>
                                                        <h5 class="product-title"><?php echo esc_attr($barberry_title); ?></h5>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="barberry-compare-item">
                                                <a href="javascript:void(0);" class="barberry-remove-compare" data-prod="<?php echo esc_attr($productId); ?>"></a>
                                                <a href="<?php echo esc_url($barberry_href); ?>" class="barberry-img-compare" title="<?php echo esc_attr($barberry_title); ?>">
                                                <?php echo wp_kses( $product->get_image('thumbnail', array('alt' => esc_attr($barberry_title))), array( 'img' => array('class' => true,'width' => true,'height' => true,'src' => true,'alt' => true) ) ); ?>

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php 
                                $k++;
                                endforeach; ?>
                            <?php endif; ?>

                            <?php if ($k < $max_compare) :
                                $barberry_src_no_image = wc_placeholder_img_src();
                                for($i=$k; $i<$max_compare; $i++): ?>
                                    <div class="<?php echo esc_attr($class_item); ?>">
                                        <div class="barberry-compare-wrap-item">
                                            <div class="barberry-compare-item">
                                                <span class="barberry-no-image">
                                                    <img src="<?php echo esc_url($barberry_src_no_image); ?>" width="70" height="70" alt="<?php esc_attr_e("Compare Product", 'barberry'); ?>" />
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endfor; ?>
                            <?php endif; ?>
                        </div>
                    </td>
                    <td class="barberry-td-30 compare_button_section">
                        <div class="barberry-compare-label<?php echo !$count_compare ? ' hidden-tag' : ''; ?>">
                            <a class="barberry-compare-clear-all" href="javascript:void(0);" title="<?php esc_attr_e('Clear All', 'barberry'); ?>"><?php esc_html_e('Clear All', 'barberry'); ?></a>
                            <a class="barberry-compare-view btn button <?php echo !$count_compare ? ' disabled' : ''; ?>" href="<?php echo esc_url($view_href); ?>" title="<?php esc_attr_e("Let's Compare !", 'barberry'); ?>"><i class="compare-icon"></i><?php esc_html_e("Let's Compare", 'barberry'); ?></a>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<a class="close-icon barberry-close-mini-compare" href="javascript:void(0)" data-close aria-label="Close modal">
    <span class="close-icon_top"></span>
    <span class="close-icon_bottom"></span>
</a>
