<?php

namespace wiki\src\Domain\Repository;

use wiki\src\Domain\Model\Formation;

interface FormationRepository
{
    public function save(Formation $formation) : bool;
}