<?php

namespace spec\Phorm\Builder;

use Phorm\Element\Content;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ButtonBuilderSpec extends ObjectBehavior {
	private $type = 'Phorm\Builder\ButtonBuilder';

	function it_is_initializable() {
		$this->shouldHaveType($this->type);
		$this->shouldHaveType('Phorm\Builder\ContentBuilder');
	}

	function it_builds_to_spec(Content $content) {
		$this->autofocus('autofocus')->shouldHaveType($this->type);
		$this->disabled('disabled')->shouldHaveType($this->type);
		$this->form('form')->shouldHaveType($this->type);
		$this->name('name')->shouldHaveType($this->type);
		$this->type('type')->shouldHaveType($this->type);
		$this->value('value')->shouldHaveType($this->type);
		$this->formaction('formaction')->shouldHaveType($this->type);
		$this->formenctype('formenctype')->shouldHaveType($this->type);
		$this->formmethod('formmethod')->shouldHaveType($this->type);
		$this->formnovalidate('formnovalidate')->shouldHaveType($this->type);
		$this->formtarget('formtarget')->shouldHaveType($this->type);


		$this->setContent('test')->shouldHaveType($this->type);

		$content->setElementType('button')->shouldBeCalled()->willReturn($content);
		$content->setTemplateNameSpace(null)->shouldBeCalled()->willReturn($content);
		$content->setContent('test')->shouldBeCalled()->willReturn($content);
		$content->setAttributes(
				array(
					 'autofocus'      => 'autofocus',
					 'disabled'       => 'disabled',
					 'form'           => 'form',
					 'name'           => 'name',
					 'type'           => 'type',
					 'value'          => 'value',
					 'formaction'     => 'formaction',
					 'formenctype'    => 'formenctype',
					 'formmethod'     => 'formmethod',
					 'formnovalidate' => 'formnovalidate',
					 'formtarget'     => 'formtarget',
				)
		)->shouldBeCalled()->willReturn($content);

		$this->build($content)->shouldHaveType('Phorm\Element\Element');
	}
}
