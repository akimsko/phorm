<?php

/*
 * This file is part of the Phorm project.
 *
 * @link https://github.com/akimsko/phorm
 *
 * @copyright Copyright 2014 Bo Thinggaard
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Phorm;

use Phorm\Builder\Builder;
use Phorm\Exception\PhormException;
use Phorm\Renderer\Renderer;

/**
 * Class Phorm
 *
 * @package Phorm
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 *
 * @method \Phorm\Builder\CheckboxBuilder checkbox() Build a checkbox element.
 * @method \Phorm\Builder\FieldsetBuilder fieldset() Build a fieldset element.
 * @method \Phorm\Builder\FileBuilder file() Build a file element.
 * @method \Phorm\Builder\FormBuilder form() Build a form.
 * @method \Phorm\Builder\ImageBuilder image() Build an image element.
 * @method \Phorm\Builder\InputBuilder input() Build an input element.
 * @method \Phorm\Builder\KeygenBuilder keygen() Build a keygen element.
 * @method \Phorm\Builder\LabelBuilder label() Build a label element.
 * @method \Phorm\Builder\LegendBuilder legend() Build a legend element.
 * @method \Phorm\Builder\OptgroupBuilder optgroup() Build an optgroup element.
 * @method \Phorm\Builder\OptionBuilder option() Build an option element.
 * @method \Phorm\Builder\RadioBuilder radio() Build a radio element.
 * @method \Phorm\Builder\SelectBuilder select() Build a select element.
 * @method \Phorm\Builder\TextareaBuilder textarea() Build a textarea element.
 */
class Phorm {

	/** @var Renderer */
	private $renderer;

	/** @var array type => builder class map. */
	private $builders = array(
		'checkbox' => 'Phorm\Builder\CheckboxBuilder',
		'fieldset' => 'Phorm\Builder\FieldsetBuilder',
		'file'     => 'Phorm\Builder\FileBuilder',
		'form'     => 'Phorm\Builder\FormBuilder',
		'image'    => 'Phorm\Builder\ImageBuilder',
		'input'    => 'Phorm\Builder\InputBuilder',
		'keygen'   => 'Phorm\Builder\KeygenBuilder',
		'label'    => 'Phorm\Builder\LabelBuilder',
		'legend'   => 'Phorm\Builder\LegendBuilder',
		'optgroup' => 'Phorm\Builder\OptgroupBuilder',
		'option'   => 'Phorm\Builder\OptionBuilder',
		'radio'    => 'Phorm\Builder\RadioBuilder',
		'select'   => 'Phorm\Builder\SelectBuilder',
		'textarea' => 'Phorm\Builder\TextareaBuilder',
	);

	/**
	 * @param Renderer $renderer
	 */
	public function __construct(Renderer $renderer) {
		$this->setRenderer($renderer);
	}

	/**
	 * Set renderer.
	 *
	 * @param Renderer $renderer
	 *
	 * @return $this
	 */
	public function setRenderer(Renderer $renderer) {
		$this->renderer = $renderer;
		return $this;
	}

	/**
	 * Get renderer.
	 *
	 * @return Renderer
	 */
	public function getRenderer() {
		return $this->renderer;
	}

	/**
	 * Register a builder.
	 *
	 * @param string $type
	 * @param string $class Fully qualified class name.
	 *
	 * @return $this
	 */
	public function registerBuilder($type, $class) {
		$this->builders[$type] = $class;
		return $this;
	}

	/**
	 * Magic builder caller.
	 *
	 * @param string $name
	 * @param array  $arguments
	 *
	 * @return \Phorm\Builder\Builder
	 *
	 * @throws Exception\PhormException
	 */
	public function __call($name, array $arguments) {
		if (!isset($this->builders[$name]) || !class_exists($this->builders[$name])) {
			throw new PhormException("No builder registered for '$name', or builder class not found.");
		}
		return new $this->builders[$name]();
	}

	/**
	 * Render an element.
	 *
	 * @param Builder $element
	 *
	 * @return string The rendered element.
	 */
	public function render(Builder $element) {
		return $this->getRenderer()->render($element->build());
	}
}
