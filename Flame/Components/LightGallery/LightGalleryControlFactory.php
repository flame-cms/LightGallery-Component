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

	/**
	 * @param \Flame\Templating\Helpers $helpers
	 */
	public function __construct(\Flame\Templating\Helpers $helpers)
	{
		$this->lightGalleryControl = new LightGalleryControl($helpers);
	}

	/**
	 * @param $filePath
	 */
	public function setTemplateFile($filePath)
	{
		$this->lightGalleryControl->setTemplateFile($filePath);
	}

	/**
	 * @param int $size
	 */
	public function setThumbnailSize($size)
	{
		$this->lightGalleryControl->setThumbnailSize($size);
	}

	/**
	 * @param int $count
	 */
	public  function setImagesCountPerPage($count)
	{
		$this->lightGalleryControl->setImagesCountPerPage($count);
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
