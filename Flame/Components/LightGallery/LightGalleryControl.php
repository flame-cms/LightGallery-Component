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

	/**
	 * @param array $images
	 */
	public function __construct($images)
	{
		parent::__construct();

		$this->images = $images;
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
		$this->template->images = $this->images;
		$this->template->thumbSize = $this->thumbSize;
		$this->template->maxSize = $this->maxSize;
		$this->template->setFile(__DIR__ . '/LightGalleryControl.latte')->render();
	}

}
