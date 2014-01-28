<?php

namespace spec\Phorm\Element;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LabelSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Phorm\Element\Label');
		$this->shouldHaveType('Phorm\Element\Element');
    }

	function it_has_tag_label() {
		$this->getElementType()->shouldReturn('label');
	}

	function it_has_for_attribute_shortcut() {
		$this->setFor('test');
		$this->getFor()->shouldReturn('test');
	}

	function it_has_form_attribute_shortcut() {
		$this->setForm('test');
		$this->getForm()->shouldReturn('test');
	}

	function it_is_chainable() {
		$this->setFor('test')->shouldHaveType('Phorm\Element\Label');
		$this->setForm('test')->shouldHaveType('Phorm\Element\Label');
	}
}
