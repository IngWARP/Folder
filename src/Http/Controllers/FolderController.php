<?php namespace IngWARP\Folder\Http\Controllers;

/**
 * Created by PhpStorm.
 * User: inkre1
 * Date: 2015-12-15
 * Time: 14:28
 */

use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use IngWARP\Folder\Http\DirTree;

/**
 * Class folderController
 * @package IngWARP\folder
 */
class FolderController extends Controller
{
    private $treeData;

    public function index()
    {
        return view('folder::folder');
    }

    public function files()
    {
        $this->treeData = new DirTree(config('folder.defaultFolder'));

        return json_encode($this->treeData, JSON_PRETTY_PRINT);
    }
}
