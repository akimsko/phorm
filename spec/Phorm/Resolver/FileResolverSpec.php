<?php

namespace spec\Phorm\Resolver;

use Phorm\Element\Element;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FileResolverSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Phorm\Resolver\FileResolver');
		$this->shouldHaveType('Phorm\Resolver\Resolver');
    }

	function it_maps_keys_to_templates() {
		$this->registerTemplate('test1', 'testTemplate1');
		$this->getTemplate('test1')->shouldBeEqualTo('testTemplate1');
		$this->registerTemplate('test2', 'testTemplate2');
		$this->getTemplate('test2')->shouldBeEqualTo('testTemplate2');
	}

	function it_resolves_template_for_elementtype(Element $element) {
		$element->getElementType()->willReturn('testtype');
		$element->getAttribute('type')->willReturn(null);
		$element->getTemplateName()->willReturn(null);
		$this->resolveFilename($element)->shouldReturn('testtype');
		$this->getTemplateForElement($element)->shouldBeNull();
	}

	function it_resolves_template_for_elementtype_with_type(Element $element) {
		$element->getElementType()->willReturn('testtype');
		$element->getAttribute('type')->willReturn('subtype');
		$element->getTemplateName()->willReturn(null);
		$this->resolveFilename($element)->shouldReturn('testtype_subtype');
		$this->getTemplateForElement($element)->shouldBeNull();
	}

	function it_overrides_convention(Element $element) {
		$this->registerTemplate('testtype', 'testTemplate1');
		$element->getElementType()->willReturn('testtype');
		$element->getAttribute('type')->willReturn(null);
		$element->getTemplateName()->willReturn(null);
		$this->resolveFilename($element)->shouldReturn('testTemplate1');

		$this->registerTemplate('testtype_subtype', 'testTemplate2');
		$element->getElementType()->willReturn('testtype');
		$element->getAttribute('type')->willReturn('subtype');
		$element->getTemplateName()->willReturn(null);
		$this->resolveFilename($element)->shouldReturn('testTemplate2');
	}

	function it_overrides_template_name(Element $element) {
		$this->registerTemplate('testtype', 'testTemplate1');
		$element->getElementType()->willReturn('testtype');
		$element->getAttribute('type')->willReturn(null);
		$element->getTemplateName()->willReturn('testTemplate1');
		$this->resolveFilename($element)->shouldReturn('testTemplate1');

		$this->registerTemplate('testtype_subtype', 'testTemplate2');
		$element->getElementType()->willReturn('testtype');
		$element->getAttribute('type')->willReturn('subtype');
		$element->getTemplateName()->willReturn('testTemplate2');
		$this->resolveFilename($element)->shouldReturn('testTemplate2');
	}
}
