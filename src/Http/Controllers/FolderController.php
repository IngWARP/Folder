<?php namespace IngWARP\Folder\Http\Controllers;

    /**
     * Created by PhpStorm.
     * User: inkre1
     * Date: 2015-12-15
     * Time: 14:28
     */

use App\Http\Controllers\Controller;

/**
 * Class folderController
 * @package IngWARP\folder
 */
class FolderController extends Controller
{

    public function index()
    {
        return view('folder::folder');
    }

    public function files()
    {
        $filesystem = new Filesystem();
        $files = $filesystem->allFiles(public_path().'/images');
        foreach ($files as $file) {
            $return[$file->getRelativePath()][] = $filesystem->name($file->getRelativePathname());
        }
        return $return;
    }

    public function dirs()
    {
        $filesystem = new Filesystem();
        $dirs = $filesystem-> directories(public_path().'/images');
        foreach ($dirs as $dir) {
            $return[] = $filesystem->name($dir);
        }
        return $return;
    }

}
