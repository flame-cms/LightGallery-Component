<?php
/**
 * Class IDimension
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 24.08.13
 */
namespace Flame\CMS\Components\LightGallery\Config;

interface IDimension
{

	/**
	 * @return int
	 */
	public function getHeight();

	/**
	 * @return int
	 */
	public function getWidth();

}