<?php

namespace App\Console\Commands;

use App\Models\Domain;
use Illuminate\Console\Command;

class UpdateBacklink extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:status-backlink';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $domain = Domain::all();
        foreach ($domain as $item) {
            $item->status_artikel_unik = 'nonaktif';
            $item->status_backlink = 'nonaktif';
            $item->save();
        }
    }
}
