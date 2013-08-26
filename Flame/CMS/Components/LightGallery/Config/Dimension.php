<?php
/**
 * Class Dimension
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 24.08.13
 */
namespace Flame\CMS\Components\LightGallery\Config;

use Nette\Object;

class Dimension extends Object implements IDimension
{

	/** @var int  */
	private $width;

	/** @var int */
	private $height;

	/**
	 * @param int|string $height
	 * @param int|string $width
	 */
	function __construct($width, $height)
	{
		$this->height = (int) $height;
		$this->width = (int) $width;
	}

	/**
	 * @param int $height
	 * @return $this
	 */
	public function setHeight($height)
	{
		$this->height = (int) $height;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getHeight()
	{
		return $this->height;
	}

	/**
	 * @param int $width
	 * @return $this
	 */
	public function setWidth($width)
	{
		$this->width = (int) $width;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getWidth()
	{
		return $this->width;
	}


}