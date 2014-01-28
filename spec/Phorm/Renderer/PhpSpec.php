<?php

namespace spec\Phorm\Renderer;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Phorm\Element\Composite;
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
			->setElementType('typeone');

		$element2 = new Element();
		$element2
			->setAttributes(array('name' => 'test2'))
			->setElementType('typetwo');

		$container = new Composite();
		$container
			->setAttribute('name', 'container')
			->addChild($element1)
			->addChild($element2);

		$this->render($container)->shouldReturn(
<<<EOD
<composite name="container">
	<typeone name="test1">
	<typetwo name="test2">
</composite>

EOD
		);
	}
}
