<?php
namespace Caprel\Dolibarr\Console;

use Caprel\Dolibarr\Models\DolibarrThirdparties;
use Illuminate\Console\Command;

class SearchDolibarr extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dolibarr:search
                            {--search=   : search keyword, example "CAP"}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Search on dolibarr thirdparties via API';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tp = new DolibarrThirdparties;
        $res = $tp->where("nom","LIKE", "%" . $this->option('search')  . "%")->get();
        foreach($res as $c) {
                dump([
                'name' => $c['name'],
                'address' => $c['address'],
                'zip' => $c['zip'],
                'town' => $c['town'],
            ]);
        }
    }
}
