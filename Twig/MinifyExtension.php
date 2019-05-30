<?php


namespace Ast\WebBundle\Twig;

use Twig_Environment;
use WyriHaximus\HtmlCompress\Factory;

/**
 * Extension.
 *
 */
class MinifyExtension extends \Twig_Extension
{
    /**
     * @var array
     */
    private $options = array(
        'is_safe' => array('html'),
        'needs_environment' => true,
    );
    /**
     * @var callable
     */
    private $callable;
    /**
     * @var \WyriHaximus\HtmlCompress\Parser
     */
    private $parser;
    /**
     * @var bool
     */
    private $forceCompression;

    /**
     * @param bool $forceCompression Default: false. Forces compression regardless of Twig's debug setting.
     */
    public function __construct($forceCompression = false)
    {
        $this->forceCompression = $forceCompression;
        $this->parser = Factory::constructSmallest();
        $this->callable = array($this, 'minify');
    }

    public function minify(Twig_Environment $twig, $html)
    {
        if (!$twig->isDebug() || $this->forceCompression) {
            return $this->parser->compress($html);
        }
        return $html;
    }

    public function getTokenParsers()
    {
        return array(
            new MinifyHtmlTokenParser(),
        );
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('htmlminify', $this->callable, $this->options),
        );
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('htmlminify', $this->callable, $this->options),
        );
    }
}