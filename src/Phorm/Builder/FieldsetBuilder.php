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

use Phorm\Element\Composite;

/**
 * Class FieldsetBuilder
 *
 * @package Phorm\Builder
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
class FieldsetBuilder extends CompositeBuilder {

	/**
	 * Add element.
	 *
	 * @param Builder $element
	 *
	 * @return $this
	 */
	public function addElement(Builder $element) {
		$this->addChildBuilder($element);
		return $this;
	}

	/**
	 * Build element.
	 *
	 * @param Composite $element
	 *
	 * @return Composite
	 */
	public function build(Composite $element = null) {
		return $this
			->buildInternal($element ? $element : new Composite())
			->setElementType('fieldset');
	}
}
