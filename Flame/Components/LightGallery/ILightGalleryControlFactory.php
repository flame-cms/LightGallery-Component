<?php
/**
 * ILightGalleryControlFactory.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    11.12.12
 */

namespace Flame\Components\LightGallery;

interface ILightGalleryControlFactory
{

	/**
	 * @param $images
	 * @return LightGalleryControl
	 */
	public function create($images);

}
