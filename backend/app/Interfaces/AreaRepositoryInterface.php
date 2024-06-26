<?php

namespace App\Interfaces;

interface AreaRepositoryInterface
{
    /**
     * @param string $salesRepId
     */
    public function isChiefManager($salesRepId);
}
