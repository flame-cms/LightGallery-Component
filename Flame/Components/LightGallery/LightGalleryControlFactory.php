<?php
/**
 * Class LightGalleryControlFactory
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 24.08.13
 */
namespace Flame\Components\LightGallery;

use Flame\Thumb\ThumbnailRegister;

class LightGalleryControlFactory implements ILightGalleryControlFactory
{

	/** @var  ThumbnailRegister */
	private $thumbnailRegister;

	/**
	 * @param ThumbnailRegister $thumbnailRegister
	 */
	function __construct(ThumbnailRegister $thumbnailRegister)
	{
		$this->thumbnailRegister = $thumbnailRegister;
	}

	/**
	 * @param array|\Traversable $images
	 * @return LightGalleryControl
	 */
	public function create($images = array())
	{
		return new LightGalleryControl($this->thumbnailRegister, $images);
	}
}