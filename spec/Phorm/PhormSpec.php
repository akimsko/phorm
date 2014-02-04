<?php

namespace spec\Phorm;

use Phorm\Builder\Builder;
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

	function it_renders_element_builder(Renderer $renderer, Builder $builder, Element $element) {
		$renderer->render($element)->shouldBeCalled();
		$builder->build()->willReturn($element);
		$this->render($builder);
	}

	function it_holds_a_renderer(Renderer $renderer) {
		$this->setRenderer($renderer);
		$this->getRenderer()->shouldReturn($renderer);
	}
}
