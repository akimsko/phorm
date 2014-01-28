<?php

namespace spec\Phorm\Builder;

use Phorm\Element\Element;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LabelBuilderSpec extends ObjectBehavior {
	private $type = 'Phorm\Builder\LabelBuilder';

	function it_is_initializable() {
		$this->shouldHaveType($this->type);
		$this->shouldHaveType('Phorm\Builder\Builder');
	}

	function it_builds_an_element_to_spec(Element $element) {
		$element->setElementType('label')->shouldBeCalled();
		$element->setAttributes(
			  array(
				  'for'  => 'for',
				  'form' => 'form'
			  )
		)->shouldBeCalled();

		$this->setFor('for');
		$this->setForm('form');

		$this->build($element)->shouldHaveType('Phorm\Element\Element');
	}

	function it_is_chainable() {
		$this->setFor('test')->shouldHaveType($this->type);
		$this->setForm('test')->shouldHaveType($this->type);
	}
}
