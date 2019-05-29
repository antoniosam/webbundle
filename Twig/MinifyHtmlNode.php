<?php

namespace Ast\WebBundle\Twig;

use Twig_Node;

class MinifyHtmlNode extends Twig_Node
{
    public function __construct(array $nodes = array(), array $attributes = array(), $lineno = 0, $tag = null)
    {
        parent::__construct($nodes, $attributes, $lineno, $tag);
    }

    public function compile(\Twig_Compiler $compiler)
    {
        $compiler
            ->addDebugInfo($this)
            ->write("ob_start();\n")
            ->subcompile($this->getNode('body'))
            ->write('$extension = $this->env->getExtension(\\Ast\\WebBundle\\Twig\\Extension::class);' . "\n")
            ->write('echo $extension->minify($this->env, ob_get_clean());' . "\n");
    }
}