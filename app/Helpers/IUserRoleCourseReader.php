<?php

namespace App\Helpers;

interface IUserRoleCourseReader
{
    function __construct($resource);

    function next();
}
