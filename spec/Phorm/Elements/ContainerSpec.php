<?php

namespace spec\Phorm\Elements;

use Phorm\Elements\Element;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ContainerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Phorm\Elements\Container');
    }

	function it_extends_element() {
		$this->shouldHaveType('Phorm\Elements\Element');
	}

	function it_should_have_children() {
		$this->getChildren()->shouldBeArray();
	}

	function it_should_remove_children() {
		$children = array(
			'test1' => new Element('ele1'),
			'test2' => new Element('ele2')
		);

		$this->setChildren($children);

		$this->getChildren()->shouldHaveCount(2);
		$this->getChild('test1')->shouldBeEqualTo($children['test1']);
		$this->removeChild('test1');
		$this->getChildren()->shouldHaveCount(1);
		$this->getChild('test1')->shouldBeNull();
		$this->getChild('test2')->shouldBeEqualTo($children['test2']);
		$this->removeChildren();
		$this->getChildren()->shouldHaveCount(0);
	}

	function it_should_add_children() {
		$this->removeChildren();

		$children1 = array(
			'test1' => new Element('ele1'),
			'test2' => new Element('ele2')
		);

		$children2 = array(
			'test3' => new Element('ele3'),
			'test4' => new Element('ele4')
		);

		$this->addChildren($children1);
		$this->getChildren()->shouldBeEqualTo($children1);
		$this->addChildren($children2);
		$this->getChildren()->shouldBeEqualTo(array_merge($children1, $children2));
	}

	function it_should_store_children() {
		$this->removeAttributes();

		$child1 = new Element('ele1');
		$child2 = new Element('ele2');

		$this->setChild('test1', $child1);
		$this->getChild('test1')->shouldBeEqualTo($child1);
		$this->setChild('test2', $child2);
		$this->getChild('test2')->shouldBeEqualTo($child2);
		$this->getChildren()->shouldBeEqualTo(array('test1' => $child1, 'test2' => $child2));
	}

	function it_should_be_chainable() {
		$this->setChildren(array())->shouldHaveType('Phorm\Elements\Container');
		$this->addChildren(array())->shouldHaveType('Phorm\Elements\Container');
		$this->setChild('test', new Element())->shouldHaveType('Phorm\Elements\Container');
		$this->removeChildren()->shouldHaveType('Phorm\Elements\Container');
		$this->removeChild('test')->shouldHaveType('Phorm\Elements\Container');
	}
}
