<?php


namespace App\Repositories;

use App\Models\Bill;

class BillRepository extends BaseRepository
{
    protected function getModel()
    {
        return Bill::class;
    }

    public function getBillByUser($userId)
    {
        return $this->model->where('user_id', $userId)->select('id')->get();
    }
}