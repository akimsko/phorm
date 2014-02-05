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
 * Class DatalistBuilder
 *
 * @package Phorm\Builder
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
class DatalistBuilder extends CompositeBuilder {

	/**
	 * Add option.
	 *
	 * @param OptionBuilder $option
	 *
	 * @return $this
	 */
	public function addOption(OptionBuilder $option) {
		return $this->addChildBuilder($option);
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
			->setElementType('datalist');
	}
}
