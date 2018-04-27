<?php
/**
 * Created by PhpStorm.
 * User: Gerhard
 * Date: 11-Feb-18
 * Time: 18:58
 */

namespace BittrexApi;

use ReflectionObject;

class Call
{
    public function castObject($destination, $sourceObject){

        $sourceReflection = new ReflectionObject($sourceObject);
        $destinationReflection = new ReflectionObject($destination);

        $sourceProperties = $sourceReflection->getProperties();

        foreach ($sourceProperties as $sourceProperty) {
            $sourceProperty->setAccessible(true);
            $name = $sourceProperty->getName();
            $value = $sourceProperty->getValue($sourceObject);
            if ($destinationReflection->hasProperty($name)) {
                $propDest = $destinationReflection->getProperty($name);
                $propDest->setAccessible(true);
                $propDest->setValue($destination,$value);
            } else {
                $destination->$name = $value;
            }

        }

        return $destination;
    }

}