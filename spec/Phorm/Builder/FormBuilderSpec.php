<?php

namespace spec\Phorm\Builder;

use Phorm\Element\Composite;
use Phorm\Element\Element;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FormBuilderSpec extends ObjectBehavior {
	private $type = 'Phorm\Builder\FormBuilder';

	function it_is_initializable() {
		$this->shouldHaveType($this->type);
		$this->shouldHaveType('Phorm\Builder\Builder');
	}

	function it_builds_a_form_to_spec(Composite $form, Element $element) {
		$form->setElementType('form')->shouldBeCalled();
		$form->setChildren(array($element))->shouldBeCalled();
		$form->setAttributes(
			array(
				'accept-charset' => 'accept-charset',
				'action'         => 'action',
				'autocomplete'   => 'autocomplete',
				'enctype'        => 'enctype',
				'method'         => 'method',
				'name'           => 'name',
				'novalidate'     => 'novalidate',
				'target'         => 'target'
			)
		)->shouldBeCalled();

		$this->setAcceptCharset('accept-charset');
		$this->setAction('action');
		$this->setAutocomplete('autocomplete');
		$this->setEnctype('enctype');
		$this->setMethod('method');
		$this->setName('name');
		$this->setNovalidate('novalidate');
		$this->setTarget('target');

		$this->addElement($element);

		$this->build($form)->shouldHaveType('Phorm\Element\Composite');
	}

	function it_is_chainable(Element $element) {
		$this->setAcceptCharset('accept-charset')->shouldHaveType($this->type);
		$this->setAction('action')->shouldHaveType($this->type);
		$this->setAutocomplete('autocomplete')->shouldHaveType($this->type);
		$this->setEnctype('enctype')->shouldHaveType($this->type);
		$this->setMethod('method')->shouldHaveType($this->type);
		$this->setName('name')->shouldHaveType($this->type);
		$this->setNovalidate('novalidate')->shouldHaveType($this->type);
		$this->setTarget('target')->shouldHaveType($this->type);
		$this->addElement($element)->shouldHaveType($this->type);
	}

}
