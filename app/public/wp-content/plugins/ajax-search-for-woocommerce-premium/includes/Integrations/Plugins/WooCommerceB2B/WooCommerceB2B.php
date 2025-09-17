<?php
/**
 * @dgwt_wcas_premium_only
 */

namespace DgoraWcas\Integrations\Plugins\WooCommerceB2B;

use DgoraWcas\Helpers;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Integration with WooCommerce B2B
 *
 * Plugin URL: https://woocommerce-b2b.com/
 * Author: Code4Life
 */
class WooCommerceB2B {
	public function init() {
		if ( ! dgoraAsfwFs()->is_premium() ) {
			return;
		}
		if ( ! defined( 'WCB2B_VERSION' ) ) {
			return;
		}
		if ( version_compare( WCB2B_VERSION, '3.2.0' ) < 0 ) {
			return;
		}

		add_action( 'init', array( $this, 'storeInSessionExcludedProductsAndTerms' ), 20 );

		add_filter( 'dgwt/wcas/troubleshooting/renamed_plugins', array( $this, 'getFolderRenameInfo' ) );
	}

	/**
	 * Store disallowed product and term ids in session
	 */
	public function storeInSessionExcludedProductsAndTerms() {
		if ( ! function_exists( 'wcb2b_get_unallowed_terms' ) || ! function_exists( 'wcb2b_get_unallowed_products' ) ) {
			return;
		}

		$newSession = false;
		if ( ! session_id() ) {
			session_start();
			$newSession = true;
		}

		$_SESSION['dgwt-wcas-b2b-woocommerce-disallowed-products'] = wcb2b_get_unallowed_products();
		$_SESSION['dgwt-wcas-b2b-woocommerce-disallowed-terms']    = wcb2b_get_unallowed_terms();

		if ( $newSession && function_exists( 'session_status' ) && session_status() === PHP_SESSION_ACTIVE ) {
			session_write_close();
		}
	}

	/**
	 * Get info about renamed plugin folder
	 *
	 * @param array $plugins
	 *
	 * @return array
	 */
	public function getFolderRenameInfo( $plugins ) {
		$filters = new Filters();

		$result = Helpers::getFolderRenameInfo__premium_only( 'WooCommerce B2B', $filters->plugin_names );
		if ( $result ) {
			$plugins[] = $result;
		}

		return $plugins;
	}
}
