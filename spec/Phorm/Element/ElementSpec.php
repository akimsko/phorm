<?php

namespace spec\Phorm\Element;

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

	function it_can_have_a_template_namespace() {
		$this->getTemplateNameSpace()->shouldBeNull();
		$this->setTemplateNameSpace('template');
		$this->getTemplateNameSpace()->shouldReturn('template');
	}

	function it_can_have_a_template_name() {
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

	function it_can_have_a_title() {
		$this->getTitle()->shouldReturn(null);
		$this->setTitle('test');
		$this->getTitle()->shouldReturn('test');
	}

	function it_can_have_a_description() {
		$this->getDescription()->shouldReturn(null);
		$this->setDescription('test');
		$this->getDescription()->shouldReturn('test');
	}

	function it_can_have_an_error() {
		$this->getError()->shouldReturn(null);
		$this->setError('test');
		$this->getError()->shouldReturn('test');
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
		$this->setTitle('test')->shouldHaveType('Phorm\Element\Element');
		$this->setDescription('test')->shouldHaveType('Phorm\Element\Element');
		$this->setError('test')->shouldHaveType('Phorm\Element\Element');
	}
}
