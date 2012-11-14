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

	/** @var \Flame\Components\LightGallery\LightGalleryControl */
	private $lightGalleryControl;

	public function __construct()
	{
		$this->lightGalleryControl = new LightGalleryControl(array());
	}

	/**
	 * @param int $size
	 */
	public function setThumbSize($size)
	{
		$this->lightGalleryControl->setThumbSize($size);
	}

	/**
	 * @param int $size
	 */
	public function setMaxSize($size)
	{
		$this->lightGalleryControl->setMaxSize($size);
	}

	/**
	 * @param int $count
	 */
	public  function setImagesPerPageCount($count)
	{
		$this->lightGalleryControl->setImagePerPageCount($count);
	}
	/**
	 * @param null $data
	 * @return LightGalleryControl
	 */
	public function create($data = null)
	{
		$this->lightGalleryControl->setImages($data);
		return $this->lightGalleryControl;
	}

}
