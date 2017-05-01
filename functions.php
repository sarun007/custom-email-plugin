add_action( 'init', 'register_custom_post_status', 10 );
function register_custom_post_status() {
	register_post_status( 'wc-backorder', array(
		'label'                     => _x( 'Back Order', 'Order status', 'woocommerce' ),
		'public'                    => true,
		'exclude_from_search'       => false,
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
		'label_count'               => _n_noop( 'Back Order <span class="count">(%s)</span>', 'Back Order <span class="count">(%s)</span>', 'woocommerce' )
	) );

}

/**
 * Add custom status to order page drop down
 */
add_filter( 'wc_order_statuses', 'custom_wc_order_statuses' );
function custom_wc_order_statuses( $order_statuses ) {
	$order_statuses['wc-backorder'] = _x( 'Back Order', 'Order status', 'woocommerce' );
	return $order_statuses;
}


add_filter( 'woocommerce_email_actions', function( $email_actions ) {
    $email_actions[] = 'woocommerce_order_status_wc-backorder';
    return $email_actions;
});
