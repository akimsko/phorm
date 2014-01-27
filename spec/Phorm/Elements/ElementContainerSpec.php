<?php

namespace spec\Phorm\Elements;

use Phorm\Elements\Element;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ElementContainerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Phorm\Elements\ElementContainer');
    }

	function it_extends_element() {
		$this->shouldHaveType('Phorm\Elements\Element');
	}

	function it_has_children() {
		$this->getChildren()->shouldBeArray();
	}

	function it_removes_children() {
		$children = array(
			'test1' => new Element(),
			'test2' => new Element()
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

	function it_adds_children() {
		$this->removeChildren();

		$children1 = array(
			'test1' => new Element(),
			'test2' => new Element()
		);

		$children2 = array(
			'test3' => new Element(),
			'test4' => new Element()
		);

		$this->addChildren($children1);
		$this->getChildren()->shouldBeEqualTo($children1);
		$this->addChildren($children2);
		$this->getChildren()->shouldBeEqualTo(array_merge($children1, $children2));
	}

	function it_stores_children() {
		$this->removeAttributes();

		$child1 = new Element();
		$child2 = new Element();

		$this->setChild('test1', $child1);
		$this->getChild('test1')->shouldBeEqualTo($child1);
		$this->setChild('test2', $child2);
		$this->getChild('test2')->shouldBeEqualTo($child2);
		$this->getChildren()->shouldBeEqualTo(array('test1' => $child1, 'test2' => $child2));
	}

	function it_is_chainable() {
		$this->setChildren(array())->shouldHaveType('Phorm\Elements\ElementContainer');
		$this->addChildren(array())->shouldHaveType('Phorm\Elements\ElementContainer');
		$this->setChild('test', new Element())->shouldHaveType('Phorm\Elements\ElementContainer');
		$this->removeChildren()->shouldHaveType('Phorm\Elements\ElementContainer');
		$this->removeChild('test')->shouldHaveType('Phorm\Elements\ElementContainer');
	}
}
