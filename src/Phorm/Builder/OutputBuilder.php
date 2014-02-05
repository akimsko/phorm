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

use Phorm\Element\Content;

/**
 * Class OutputBuilder
 *
 * @package Phorm\Builder
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
class OutputBuilder extends ContentBuilder {

	/**
	 * Set for.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function for_($value) {
		return $this->setAttribute('for', $value);
	}

	/**
	 * Set form.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function form($value) {
		return $this->setAttribute('form', $value);
	}

	/**
	 * Set name.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function name($value) {
		return $this->setAttribute('name', $value);
	}

	/**
	 * Build element.
	 *
	 * @param Content $element
	 *
	 * @return Content
	 */
	public function build(Content $element = null) {
		return $this
			->buildInternal($element ? $element : new Content())
			->setElementType('output');
	}
}
