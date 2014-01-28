<?php

namespace spec\Phorm\Builder;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FormBuilderSpec extends ObjectBehavior {
	function it_is_initializable() {
		$this->shouldHaveType('Phorm\Builder\FormBuilder');
		$this->shouldImplement('Phorm\Builder\Builder');
	}

	function it_builds_a_form() {
		$this->build()->shouldHaveType('Phorm\Element\Composite');
	}

	function it_has_attribute_shorcut_setters() {
		$this->setAcceptCharset('accept-charset');
		$this->setAction('action');
		$this->setAutocomplete('autocomplete');
		$this->setEnctype('enctype');
		$this->setMethod('method');
		$this->setName('name');
		$this->setNovalidate('novalidate');
		$this->setTarget('target');

		$this->getAttributes()->shouldReturn(
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
		);
	}

	function it_can_override_elementtype() {
		$this->getElementType()->shouldReturn('form');
		$this->setElementType('test');
		$this->getElementType()->shouldReturn('test');
	}
}
