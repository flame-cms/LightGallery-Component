<?php
/**
 * Class LightGalleryControlFactory
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 24.08.13
 */
namespace Flame\Components\LightGallery;

use Flame\Addons\VisualPaginator\IPaginatorFactory;
use Flame\Thumb\ThumbnailRegister;

class LightGalleryControlFactory implements ILightGalleryControlFactory
{

	/** @var  ThumbnailRegister */
	private $thumbnailRegister;

	/** @var  IPaginatorFactory */
	private $paginatorFactory;

	/**
	 * @param ThumbnailRegister $thumbnailRegister
	 * @param IPaginatorFactory $paginatorFactory
	 */
	function __construct(ThumbnailRegister $thumbnailRegister, IPaginatorFactory $paginatorFactory)
	{
		$this->thumbnailRegister = $thumbnailRegister;
		$this->paginatorFactory = $paginatorFactory;
	}

	/**
	 * @return LightGalleryControl
	 */
	public function create()
	{
		return new LightGalleryControl($this->thumbnailRegister, $this->paginatorFactory);
	}
}