<?php
/**
 * Class LightGalleryControlFactory
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 24.08.13
 */
namespace Flame\Components\LightGallery;

use Flame\CMS\Components\VisualPaginator\IPaginatorControlFactory;
use Flame\Thumb\ThumbnailRegister;

class LightGalleryControlFactory implements ILightGalleryControlFactory
{

	/** @var \Flame\Thumb\ThumbnailRegister  */
	private $thumbnailRegister;

	/** @var \Flame\CMS\Components\VisualPaginator\IPaginatorControlFactory  */
	private $paginatorFactory;

	/**
	 * @param ThumbnailRegister $thumbnailRegister
	 * @param IPaginatorControlFactory $paginatorFactory
	 */
	function __construct(ThumbnailRegister $thumbnailRegister, IPaginatorControlFactory $paginatorFactory)
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