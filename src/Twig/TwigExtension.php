<?php
/**
 * Created by PhpStorm.
 * User: tbenc
 * Date: 2019. 01. 11.
 * Time: 15:43
 */

namespace App\Twig;


use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class TwigExtension extends \Twig_Extension
{

    /**
     * Return the functions registered as twig extensions
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('remote_file_exists', [$this, 'remoteFileExists']),
        ];
    }

    /**
     * @param string $url
     *
     * @return bool
     */
    public function remoteFileExists($url)
    {
        $file_headers = @get_headers($url);
        if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
            return false;
        }
        else {
            return true;
        }
    }

    public function getName()
    {
        return 'app_file';
    }
}