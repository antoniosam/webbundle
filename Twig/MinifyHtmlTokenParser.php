<?php

namespace Ast\WebBundle\Twig;

use Twig_Token;
use Twig_TokenParser;

class MinifyHtmlTokenParser extends Twig_TokenParser
{
    public function parse(Twig_Token $token)
    {
        $lineNumber = $token->getLine();
        $stream = $this->parser->getStream();
        $stream->expect(Twig_Token::BLOCK_END_TYPE);
        $body = $this->parser->subparse(array($this, 'decideHtmlMinifyEnd'), true);
        $stream->expect(Twig_Token::BLOCK_END_TYPE);
        $nodes = array('body' => $body);
        return new MinifyHtmlNode($nodes, array(), $lineNumber, $this->getTag());
    }

    public function getTag()
    {
        return 'htmlminify';
    }

    public function decideHtmlMinifyEnd(Twig_Token $token)
    {
        return $token->test('endhtmlminify');
    }
}