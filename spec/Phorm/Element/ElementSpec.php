<?php

namespace spec\Phorm\Element;

use Phorm\Element\Element;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ElementSpec extends ObjectBehavior {
	function let() {
		$this->setAttributes(array('cTest1' => 'cTest1', 'cTest2' => 'cTest2'));
		$this->setElementType('cTest');
	}

	function it_is_initializable() {
		$this->shouldHaveType('Phorm\Element\Element');
	}

	function it_has_a_type() {
		$this->getElementType()->shouldBeEqualTo('cTest');
		$this->setElementType('test');
		$this->getElementType()->shouldBeEqualTo('test');
	}

	function it_can_have_a_tag() {
		$this->getTag()->shouldReturn('cTest');
		$this->setTag('test');
		$this->getTag()->shouldReturn('test');
	}

	function it_can_have_template_name() {
		$this->getTemplateName()->shouldBeNull();
		$this->setTemplateName('template');
		$this->getTemplateName()->shouldReturn('template');
	}

	function it_has_attributes() {
		$this->getAttributes()->shouldBeEqualTo(array('cTest1' => 'cTest1', 'cTest2' => 'cTest2'));
	}

	function it_replaces_attributes() {
		$attributes = array(
			'test1' => 'test1',
			'test2' => 'test2'
		);

		$this->setAttributes($attributes);
		$this->getAttributes()->shouldBeEqualTo($attributes);
	}

	function it_removes_attributes() {
		$this->setAttributes(
			 array(
				 'test1' => 'test1',
				 'test2' => 'test2'
			 )
		);

		$this->removeAttribute('test1');
		$this->getAttribute('test1')->shouldBeNull();
		$this->getAttribute('test2')->shouldBeEqualTo('test2');

		$this->removeAttributes();
		$this->getAttributes()->shouldHaveCount(0);
	}

	function it_adds_attributes() {
		$this->removeAttributes();

		$attributes1 = array(
			'test1' => 'test1',
			'test2' => 'test2'
		);

		$attributes2 = array(
			'test3' => 'test3',
			'test4' => 'test4'
		);

		$this->addAttributes($attributes1);
		$this->getAttributes()->shouldBeEqualTo($attributes1);

		$this->addAttributes($attributes2);
		$this->getAttributes()->shouldBeEqualTo(array_merge($attributes1, $attributes2));
	}

	function it_holds_attribute() {
		$this->removeAttributes();

		$this->setAttribute('test1', 'test1');
		$this->getAttribute('test1')->shouldBeEqualTo('test1');
		$this->setAttribute('test2', 'test2');
		$this->getAttribute('test1')->shouldBeEqualTo('test1');
		$this->getAttributes()->shouldBeEqualTo(array('test1' => 'test1', 'test2' => 'test2'));
	}

	function it_holds_extras() {
		$this->setExtras(array('test' => 'test'));
		$this->getExtra('test')->shouldReturn('test');
		$this->setExtra('test2', 'test2');
		$this->getExtra('test2')->shouldReturn('test2');
		$this->getExtra('nothing')->shouldBeNull();
		$this->getExtras()->shouldReturn(array('test' => 'test', 'test2' => 'test2'));
	}

	function it_holds_a_label(Element $label) {
		$this->setLabel($label);
		$this->getLabel()->shouldReturn($label);
	}

	function it_can_mark_label_as_after(Element $label) {
		$this->isLabelAfter()->shouldReturn(false);
		$this->setLabel($label, true);
		$this->isLabelAfter()->shouldReturn(true);
	}

	function it_is_chainable() {
		$this->setElementType('test')->shouldHaveType('Phorm\Element\Element');
		$this->setAttribute('test', 'test')->shouldHaveType('Phorm\Element\Element');
		$this->setAttributes(array())->shouldHaveType('Phorm\Element\Element');
		$this->addAttributes(array())->shouldHaveType('Phorm\Element\Element');
		$this->removeAttribute('test')->shouldHaveType('Phorm\Element\Element');
		$this->removeAttributes()->shouldHaveType('Phorm\Element\Element');
		$this->setExtras(array())->shouldHaveType('Phorm\Element\Element');
		$this->setExtra('test', 'test')->shouldHaveType('Phorm\Element\Element');
	}
}
