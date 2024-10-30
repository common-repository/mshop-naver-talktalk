<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'MSNTT_Banner' ) ) {
	class MSNTT_Banner {
		static function init() {
			add_action( 'wp_footer', array( __CLASS__, 'mshop_naver_banner' ) );
		}
		public static function mshop_naver_banner() {
			if ( ! defined( 'ICL_LANGUAGE_CODE' ) || 'ko' == ICL_LANGUAGE_CODE ) {
				if ( is_admin() ) {
					return;
				}
				if ( 'yes' == get_option( 'msntt_product_naver_talktalk', 'no' ) && function_exists( 'is_product' ) && is_product() ) {
					return;
				}

				if ( 'yes' == get_option( 'msntt_naver_talktalk_banner', 'no' ) ) {
					wp_enqueue_script( 'msntt', MSNTT()->plugin_url() . '/assets/js/frontend.js', array( 'jquery' ), MSNTT()->version );
					wp_localize_script( 'msntt', '_msntt', array(
						'pc_button_id' => get_option( 'msntt_naver_talktalk_pc_banner_id' ),
						'mobile_button_id' => get_option( 'msntt_naver_talktalk_mobile_banner_id' ),
						'product_url' => ''
					) );
					wp_enqueue_script( 'msntt_banner', 'https://partner.talk.naver.com/banners/script', array(
						'jquery',
						'msntt'
					) );

                    if ( class_exists( 'WooCommerce' ) ) {
                        wc_get_template( '/naver_talktalk_banner.php', array (), '', MSNTT()->template_path() );
                    } else {
                        ob_start();
                        include( MSNTT()->template_path() . '/naver_talktalk_banner.php' );
                        echo ob_get_clean();
                    }

				}
			}
		}
	}

	MSNTT_Banner::init();
}