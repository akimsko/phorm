<?php

namespace spec\Phorm\Builder;

use Phorm\Element\Element;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InputBuilderSpec extends ObjectBehavior {
	private $type = 'Phorm\Builder\InputBuilder';

	function it_is_initializable() {
		$this->shouldHaveType($this->type);
		$this->shouldHaveType('Phorm\Builder\Builder');
	}

	function it_builds_an_element_to_spec(Element $element) {
		$this->autocomplete('autocomplete')->shouldHaveType($this->type);
		$this->autofocus('autofocus')->shouldHaveType($this->type);
		$this->disabled('disabled')->shouldHaveType($this->type);
		$this->form('form')->shouldHaveType($this->type);
		$this->formnovalidate('formnovalidate')->shouldHaveType($this->type);
		$this->list_('list')->shouldHaveType($this->type);
		$this->max('max')->shouldHaveType($this->type);
		$this->maxlength('maxlength')->shouldHaveType($this->type);
		$this->min('min')->shouldHaveType($this->type);
		$this->multiple('multiple')->shouldHaveType($this->type);
		$this->name('name')->shouldHaveType($this->type);
		$this->pattern('pattern')->shouldHaveType($this->type);
		$this->placeholder('placeholder')->shouldHaveType($this->type);
		$this->readonly('readonly')->shouldHaveType($this->type);
		$this->required('required')->shouldHaveType($this->type);
		$this->size('size')->shouldHaveType($this->type);
		$this->step('step')->shouldHaveType($this->type);
		$this->type('type')->shouldHaveType($this->type);
		$this->value('value')->shouldHaveType($this->type);

		$element->setElementType('input')->shouldBeCalled();
		$element->setAttributes(
				array(
					'autocomplete'   => 'autocomplete',
					'autofocus'      => 'autofocus',
					'disabled'       => 'disabled',
					'form'           => 'form',
					'formnovalidate' => 'formnovalidate',
					'list'           => 'list',
					'max'            => 'max',
					'maxlength'      => 'maxlength',
					'min'            => 'min',
					'multiple'       => 'multiple',
					'name'           => 'name',
					'pattern'        => 'pattern',
					'placeholder'    => 'placeholder',
					'readonly'       => 'readonly',
					'required'       => 'required',
					'size'           => 'size',
					'step'           => 'step',
					'type'           => 'type',
					'value'          => 'value',
				)
		)->shouldBeCalled();


		$this->build($element)->shouldHaveType('Phorm\Element\Element');
	}
}
