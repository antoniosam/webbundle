<?php
/**
 * Created by  marcosamano
 * Date: 29/05/19
 */

namespace Ast\WebBundle\Lib;

class LinkShareSocial
{

    public static function fb($url){
        return 'https://www.facebook.com/sharer/sharer.php?u='.$url;
    }

    public static function twitter($url,$tweet){
        return 'https://twitter.com/intent/tweet?url='.$url.'&text='.$tweet.'%20por%20@MeditravelsMx';

    }


}