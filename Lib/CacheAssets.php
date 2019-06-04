<?php
/**
 * Created by  marcosamano
 * Date: 29/05/19
 */

namespace Ast\WebBundle\Lib;

use Doctrine\ORM\EntityManager;

class CacheAssets
{

    /**
     * @param $folder
     * @param int $max_age
     * @return bool
     */
    public static function generateHt($folder, $max_age = 2592000)
    {
        $filanema = $folder . DIRECTORY_SEPARATOR . '.htaccess';
        $fa = fopen($filanema, 'w');
        if ($fa) {
            fwrite($fa, self::cacheControl($max_age));
            fwrite($fa, self::expiresCache());
            fwrite($fa, self::encodingGzip());
            fclose($fa);
            return true;
        }
        return false;
    }

    /**
     * @param $max_age
     * @return string
     */
    public static function cacheControl($max_age)
    {
        return '<filesMatch ".(ico|pdf|flv|jpg|jpeg|png|gif|svg|js|css|swf)$">' . PHP_EOL .
            'Header set Cache-Control "max-age=' . $max_age . ', public"'.PHP_EOL;
    }

    /**
     * @return string
     */
    public static function expiresCache()
    {
        return '## EXPIRES HEADER CACHING ##' . PHP_EOL .
            'ExpiresActive On' . PHP_EOL .
            'ExpiresByType image/jpg "access 1 year"' . PHP_EOL .
            'ExpiresByType image/jpeg "access 1 year"' . PHP_EOL .
            'ExpiresByType image/gif "access 1 year"' . PHP_EOL .
            'ExpiresByType image/png "access 1 year"' . PHP_EOL .
            'ExpiresByType image/svg "access 1 year"' . PHP_EOL .
            'ExpiresByType text/css "access 1 month"' . PHP_EOL .
            'ExpiresByType application/pdf "access 1 day"' . PHP_EOL .
            'ExpiresByType application/javascript "access 1 month"' . PHP_EOL .
            'ExpiresByType application/x-javascript "access 1 month"' . PHP_EOL .
            'ExpiresByType application/x-shockwave-flash "access 1 month"' . PHP_EOL .
            'ExpiresByType image/x-icon "access 1 year"' . PHP_EOL .
            'ExpiresDefault "access 2 days"' . PHP_EOL .
            '## EXPIRES HEADER CACHING ##'.PHP_EOL;
    }

    public static function encodingGzip()
    {
        return '<ifModule mod_gzip.c>'.PHP_EOL.
            '# AddEncoding allows you to have certain browsers uncompress information on the fly.' . PHP_EOL .
            'AddEncoding gzip .gz.' . PHP_EOL . PHP_EOL .
            '#Serve gzip compressed CSS files if they exist and the client accepts gzip.' . PHP_EOL .
            'RewriteCond %{HTTP:Accept-encoding} gzip ' . PHP_EOL .
            'RewriteCond %{REQUEST_FILENAME}\.gz -s ' . PHP_EOL .
            'RewriteRule ^(.*)\.css $1\.css\.gz [QSA] ' . PHP_EOL . PHP_EOL .
            '# Serve gzip compressed JS files if they exist and the client accepts gzip. ' . PHP_EOL .
            'RewriteCond %{HTTP:Accept-encoding} gzip. ' . PHP_EOL .
            'RewriteCond %{REQUEST_FILENAME}\.gz -s. ' . PHP_EOL .
            'RewriteRule ^(.*)\.js $1\.js\.gz [QSA]  ' . PHP_EOL . PHP_EOL .
            '# Serve correct content types, and prevent mod_deflate double gzip. ' . PHP_EOL .
            'RewriteRule \.css\.gz$ - [T=text/css,E=no-gzip:1] ' . PHP_EOL .
            'RewriteRule \.js\.gz$ - [T=text/javascript,E=no-gzip:1] ' . PHP_EOL.
            '</ifModule>'.PHP_EOL;
    }

}