<?php

namespace App\Helpers;

use InvalidArgumentException;

// TODO
// Free resource??
class UserRoleCourseReaderCSV implements IUserRoleCourseReader
{
    private $resource;

    public function __construct($file)
    {
        $this->resource = fopen($file, "r");
        if (!is_resource($this->resource)) {
            throw new InvalidArgumentException(
                sprintf("Argument must be a resource type, but got type %s", gettype($file))
            );
        }
    }

    function next($length = 0, $delimiter = ",", $enclosure = "\"", $escape = "\\")
    {
        return fgetcsv($this->resource, $length, $delimiter, $enclosure, $escape);
    }
}
