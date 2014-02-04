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

namespace Phorm\Builder;

use Phorm\Element\Element;

/**
 * Class FileBuilder
 *
 * @package Phorm\Builder
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
class FileBuilder extends InputBuilder {
	/**
	 * Set accept.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function accept($value) {
		return $this->setAttribute('accept', $value);
	}

	/**
	 * Build element.
	 *
	 * @param Element $element
	 *
	 * @return Element
	 */
	public function build(Element $element = null) {
		$this->type('file');
		return parent::build($element);
	}
}
