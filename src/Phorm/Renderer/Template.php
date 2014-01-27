<?php
/**
 * This file is part of the phorm project.
 */


namespace Phorm\Renderer;


/**
 * Class Template
 *
 * @package Unpossible\Phorm\Renderer
 * @author Bo Thinggaard <bo@unpossiblesystems.com>
 */
abstract class Template implements RendererInterface {

	/** @var TemplateMap */
	private $templateProvider;

	/**
	 * Set template provider.
	 *
	 * @param TemplateMap $provider
	 *
	 * @return Template
	 */
	public function setTemplateProvider(TemplateMap $provider) {
		$this->templateProvider = $provider;
		return $this;
	}

	/**
	 * Get the template provider.
	 *
	 * @return TemplateMap
	 */
	public function getTemplateProvider() {
		if (!$this->templateProvider) {
			$this->templateProvider = new TemplateMap();
			$this->templateProvider->setDefaultTemplate($this->getDefaultTemplate());
		}
		return $this->templateProvider;
	}

	/**
	 * Register a template.
	 *
	 * @param string $key
	 * @param string $template
	 *
	 * @return TemplateMap
	 */
	public function setTemplate($key, $template) {
		$this->getTemplateProvider()->setTemplate($key, $template);
		return $this;
	}

	/**
	 * Get template at key.
	 *
	 * @param string $key
	 *
	 * @return string The template
	 */
	public function getTemplate($key) {
		return $this->getTemplateProvider()->getTemplate($key);
	}

	/**
	 * Get the default template.
	 *
	 * @return string
	 */
	abstract protected function getDefaultTemplate();

} 