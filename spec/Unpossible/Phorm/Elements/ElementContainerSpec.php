<?php

namespace spec\Unpossible\Phorm\Elements;

use Unpossible\Phorm\Elements\Element;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ElementContainerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Unpossible\Phorm\Elements\ElementContainer');
    }

	function it_extends_element() {
		$this->shouldHaveType('Unpossible\Phorm\Elements\Element');
	}

	function it_should_have_children() {
		$this->getChildren()->shouldBeArray();
	}

	function it_should_remove_children() {
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

	function it_should_add_children() {
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

	function it_should_store_children() {
		$this->removeAttributes();

		$child1 = new Element();
		$child2 = new Element();

		$this->setChild('test1', $child1);
		$this->getChild('test1')->shouldBeEqualTo($child1);
		$this->setChild('test2', $child2);
		$this->getChild('test2')->shouldBeEqualTo($child2);
		$this->getChildren()->shouldBeEqualTo(array('test1' => $child1, 'test2' => $child2));
	}

	function it_should_be_chainable() {
		$this->setChildren(array())->shouldHaveType('Unpossible\Phorm\Elements\ElementContainer');
		$this->addChildren(array())->shouldHaveType('Unpossible\Phorm\Elements\ElementContainer');
		$this->setChild('test', new Element())->shouldHaveType('Unpossible\Phorm\Elements\ElementContainer');
		$this->removeChildren()->shouldHaveType('Unpossible\Phorm\Elements\ElementContainer');
		$this->removeChild('test')->shouldHaveType('Unpossible\Phorm\Elements\ElementContainer');
	}
}