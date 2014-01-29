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

	function it_renders_elements(Composite $composite, Element $element1, Element $element2) {
		$composite->getElementType()->willReturn('composite');
		$composite->getAttributes()->willReturn(array('name' => 'container'));
		$composite->getChildren()->willReturn(array($element1, $element2));

		$element1->getElementType()->willReturn('typeone');
		$element1->getAttributes()->willReturn(array('name' => 'test1'));

		$element2->getElementType()->willReturn('typetwo');
		$element2->getAttributes()->willReturn(array('name' => 'test2'));

		$this->render($composite)->shouldReturn(
<<<EOD
<composite name="container">
	<typeone name="test1">
	<typetwo name="test2">
</composite>

EOD
		);
	}
}
