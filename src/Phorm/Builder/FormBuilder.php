<?php

namespace Phorm\Builder;

use Phorm\Element\Composite;
use Phorm\Element\Element;
use Phorm\Exception\BuilderException;

class FormBuilder extends Builder {

	/** @var Element[] */
	private $elements = array();

	protected function getElements() {
		return $this->elements;
	}

	/**
	 * Get default element type.
	 *
	 * @return string
	 */
	protected function getDefaultElementType() {
		return 'form';
	}

	public function setAcceptCharset($acceptCharset) {
		return $this->setAttribute('accept-charset', $acceptCharset);
	}

	public function setAction($action) {
		return $this->setAttribute('action', $action);
	}

	public function setAutocomplete($autocomplete) {
		return $this->setAttribute('autocomplete', $autocomplete);
	}

	public function setEnctype($enctype) {
		return $this->setAttribute('enctype', $enctype);
	}

	public function setMethod($method) {
		return $this->setAttribute('method', $method);
	}

	public function setName($name) {
		return $this->setAttribute('name', $name);
	}

	public function setNovalidate($novalidate) {
		return $this->setAttribute('novalidate', $novalidate);
	}

	public function setTarget($target) {
		return $this->setAttribute('target', $target);
	}

	public function addElement(Element $element) {
		$this->elements[] = $element;
	}

	/**
	 * Build element.
	 *
	 * @param Composite $element
	 *
	 * @return Composite
	 *
	 * @throws BuilderException
	 */
	public function build(Composite $element = null) {
		$form = $element ? $element : new Composite();

		$form->setAttributes($this->getAttributes());
		$form->setElementType($this->getElementType());
		$form->setChildren($this->getElements());

		return $form;
	}
}
