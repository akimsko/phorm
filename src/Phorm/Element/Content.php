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

namespace Phorm\Element;

/**
 * Class Content
 *
 * @package Phorm\Element
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
class Content extends Element {

	/** @var string */
	protected $content;

	/**
	 * Set content.
	 *
	 * @param string $content
	 *
	 * @return $this
	 */
	public function setContent($content) {
		$this->content = $content;
		return $this;
	}

	/**
	 * Get content.
	 *
	 * @return string
	 */
	public function getContent() {
		return $this->content;
	}
}
