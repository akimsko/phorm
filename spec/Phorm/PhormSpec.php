<?php

namespace spec\Phorm;

use Phorm\Element\Element;
use Phorm\Renderer\Renderer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PhormSpec extends ObjectBehavior {
	function let(Renderer $renderer) {
		$this->beConstructedWith($renderer);
	}

	function it_is_initializable() {
		$this->shouldHaveType('Phorm\Phorm');
	}

	function it_registers_builders_as_methods() {
		$this->registerBuilder('label', 'Phorm\Builder\LabelBuilder');
		$this->label()->shouldHaveType('Phorm\Builder\LabelBuilder');
	}

	function it_throws_exception_if_builder_not_registered() {
		$this->shouldThrow('Phorm\Exception\PhormException')->duringTestInvalid();
	}

	function it_renders_elements(Renderer $renderer, Element $element) {
		$renderer->render($element)->shouldBeCalled();
		$this->render($element);
	}

	function it_holds_a_renderer(Renderer $renderer) {
		$this->setRenderer($renderer);
		$this->getRenderer()->shouldReturn($renderer);
	}
}
