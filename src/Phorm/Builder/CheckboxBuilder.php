<?php

namespace Phorm\Builder;

use Phorm\Element\Element;

class CheckboxBuilder extends InputBuilder {
	/**
	 * Set checked.
	 *
	 * @param string $checked
	 *
	 * @return $this
	 */
	public function setChecked($checked) {
		return $this->setAttribute('checked', $checked);
	}

	/**
	 * Build element.
	 *
	 * @param Element $element
	 *
	 * @return Element
	 */
	public function build(Element $element = null) {
		$this->setType('checkbox');
		return parent::build($element);
	}
}
