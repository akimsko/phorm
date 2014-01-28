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

		$this->setAutocomplete('autocomplete');
		$this->setAutofocus('autofocus');
		$this->setDisabled('disabled');
		$this->setForm('form');
		$this->setFormnovalidate('formnovalidate');
		$this->setList('list');
		$this->setMax('max');
		$this->setMaxlength('maxlength');
		$this->setMin('min');
		$this->setMultiple('multiple');
		$this->setName('name');
		$this->setPattern('pattern');
		$this->setPlaceholder('placeholder');
		$this->setReadonly('readonly');
		$this->setRequired('required');
		$this->setSize('size');
		$this->setStep('step');
		$this->setType('type');
		$this->setValue('value');


		$this->build($element)->shouldHaveType('Phorm\Element\Element');
	}

	function it_is_chainable() {
		$this->setAutocomplete('autocomplete')->shouldHaveType($this->type);
		$this->setAutofocus('autofocus')->shouldHaveType($this->type);
		$this->setDisabled('disabled')->shouldHaveType($this->type);
		$this->setForm('form')->shouldHaveType($this->type);
		$this->setFormnovalidate('formnovalidate')->shouldHaveType($this->type);
		$this->setList('list')->shouldHaveType($this->type);
		$this->setMax('max')->shouldHaveType($this->type);
		$this->setMaxlength('maxlength')->shouldHaveType($this->type);
		$this->setMin('min')->shouldHaveType($this->type);
		$this->setMultiple('multiple')->shouldHaveType($this->type);
		$this->setName('name')->shouldHaveType($this->type);
		$this->setPattern('pattern')->shouldHaveType($this->type);
		$this->setPlaceholder('placeholder')->shouldHaveType($this->type);
		$this->setReadonly('readonly')->shouldHaveType($this->type);
		$this->setRequired('required')->shouldHaveType($this->type);
		$this->setSize('size')->shouldHaveType($this->type);
		$this->setStep('step')->shouldHaveType($this->type);
		$this->setType('type')->shouldHaveType($this->type);
		$this->setValue('value')->shouldHaveType($this->type);
	}
}
