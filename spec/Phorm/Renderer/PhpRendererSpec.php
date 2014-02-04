<?php

namespace spec\Phorm\Renderer;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Phorm\Element\Composite;
use Phorm\Element\Element;

class PhpRendererSpec extends ObjectBehavior {
	function it_is_initializable() {
		$this->shouldHaveType('Phorm\Renderer\PhpRenderer');
		$this->shouldHaveType('Phorm\Renderer\FileRenderer');
	}

	function it_has_a_resolver() {
		$this->getResolver()->shouldHaveType('Phorm\Resolver\FileResolver');
	}

	function it_renders_elements(Composite $composite, Element $element1, Element $element2) {
		$composite->getElementType()->willReturn('composite');
		$composite->getTag()->willReturn('composite');
		$composite->getAttributes()->willReturn(array('name' => 'container'));
		$composite->getAttribute('type')->willReturn(null);
		$composite->getTemplateName()->willReturn('');
		$composite->getChildren()->willReturn(array($element1, $element2));

		$element1->getElementType()->willReturn('typeone');
		$element1->getTag()->willReturn('typeone');
		$element1->getAttributes()->willReturn(array('name' => 'test1'));
		$element1->getTemplateName()->willReturn('');
		$element1->getAttribute('type')->willReturn(null);

		$element2->getElementType()->willReturn('typetwo');
		$element2->getTag()->willReturn('typetwo');
		$element2->getAttributes()->willReturn(array('name' => 'test2'));
		$element2->getTemplateName()->willReturn('');
		$element2->getAttribute('type')->willReturn(null);

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
