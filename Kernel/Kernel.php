<?php

namespace Maalls\AdminBundle\Kernel;

use Symfony\Component\HttpKernel\Kernel as BaseKernel;

abstract class Kernel extends BaseKernel
{
    public function getBundle($name, $first = true)
    {
        $get_next = false;
        if($name[0] == '!' && $first){
            $name = substr($name, 1);
            $first = false;
            $get_next = true;
        }

        $bundles = parent::getBundle($name, $first);

        if($get_next){
            return isset($bundles[1]) ? $bundles[1] : $bundles[0];
        } else {
            return $bundles;
        }
    }

    public function locateResource($name, $dir = null, $first = true)
    {
        $get_next = false;
        if($name[0] == '@' && $name[1] == '!' && $first){
            $name = '@'.substr($name, 2);
            $first = false;
            $get_next = true;
        }

        $files = parent::locateResource($name, $dir, $first);

        if($get_next){
            return isset($files[1]) ? $files[1] : $files[0];
        } else {
            return $files;
        }
    }
}