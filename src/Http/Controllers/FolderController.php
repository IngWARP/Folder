<?php namespace IngWARP\Folder\Http\Controllers;

/**
 * Created by PhpStorm.
 * User: inkre1
 * Date: 2015-12-15
 * Time: 14:28
 */

use App\Http\Controllers\Controller;
use IngWARP\folder\Http\DirTree;

/**
 * Class folderController
 * @package IngWARP\folder
 */
class FolderController extends Controller
{
    private $treeData;

    /**
     * Show the page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('folder::folder');
    }

    /**
     * API call to get JSON representation off the filetree
     *
     * @return string
     */
    public function files()
    {
        $this->treeData = new DirTree(config('folder.defaultFolder'));

        return json_encode($this->treeData, JSON_PRETTY_PRINT);
    }
}
