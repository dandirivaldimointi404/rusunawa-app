<?php

namespace App\Console\Commands;

use App\Models\Penghuni;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class GenerateTagihan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-tagihan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate tagihan untuk penghuni yang sudah satu bulan tinggal';

    /**
     * Execute the console command.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        Log::info('GenerateTagihan command started.');
        $penghuni = Penghuni::all();

        foreach ($penghuni as $item) {
            $item->createTagihan();
        }

        $this->info('Tagihan telah diperbarui.');
    }
}
