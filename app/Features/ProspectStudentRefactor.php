<?php

namespace App\Features;

use App\Support\AbstractFeatureFlag;

class ProspectStudentRefactor extends AbstractFeatureFlag
{
    public function resolve(mixed $scope): mixed
    {
        return false;
    }
}
