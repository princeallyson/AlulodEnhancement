<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FileMiddleware implements Luthier\MiddlewareInterface
{
    public function run($args)
    {
        $delete_files = AppDeleteFile::all();

        foreach ($delete_files as $file) 
        {
            if (strlen($file->filepath) && file_exists($file->filepath))
            {
                unlink($file->filepath);

                if (!file_exists($file->filepath))
                {
                    $file->delete();
                }
            }
            else
            {
                $file->delete();
            }
        }
    }
}