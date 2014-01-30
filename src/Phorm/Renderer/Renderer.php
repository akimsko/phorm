<?php

/*
 * This file is part of the Phorm project.
 *
 * @link https://github.com/akimsko/phorm
 *
 * @copyright Copyright 2014 Bo Thinggaard
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Phorm\Renderer;

use Phorm\Element\Element;

/**
 * Class Renderer
 *
 * @package Phorm\Renderer
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
abstract class Renderer {

	/** @var Helper */
	private $helper;

	/**
	 * Get helper.
	 *
	 * @return Helper
	 */
	public function getHelper() {
		return $this->helper
			? $this->helper
			: ($this->helper = new Helper($this));
	}

	/**
	 * setHelper.
	 *
	 * @param Helper $helper
	 *
	 * @return $this
	 */
	public function setHelper(Helper $helper) {
		$this->helper = $helper;
		return $this;
	}

	/**
	 * Render an element tree.
	 *
	 * @param Element $element
	 *
	 * @return string The rendered element tree.
	 */
	abstract public function render(Element $element);
}