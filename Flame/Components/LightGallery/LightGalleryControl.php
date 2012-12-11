<?php
/**
 * LightGalleryControl.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    14.11.12
 */

namespace Flame\Components\LightGallery;

class LightGalleryControl extends \Flame\Application\UI\Control
{

	/** @var string */
	protected  $templateFile;

	/** @var array */
	private $images;

	/** @var int */
	private $thumbSize = 260;

	/** @var int */
	private $imagesPerPage = 14;

	/**
	 * @var \Flame\Templating\Helpers\ThumbnailsCreator $thumbnailsCreator
	 */
	private $thumbnailsCreator;

	/**
	 * @param \Flame\Templating\Helpers\ThumbnailsCreator $thumbnailsCreator
	 */
	public function injectThumbnailsCreator(\Flame\Templating\Helpers\ThumbnailsCreator $thumbnailsCreator)
	{
		$this->thumbnailsCreator = $thumbnailsCreator;
	}

	/**
	 * @param \Nette\ComponentModel\IContainer $images
	 */
	public function __construct($images)
	{
		parent::__construct();

		$this->images = $images;
		$this->templateFile = __DIR__ . '/LightGalleryControl.latte';
	}

	/**
	 * @param $filename
	 */
	public function setTemplateFile($filename)
	{
		$this->templateFile = (string) $filename;
	}

	/**
	 * @param $images
	 */
	public function setImages($images)
	{
		$this->images = $images;
	}

	/**
	 * @param int $count
	 */
	public function setImagesCountPerPage($count)
	{
		$this->imagesPerPage = (int) $count;
	}

	/**
	 * @param int $size
	 */
	public function setThumbnailSize($size)
	{
		$this->thumbSize = $size;
	}

	public function render()
	{
		$images = $this->images;

		/** @var $paginator \Nette\Utils\Paginator */
		$paginator = $this['paginator']->getPaginator();

		if(is_array($this->images))
			$images = $this->getImagesPerPage($this->images, $paginator->offset);

		$this->template->registerHelper('thumb', \Nette\Callback::create($this->thumbnailsCreator, 'thumb'));
		$this->template->images = $images;
		$this->template->thumbSize = $this->thumbSize;
		$this->template->setFile($this->templateFile)->render();
	}

	/**
	 * @return \Flame\Addons\VisualPaginator\Paginator
	 */
	protected function createComponentPaginator()
	{
		$control =  new \Flame\Addons\VisualPaginator\Paginator();
		$control->getPaginator()->setItemCount(count($this->images));
		$control->getPaginator()->setItemsPerPage($this->imagesPerPage);
		return $control;
	}

	/**
	 * @param $posts
	 * @param $offset
	 * @return array
	 */
	protected function getImagesPerPage(array &$posts, $offset)
	{
		return array_slice($posts, $offset, $this->imagesPerPage);
	}

}
