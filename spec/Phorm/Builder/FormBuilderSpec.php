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
		$this->acceptCharset('accept-charset')->shouldHaveType($this->type);
		$this->action('action')->shouldHaveType($this->type);
		$this->autocomplete('autocomplete')->shouldHaveType($this->type);
		$this->enctype('enctype')->shouldHaveType($this->type);
		$this->method('method')->shouldHaveType($this->type);
		$this->name('name')->shouldHaveType($this->type);
		$this->novalidate('novalidate')->shouldHaveType($this->type);
		$this->target('target')->shouldHaveType($this->type);

		$this->addElement($element)->shouldHaveType($this->type);

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

		$this->build($form)->shouldHaveType('Phorm\Element\Composite');
	}
}
