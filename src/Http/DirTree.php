<?php namespace IngWARP\Folder\Http;

use Illuminate\Filesystem\Filesystem;

/**
 * Class DirTree
 * @package packages\IngWARP\Folder\src\Http
 */
class DirTree implements \JsonSerializable
{
    private $children;
    private $name;
    private $filesystem;

    /**
     * DirTree constructor.
     * @param $folderName
     */
    public function __construct($folderName)
    {
        $this->filesystem = new Filesystem();
        $this->name = $this->filesystem->name($folderName);
        $this->buildTree($folderName);
    }

    /**
     * Scan a directory for files and child directories
     * @param $folder
     */
    private function buildTree($folder)
    {
        $files = $this->filesystem->files($folder);
        foreach ($files as $file) {
            $this->addFile($file);
        }
        $directories = $this->filesystem->directories($folder);
        foreach ($directories as $directory) {
            $this->addChild($directory);
        }
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'name' => $this->name,
            'children' => $this->children,
        ];
    }

    /**
     * @param $name
     */
    public function addChild($name)
    {
        $this->children[] = new DirTree($name);
    }

    /**
     * @param $name
     */
    public function addFile($name)
    {
        $this->children[] = ['name' => $this->filesystem->name($name)];
    }
}