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
use Phorm\Element\Element;

/**
 * Class CompositeBuilder
 *
 * @package Phorm\Builder
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
abstract class CompositeBuilder extends Builder {

	/** @var Builder[] */
	private $childBuilders = array();

	/**
	 * Add element builder.
	 *
	 * @param Builder $elementBuilder
	 *
	 * @return $this
	 */
	protected function addChildBuilder(Builder $elementBuilder) {
		$this->childBuilders[] = $elementBuilder;
		return $this;
	}

	/**
	 * Build children.
	 *
	 * @param Composite $element
	 *
	 * @return Composite
	 */
	protected function buildChildren(Composite $element) {
		foreach ($this->childBuilders as $child) {
			$element->addChild($this->buildChild($child));
		}
		return $element;
	}

	/**
	 * Build child.
	 *
	 * @param Builder $child
	 *
	 * @return Element
	 */
	protected function buildChild(Builder $child) {
		$child->setTemplateNamespace($this->getTemplateNamespace());
		return $child->build();
	}

	/**
	 * Build internal.
	 *
	 * @param Element $element
	 *
	 * @return Composite
	 */
	protected function buildInternal(Element $element) {
		parent::buildInternal($element);
		return $this->buildChildren($element);
	}
}
