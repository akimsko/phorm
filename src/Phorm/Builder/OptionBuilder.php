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
 * Class OptionBuilder
 *
 * @package Phorm\Builder
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
class OptionBuilder extends ContentBuilder {
	/**
	 * Set disabled.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function disabled($value) {
		return $this->setAttribute('disabled', $value);
	}

	/**
	 * Set label.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function label($value) {
		return $this->setAttribute('label', $value);
	}

	/**
	 * Set selected.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function selected($value) {
		return $this->setAttribute('selected', $value);
	}

	/**
	 * Set value.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function value($value) {
		return $this->setAttribute('value', $value);
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
			->setElementType('option');
	}
}
