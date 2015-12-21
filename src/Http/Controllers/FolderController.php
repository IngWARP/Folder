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
        //return 'hej';
    }

}
