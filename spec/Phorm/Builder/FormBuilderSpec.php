<?php

namespace spec\Phorm\Builder;

use Phorm\Builder\Builder;
use Phorm\Element\Composite;
use Phorm\Element\Element;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FormBuilderSpec extends ObjectBehavior {
	private $type = 'Phorm\Builder\FormBuilder';

	function it_is_initializable() {
		$this->shouldHaveType($this->type);
		$this->shouldHaveType('Phorm\Builder\CompositeBuilder');
	}

	function it_builds_to_spec(Composite $form, Builder $builder, Element $element) {
		$this->acceptCharset('accept-charset')->shouldHaveType($this->type);
		$this->action('action')->shouldHaveType($this->type);
		$this->autocomplete('autocomplete')->shouldHaveType($this->type);
		$this->enctype('enctype')->shouldHaveType($this->type);
		$this->method('method')->shouldHaveType($this->type);
		$this->name('name')->shouldHaveType($this->type);
		$this->novalidate('novalidate')->shouldHaveType($this->type);
		$this->target('target')->shouldHaveType($this->type);

		$this->addElement($builder)->shouldHaveType($this->type);

		$form->setElementType('form')->shouldBeCalled()->willReturn($form);
		$form->addChild($element)->shouldBeCalled()->willReturn($form);
		$form->setTemplateNameSpace(null)->shouldBeCalled()->willReturn($form);
		$form->setTitle(null)->shouldBeCalled()->willReturn($form);
		$form->setDescription(null)->shouldBeCalled()->willReturn($form);
		$form->setError(null)->shouldBeCalled()->willReturn($form);
		$form->setExtras(array())->shouldBeCalled()->willReturn($form);

		$form->setAttributes(
			 array(
				 'accept-charset' => 'accept-charset',
				 'action'         => 'action',
				 'autocomplete'   => 'autocomplete',
				 'enctype'        => 'enctype',
				 'method'         => 'method',
				 'name'           => 'name',
				 'novalidate'     => 'novalidate',
				 'target'         => 'target'
			 )
		)->shouldBeCalled()->willReturn($form);

		$builder->build()->shouldBecalled()->willReturn($element);
		$builder->setTemplateNamespace(null)->shouldBecalled()->willReturn($element);

		$this->build($form)->shouldHaveType('Phorm\Element\Composite');
	}
}
