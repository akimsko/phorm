<?php
/**
 * This file is part of the phorm project.
 */


namespace Phorm\Builder;
use Phorm\Element\Composite;
use Phorm\Element\Element;


/**
 * Class CompositeBuilder
 *
 * @package Phorm\Builder
 * @author Bo Thinggaard <bo@unpossiblesystems.com>
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
		foreach ($this->childBuilders as $builder) {
			$element->addChild($builder->build());
		}
		return $element;
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
