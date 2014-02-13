<?php

namespace spec\Phorm\Builder;

use Phorm\Element\Content;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TextareaBuilderSpec extends ObjectBehavior {
	private $type = 'Phorm\Builder\TextareaBuilder';

	function it_is_initializable() {
		$this->shouldHaveType($this->type);
		$this->shouldHaveType('Phorm\Builder\ContentBuilder');
	}

	function it_builds_to_spec(Content $content) {

		$this->autofocus('autofocus')->shouldHaveType($this->type);
		$this->cols('cols')->shouldHaveType($this->type);
		$this->disabled('disabled')->shouldHaveType($this->type);
		$this->form('form')->shouldHaveType($this->type);
		$this->maxlength('maxlength')->shouldHaveType($this->type);
		$this->name('name')->shouldHaveType($this->type);
		$this->placeholder('placeholder')->shouldHaveType($this->type);
		$this->readonly('readonly')->shouldHaveType($this->type);
		$this->required('required')->shouldHaveType($this->type);
		$this->rows('rows')->shouldHaveType($this->type);
		$this->wrap('wrap')->shouldHaveType($this->type);
		$this->setContent('test')->shouldHaveType($this->type);

		$content->setElementType('textarea')->shouldBeCalled()->willReturn($content);
		$content->setTemplateNameSpace(null)->shouldBeCalled()->willReturn($content);
		$content->setContent('test')->shouldBeCalled()->willReturn($content);

		$content->setAttributes(
				array(
					 'autofocus'   => 'autofocus',
					 'cols'        => 'cols',
					 'disabled'    => 'disabled',
					 'form'        => 'form',
					 'maxlength'   => 'maxlength',
					 'name'        => 'name',
					 'placeholder' => 'placeholder',
					 'readonly'    => 'readonly',
					 'required'    => 'required',
					 'rows'        => 'rows',
					 'wrap'        => 'wrap',
				)
		)->shouldBeCalled()->willReturn($content);

		$this->build($content)->shouldHaveType('Phorm\Element\Content');
	}
}
