<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use App\Models\Company;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportCompanies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:companies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import companies';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $url = 'https://raw.githubusercontent.com/dariusk/corpora/master/data/corporations/fortune500.json';
        $data = json_decode(file_get_contents($url));
        $companies = $data->companies;

        try {
            foreach ($companies as $company) {
                Company::create([
                    'name' => $company,
                ]);
            }
        
            $this->info('Companies imported successfully!');
        } catch (\Exception $e) {
            $this->error('Import unsuccessful.'. $e->getMessage());
        }
    }

}
