<?php
/**
 * LightGalleryControl.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    14.11.12
 */

namespace Flame\CMS\Components\LightGallery;

use Flame\CMS\Components\VisualPaginator\IPaginatorControlFactory;
use Nette\Application\UI\Control;
use Flame\CMS\Components\LightGallery\Config\Dimension;
use Flame\CMS\Components\LightGallery\Config\IDimension;
use Flame\Thumb\ThumbnailRegister;

class LightGalleryControl extends Control
{

	/** @var string */
	private $templateFile;

	/** @var array */
	private $images = array();

	/** @var  IDimension */
	private $dimension;

	/** @var int */
	private $imagesPerPage = 10;

	/** @var \Flame\Thumb\ThumbnailRegister  */
	private $thumbnailRegister;

	/** @var \Flame\CMS\Components\VisualPaginator\IPaginatorControlFactory  */
	private $paginatorFactory;

	/**
	 * @param ThumbnailRegister $thumbnailRegister
	 * @param IPaginatorControlFactory $paginatorFactory
	 */
	public function __construct(ThumbnailRegister $thumbnailRegister, IPaginatorControlFactory $paginatorFactory)
	{
		parent::__construct();

		$this->dimension = new Dimension(350, 200);
		$this->thumbnailRegister = $thumbnailRegister;
		$this->paginatorFactory = $paginatorFactory;
		$this->templateFile = __DIR__ . '/templates/LightGalleryControl.latte';
	}

	/**
	 * @param $filename
	 * @return $this
	 */
	public function setTemplateFile($filename)
	{
		$this->templateFile = (string) $filename;
		return $this;
	}

	/**
	 * @param array|\Traversable $images
	 * @return $this
	 */
	public function setImages($images)
	{
		if($images instanceof \Traversable) {
			$images = iterator_to_array($images);
		}

		$this->images = $images;
		return $this;
	}

	/**
	 * @param $count
	 * @return $this
	 */
	public function setImagesCountPerPage($count)
	{
		$this->imagesPerPage = (int) $count;
		return $this;
	}

	/**
	 * @param IDimension $dimension
	 * @return $this
	 */
	public function setThumbDimension(IDimension $dimension)
	{
		$this->dimension = $dimension;
		return $this;
	}

	/**
	 * @param null $images
	 */
	public function render($images = null)
	{
		if($images === null || !count($images)) {
			$images = $this->images;
		}

		if(is_array($images)) {
			/** @var $vsPaginator \Flame\CMS\Components\VisualPaginator\PaginatorControl */
			$vsPaginator = $this['paginator'];
			$images = $vsPaginator->applyFor($images);
		}

		$this->template->images = $images;
		$this->template->width = $this->dimension->getWidth();
		$this->template->height = $this->dimension->getHeight();
		$this->template->setFile($this->templateFile)->render();
	}

	/**
	 * @return \Flame\CMS\Components\VisualPaginator\PaginatorControl
	 */
	protected function createComponentPaginator()
	{
		return $this->paginatorFactory->create()->setItemsPerPage($this->imagesPerPage);
	}

	/**
	 * @param null $class
	 * @return \Nette\Templating\ITemplate
	 */
	protected function createTemplate($class = null)
	{
		$template = parent::createTemplate($class);
		$this->thumbnailRegister->register($template);
		return $template;
	}
}
