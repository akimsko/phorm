<?php

namespace spec\Phorm\Renderer;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Phorm\Element\Container;
use Phorm\Element\Element;

class PhpSpec extends ObjectBehavior {
	function it_is_initializable() {
		$this->shouldHaveType('Phorm\Renderer\Php');
		$this->shouldHaveType('Phorm\Renderer\Template');
	}

	function it_should_map_types_to_templates() {
		$this->setTemplate('test1', 'testTemplate1');
		$this->getTemplate('test1')->shouldBeEqualTo('testTemplate1');
		$this->setTemplate('test2', 'testTemplate2');
		$this->getTemplate('test2')->shouldBeEqualTo('testTemplate2');
	}

	function it_should_have_a_default_template() {
		$this->getTemplate('somethingNotMapped')->shouldBeLike(true);
	}

	function it_renders_elements() {
		$element1 = new Element();
		$element1
			->setAttributes(array('name' => 'test1'))
			->setType('typeone');

		$element2 = new Element();
		$element2
			->setAttributes(array('name' => 'test2'))
			->setType('typetwo');

		$container = new Container();
		$container
			->setAttributes(array('name' => 'container'))
			->setChild('child1', $element1)
			->setChild('child2', $element2);

		$this->render($container)->shouldReturn(
<<<EOD
<container name="container">
	<typeone name="test1">
	<typetwo name="test2">
</container>

EOD
		);
	}
}