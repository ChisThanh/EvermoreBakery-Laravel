<?php


namespace App\Repositories;

use App\Models\Bill;

class BillRepository extends BaseRepository
{
    protected function getModel()
    {
        return Bill::class;
    }
}