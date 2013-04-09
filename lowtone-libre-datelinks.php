<?php
/*
 * Plugin Name: Date links for Libre
 * Plugin URI: http://wordpress.lowtone.nl/libre-datelinks
 * Description: Add archive date links to the Post element.
 * Version: 1.0
 * Author: Lowtone <info@lowtone.nl>
 * Author URI: http://lowtone.nl
 * License: http://wordpress.lowtone.nl/license
 */
/**
 * @author Paul van der Meijs <code@lowtone.nl>
 * @copyright Copyright (c) 2011-2012, Paul van der Meijs
 * @license http://wordpress.lowtone.nl/license/
 * @version 1.0
 * @package wordpress\plugins\lowtone\libre-datelinks
 */

namespace lowtone\libre\datelinks {

	add_action("build_post_document", function($postDocument) {
		wp_reset_postdata();

		global $post;

		$time = strtotime($post->post_date);

		$year = date("Y", $time);
		$month = date("m", $time);
		$day = date("d", $time);

		$postDocument->documentElement->appendCreateElement("datelinks", array(
				"year" => get_year_link($year),
				"month" => get_month_link($year, $month),
				"day" => get_day_link($year, $month, $day)
			));
	});

}