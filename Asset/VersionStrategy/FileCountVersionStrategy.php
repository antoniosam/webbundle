<?php

/**
 * Created by marcosamano
 * Date: 30/05/19
 */
namespace Ast\WebBundle\Asset\VersionStrategy;

use Symfony\Component\Asset\VersionStrategy\VersionStrategyInterface;

class FileCountVersionStrategy implements VersionStrategyInterface
{
    /**
     * @var string
     */
    private $project_dir;

    /**
     * @var string
     */
    private $format;

    /**
     * @var string
     */
    private $filename;

    /**
     * @param string      $manifestPath
     * @param string|null $format
     */
    public function __construct($project_dir)
    {
        $this->project_dir = $project_dir;
        $this->filename = $project_dir.DIRECTORY_SEPARATOR.self::getpath();
        $this->format = '%s?v=%s';
    }

    public static function getpath(){
        return 'app'.DIRECTORY_SEPARATOR.'countversion.txt';
    }

    /**
     * @param string $path
     * @return bool|false|string
     */
    public function getVersion($path)
    {
        if(file_exists($this->filename)){
            return ($count = file_get_contents($this->filename))?$count:date('z');
        }
        return date('z');
    }

    public function applyVersion($path)
    {
        $version = $this->getVersion($path);

        if ('' === $version) {
            return $path;
        }

        $versionized = sprintf($this->format, ltrim($path, '/'), $version);

        if ($path && '/' === $path[0]) {
            return '/'.$versionized;
        }

        return $versionized;
    }

}