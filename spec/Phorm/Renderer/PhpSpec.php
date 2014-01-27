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
