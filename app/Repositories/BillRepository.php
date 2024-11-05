<?php


namespace App\Repositories;

use App\Models\Bill;

class BillRepository extends BaseRepository
{
    public function getModel()
    {
        return new Bill();
    }

}