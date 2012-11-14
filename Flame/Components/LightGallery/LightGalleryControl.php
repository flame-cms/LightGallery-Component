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

	/** @var int */
	private $thumbSize = 260;

	/** @var int */
	private $maxSize = 500;

	/** @var int */
	private $imagesPerPage = 14;

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
	public function setImagePerPageCount($count)
	{
		$this->imagesPerPage = (int) $count;
	}

	/**
	 * @param $size
	 */
	public function setThumbSize($size)
	{
		$this->thumbSize = $size;
	}

	/**
	 * @param $size
	 */
	public function setMaxSize($size)
	{
		$this->maxSize = $size;
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
		$this->template->maxSize = $this->maxSize;
		$this->template->setFile(__DIR__ . '/LightGalleryControl.latte')->render();
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
