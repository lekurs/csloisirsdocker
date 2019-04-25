<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 2019-01-29
 * Time: 20:46
 */

namespace App\Services\Interfaces;


interface ImageResizingHelperInterface
{
    /**
     * @param \SplFileInfo $image
     * @param $directory
     * @param $newName
     * @return mixed
     */
    public function resize(\SplFileInfo $image, $directory, $newName);
}
