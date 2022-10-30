<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
// use App\Repositories\Contracts\Interface\NhanVienRepositoryInterface;
use App\Models\NhanVien;

class CountSalary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'count:salary';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Count salary for all staff';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $user = $this->nhanVienRepository->find(1);
        $user = NhanVien::where('id', 1)->first();
        dd($user->hoTen);
    }
}
