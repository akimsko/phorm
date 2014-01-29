<?php

namespace spec\Phorm\Renderer;

use Phorm\Element\Composite;
use Phorm\Element\Element;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TemplateResolverSpec extends ObjectBehavior {
	function it_is_initializable() {
		$this->shouldHaveType('Phorm\Renderer\TemplateResolver');
	}

	function it_maps_keys_to_templates() {
		$this->registerTemplate('test1', 'testTemplate1');
		$this->getTemplate('test1')->shouldBeEqualTo('testTemplate1');
		$this->registerTemplate('test2', 'testTemplate2');
		$this->getTemplate('test2')->shouldBeEqualTo('testTemplate2');
	}

	function it_resolves_template_for_nearest_parent() {
		$element = new Composite();
		$this->registerTemplate('element', 'test');
		$this->getTemplateForElement($element)->shouldReturn('test');
	}

	function it_resolves_template_for_type(Element $element) {
		$element->getElementType()->willReturn('testtype');
		$this->registerTemplate('testtype', 'testtype');
		$this->getTemplateForElement($element)->shouldReturn('testtype');
	}

	function it_gives_null_if_no_template_is_found(Element $element) {
		$this->getTemplateForElement($element)->shouldBeNull();
	}

	function it_is_chainable() {
		$this->registerTemplate('test', 'test')->shouldHaveType('Phorm\Renderer\TemplateResolver');
	}
}
