<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\Contracts\Interface\NhanVienRepositoryInterface;
use App\Repositories\Contracts\Interface\HopDongLaoDongRepositoryInterface;
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
     * @var nhanVienRepository
     */
    protected $nhanVienRepository;

    /**
     * @var hdldRepository
     */
    protected $hdldRepository;

    /**
     * @param NhanVienRepositoryInterface $nhanVienRepository
     */
    public function __construct(
        NhanVienRepositoryInterface $nhanVienRepository,
        HopDongLaoDongRepositoryInterface $hdldRepository
        )
    {
        parent::__construct();

        $this->nhanVienRepository = $nhanVienRepository;
        $this->hdldRepository = $hdldRepository;
    }

    
    public function handle()
    {
        $users = $this->nhanVienRepository->getAll();

        foreach ($users as $user) :
            $hdld = $this->hdldRepository->getHDbyNhanVien($user->id);

            if (! $hdld || null === $hdld) return false;

            $kyluatkhenthuong = $this->kyluatkhenthuongRepository->countKLKT($user->id);
            //not end yet
        endforeach;
    }
}
