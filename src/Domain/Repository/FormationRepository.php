<?php

namespace pdo\Domain\Repository;

use pdo\Domain\Model\Formation;

interface FormationRepository
{
    public function save(Formation $formation) : bool;
    public function remove(Formation $formation) : bool;
}