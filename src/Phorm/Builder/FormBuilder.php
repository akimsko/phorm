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
use Phorm\Exception\BuilderException;

/**
 * Class FormBuilder
 *
 * @package Phorm\Builder
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
class FormBuilder extends Builder {

	/** @var Element[] */
	private $elements = array();

	protected function getElements() {
		return $this->elements;
	}

	/**
	 * Set accept-charset.
	 *
	 * @param string $acceptCharset
	 *
	 * @return $this
	 */
	public function setAcceptCharset($acceptCharset) {
		return $this->setAttribute('accept-charset', $acceptCharset);
	}

	/**
	 * Set action.
	 *
	 * @param string $action
	 *
	 * @return $this
	 */
	public function setAction($action) {
		return $this->setAttribute('action', $action);
	}

	/**
	 * Set autocomplete.
	 *
	 * @param string $autocomplete
	 *
	 * @return $this
	 */
	public function setAutocomplete($autocomplete) {
		return $this->setAttribute('autocomplete', $autocomplete);
	}

	/**
	 * Set enctype.
	 *
	 * @param string $enctype
	 *
	 * @return $this
	 */
	public function setEnctype($enctype) {
		return $this->setAttribute('enctype', $enctype);
	}

	/**
	 * Set method.
	 *
	 * @param string $method
	 *
	 * @return $this
	 */
	public function setMethod($method) {
		return $this->setAttribute('method', $method);
	}

	/**
	 * Set name.
	 *
	 * @param string $name
	 *
	 * @return $this
	 */
	public function setName($name) {
		return $this->setAttribute('name', $name);
	}

	/**
	 * Set novalidate.
	 *
	 * @param string $novalidate
	 *
	 * @return $this
	 */
	public function setNovalidate($novalidate) {
		return $this->setAttribute('novalidate', $novalidate);
	}

	/**
	 * Set target.
	 *
	 * @param string $target
	 *
	 * @return $this
	 */
	public function setTarget($target) {
		return $this->setAttribute('target', $target);
	}

	/**
	 * Add element.
	 *
	 * @param Element $element
	 *
	 * @return $this
	 */
	public function addElement(Element $element) {
		$this->elements[] = $element;
		return $this;
	}

	/**
	 * Build element.
	 *
	 * @param Element $element
	 *
	 * @return Composite
	 *
	 * @throws BuilderException
	 */
	public function build(Element $element = null) {
		$form = $element ? $element : new Composite();

		if (!$element instanceof Composite) {
			throw new BuilderException('This builder can only build composites.');
		}

		$form->setElementType('form');
		$form->setAttributes($this->getAttributes());
		$form->setChildren($this->getElements());

		return $form;
	}
}
