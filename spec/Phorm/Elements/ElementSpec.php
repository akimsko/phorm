<?php

namespace spec\Phorm\Elements;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ElementSpec extends ObjectBehavior {
	function let() {
		$this->beConstructedWith(array('cTest1' => 'cTest1', 'cTest2' => 'cTest2'));
		$this->setType('cTest');
	}

	function it_is_initializable() {
		$this->shouldHaveType('Phorm\Elements\Element');
	}

	function it_should_have_a_type() {
		$this->getType()->shouldBeEqualTo('cTest');
		$this->setType('test');
		$this->getType()->shouldBeEqualTo('test');
	}

	function it_should_have_attributes() {
		$this->getAttributes()->shouldBeEqualTo(array('cTest1' => 'cTest1', 'cTest2' => 'cTest2'));
	}

	function it_should_replace_attributes() {
		$attributes = array(
			'test1' => 'test1',
			'test2' => 'test2'
		);

		$this->setAttributes($attributes);
		$this->getAttributes()->shouldBeEqualTo($attributes);
	}

	function it_should_remove_attributes() {
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

	function it_should_add_attributes() {
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

	function it_should_store_attribute() {
		$this->removeAttributes();

		$this->setAttribute('test1', 'test1');
		$this->getAttribute('test1')->shouldBeEqualTo('test1');
		$this->setAttribute('test2', 'test2');
		$this->getAttribute('test1')->shouldBeEqualTo('test1');
		$this->getAttributes()->shouldBeEqualTo(array('test1' => 'test1', 'test2' => 'test2'));
	}

	function it_should_be_chainable() {
		$this->setType('test')->shouldHaveType('Phorm\Elements\Element');
		$this->setAttribute('test', 'test')->shouldHaveType('Phorm\Elements\Element');
		$this->setAttributes(array())->shouldHaveType('Phorm\Elements\Element');
		$this->addAttributes(array())->shouldHaveType('Phorm\Elements\Element');
		$this->removeAttribute('test')->shouldHaveType('Phorm\Elements\Element');
		$this->removeAttributes()->shouldHaveType('Phorm\Elements\Element');
	}
}
