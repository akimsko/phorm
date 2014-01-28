<?php

namespace spec\Phorm\Element;

use Phorm\Element\Element;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CompositeSpec extends ObjectBehavior {
	function it_is_initializable() {
		$this->shouldHaveType('Phorm\Element\Composite');
	}

	function it_extends_element() {
		$this->shouldHaveType('Phorm\Element\Element');
	}

	function it_has_children() {
		$this->getChildren()->shouldBeArray();
	}

	function it_removes_children() {
		$children = array(
			new Element(),
			new Element()
		);

		$this->setChildren($children);

		$this->getChildren()->shouldHaveCount(2);
		$this->getChild(0)->shouldBeEqualTo($children[0]);
		$this->removeChild(0);
		$this->getChildren()->shouldHaveCount(1);
		$this->getChild(0)->shouldBeEqualTo($children[1]);
		$this->removeChildren();
		$this->getChildren()->shouldHaveCount(0);
	}

	function it_adds_children() {
		$this->removeChildren();

		$children1 = array(
			new Element(),
			new Element()
		);

		$children2 = array(
			new Element(),
			new Element()
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

		$this->addChild($child1);
		$this->getChild(0)->shouldBeEqualTo($child1);
		$this->addChild($child2);
		$this->getChild(1)->shouldBeEqualTo($child2);
		$this->getChildren()->shouldBeEqualTo(array($child1, $child2));
	}

	function it_is_chainable() {
		$this->setChildren(array())->shouldHaveType('Phorm\Element\Composite');
		$this->addChildren(array())->shouldHaveType('Phorm\Element\Composite');
		$this->addChild(new Element())->shouldHaveType('Phorm\Element\Composite');
		$this->removeChild(0)->shouldHaveType('Phorm\Element\Composite');
		$this->removeChildren()->shouldHaveType('Phorm\Element\Composite');
	}
}
