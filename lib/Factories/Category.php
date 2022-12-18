<?php

namespace Adiungo\Core\Factories;

use Adiungo\Core\Interfaces\Has_Name;
use Adiungo\Core\Traits\With_Name;
use Underpin\Interfaces\Identifiable_String;
use Underpin\Traits\With_String_Identity;

class Category implements Identifiable_String, Has_Name
{
    use With_String_Identity;
    use With_Name;
}
