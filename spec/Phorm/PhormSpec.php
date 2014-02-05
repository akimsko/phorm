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
		$this->registerBuilder('test', 'Phorm\Builder\LabelBuilder');
		$this->test()->shouldHaveType('Phorm\Builder\LabelBuilder');
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

	function it_has_all_base_builders() {
		$this->button()->shouldHaveType('Phorm\Builder\ButtonBuilder');
		$this->datalist()->shouldHaveType('Phorm\Builder\DatalistBuilder');
		$this->fieldset()->shouldHaveType('Phorm\Builder\FieldsetBuilder');
		$this->form()->shouldHaveType('Phorm\Builder\FormBuilder');
		$this->input()->shouldHaveType('Phorm\Builder\InputBuilder');
		$this->keygen()->shouldHaveType('Phorm\Builder\KeygenBuilder');
		$this->label()->shouldHaveType('Phorm\Builder\LabelBuilder');
		$this->legend()->shouldHaveType('Phorm\Builder\LegendBuilder');
		$this->optgroup()->shouldHaveType('Phorm\Builder\OptgroupBuilder');
		$this->option()->shouldHaveType('Phorm\Builder\OptionBuilder');
		$this->output()->shouldHaveType('Phorm\Builder\OutputBuilder');
		$this->select()->shouldHaveType('Phorm\Builder\SelectBuilder');
		$this->textarea()->shouldHaveType('Phorm\Builder\TextareaBuilder');
	}
}
