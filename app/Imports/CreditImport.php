<?php

namespace App\Imports;

use App\Models\Credit;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CreditImport implements ToModel, WithHeadingRow, WithChunkReading, WithBatchInserts
{
    private $users;
    public function __construct()
    {
        $this->users = User::select('id', 'name');
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = $this->users->where('name', $row['customer'])->pluck('id')->toArray();
        // dd($user[0]);
        // dd($row['description']);
        return new Credit([
            'user_id' =>$user[0],
            'description' => $row['description'] ?? 'untitled',
            'qty' => $row['qty'],
            'price' => $row['price'],
            'debt' => $row['debt'],
            'credit' => $row['credit'],
            'balance' => $row['balance'],
            'created_at' => $row['created_at'],
        ]);
    }
    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }

}
