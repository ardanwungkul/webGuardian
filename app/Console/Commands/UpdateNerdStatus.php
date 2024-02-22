<?php

namespace App\Console\Commands;

use App\Models\Domain;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateNerdStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:nerd-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Nerd Status for Domains';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $domains = Domain::where('status_nerd', 'Done')->get();

        foreach ($domains as $domain) {
            $updateDate = Carbon::parse($domain->status_nerd_update);
            $threeDaysAgo = now()->subDays(3);

            if ($updateDate->lte($threeDaysAgo)) {
                $domain->update(['status_nerd' => 'UnDone', 'status_sitemap' => 'Undone']);

                $this->info("Domain $domain->nama_domain status updated to Undone.");
            }
        }
    }
}
