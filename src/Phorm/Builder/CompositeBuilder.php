<?php
/**
 * This file is part of the phorm project.
 */


namespace Phorm\Builder;


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
	 * @return \Phorm\Element\Element[]
	 */
	protected function buildChildren() {
		$children = array();
		foreach ($this->childBuilders as $builder) {
			$children[] = $builder->build();
		}
		return $children;
	}

} 