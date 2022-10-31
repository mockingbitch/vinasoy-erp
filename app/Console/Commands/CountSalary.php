<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\Contracts\Interface\NhanVienRepositoryInterface;
use App\Repositories\Contracts\Interface\HopDongLaoDongRepositoryInterface;
use App\Repositories\Contracts\Interface\KyLuatKhenThuongRepositoryInterface;
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
     * @var klktRepository
     */
    protected $klktRepository;

    /**
     * @param NhanVienRepositoryInterface $nhanVienRepository
     * @param HopDongLaoDongRepositoryInterface $hdldRepository
     * @param KyLuatKhenThuongRepositoryInterface $klktRepository
     */
    public function __construct(
        NhanVienRepositoryInterface $nhanVienRepository,
        HopDongLaoDongRepositoryInterface $hdldRepository,
        KyLuatKhenThuongRepositoryInterface $klktRepository
        )
    {
        parent::__construct();

        $this->nhanVienRepository = $nhanVienRepository;
        $this->hdldRepository = $hdldRepository;
        $this->klktRepository = $klktRepository;
    }

    
    public function handle()
    {
        $users = $this->nhanVienRepository->getAll();

        foreach ($users as $user) :
            $hdld = $this->hdldRepository->getHDbyNhanVien($user->id);

            if (! $hdld || null === $hdld) continue;

            $luong = (int) $hdld->mucLuong;
            $kyluatkhenthuong = $this->klktRepository->countKLKT($user->id);
            $tongLuong = $luong + $kyluatkhenthuong;

            $data = [
                'nhanvien_id' => $user->id,
                'thang' => date('m'),
                'tienLuong' => $tongLuong,
                'trangThai' => 0
            ];
            
            $this->luongRepository->create($data);
        endforeach;
    }
}
