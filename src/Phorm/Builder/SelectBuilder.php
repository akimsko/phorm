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
 * Class SelectBuilder
 *
 * @package Phorm\Builder
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
class SelectBuilder extends CompositeBuilder {

	/** @var array */
	private $selected = array();

	/**
	 * Set selectedValue.
	 *
	 * @param mixed $value
	 *
	 * @return SelectBuilder
	 */
	public function selected($value) {
		if ($value) {
			$value = is_array($value) ? $value : array($value);
			$this->selected = array_flip($value);
		}
		return $this;
	}

	/**
	 * Set autofocus.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function autofocus($value) {
		return $this->setAttribute('autofocus', $value);
	}

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
	 * Set multiple.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function multiple($value) {
		return $this->setAttribute('multiple', $value);
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
	 * Set required.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function required($value) {
		return $this->setAttribute('required', $value);
	}

	/**
	 * Set size.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function size($value) {
		return $this->setAttribute('size', $value);
	}

	/**
	 * Add option.
	 *
	 * @param OptionBuilder $option
	 *
	 * @return $this
	 */
	public function option(OptionBuilder $option) {
		return $this->addChildBuilder($option);
	}

	/**
	 * Add options.
	 *
	 * [value => content, ...]
	 *
	 * @param array $options
	 *
	 * @return $this
	 */
	public function options(array $options) {
		foreach ($options as $value => $content) {
			$option = new OptionBuilder();
			$this->option($option->value($value)->setContent($content));
		}
		return $this;
	}

	/**
	 * Add option group.
	 *
	 * @param OptgroupBuilder $optgroup
	 *
	 * @return $this
	 */
	public function optgroup(OptgroupBuilder $optgroup) {
		return $this->addChildBuilder($optgroup);
	}

	/**
	 * Build child.
	 *
	 * @param Builder $child
	 *
	 * @return Element
	 */
	protected function buildChild(Builder $child) {
		if ($child instanceof OptionBuilder) {
			if (($value = $child->getAttribute('value')) && isset($this->selected[$value])) {
				$child->selected('selected');
			}
		}
		return parent::buildChild($child);
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
			->setElementType('select');
	}
}
