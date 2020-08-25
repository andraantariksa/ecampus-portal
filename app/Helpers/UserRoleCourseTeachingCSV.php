<?php

namespace App\Helpers;

use InvalidArgumentException;

// TODO
// Free resource??
class UserRoleCourseTeachingCSV implements IUserRoleCourseReader
{
    private $resource;

    public function __construct($resource)
    {
        if (!is_resource($resource)) {
            throw new InvalidArgumentException(
                sprintf("Argument must be a resource type %s", gettype($resource))
            );
        }
        $this->resource = $resource;
    }

    function next($length = 0, $delimiter = ",", $enclosure = "\"", $escape = "\\"): ?array
    {
        return fgetcsv($this->resource, $length, $delimiter, $enclosure, $escape);
    }
}
