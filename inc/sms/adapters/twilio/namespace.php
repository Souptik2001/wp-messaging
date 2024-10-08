<?php
/**
 * Twilio adapter: Namespace functions.
 *
 * @package wp-messaging
 */

namespace Souptik\WPMessaging\SMS\Adapters\Twilio;

use const Souptik\WPMessaging\SMS\SLUG as SMS_SLUG;

const SLUG = 'twilio';

// Bootstrap the module!
bootstrap();

/**
 * Bootstrap plugin.
 *
 * @return void
 */
function bootstrap(): void {
	// Add this adapter to the list of available adapters.
	add_filter(
		SMS_SLUG . '_adapters',
		function ( array $adapters = [] ): array {
			// Add the adapter.
			$adapters[ SLUG ] = [
				'name'    => __( 'Twilio', 'wp-messaging' ),
				'adapter' => new Adapter(),
				'options' => Adapter::get_settings_fields(),
			];

			// Return the adapters.
			return $adapters;
		}
	);
}
