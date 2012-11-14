<?php
/**
 * LightGalleryControlFactrory.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    14.11.12
 */

namespace Flame\Components\LightGallery;

class LightGalleryControlFactory extends \Flame\Application\ControlFactory
{

	/**
	 * @param null $data
	 * @return LightGalleryControl
	 */
	public function create($data = null)
	{
		$control = new LightGalleryControl($data);
		return $control;
	}

}
