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

	/** @var array */
	private $images;

	/** @var \Flame\Templating\Helpers $helpers */
	private $helpers;

	/** @var int */
	private $thumbSize = 260;

	/** @var int */
	private $imagesPerPage = 14;

	/**
	 * @param null $helpers
	 */
	public function __construct($helpers = null)
	{
		parent::__construct();

		$this->helpers = $helpers;
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

		$this->template->images = $images;
		$this->template->thumbSize = $this->thumbSize;
		$this->template->setFile(__DIR__ . '/LightGalleryControl.latte')->render();
	}

	/**
	 * @param null $class
	 * @return \Nette\Templating\ITemplate
	 */
	public function createTemplate($class = null)
	{
		$template = parent::createTemplate($class);
		$template->registerHelperLoader(\Nette\Callback::create($this->helpers, 'loader'));
		return $template;
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
