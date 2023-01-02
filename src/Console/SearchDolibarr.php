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
                            {--search=    : search keyword, example "CAP"}
                            {--orderby=   : order result by a field name (example "nom")}
                            {--ordersort= : order sort (example "ASC" (default) or "DESC")}
                            {--limit=     : request only some data (example "2")}';

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
        $res = $tp->where("nom", "LIKE", "%" . $this->option('search')  . "%");
        if (null !== $this->option('limit')) {
            $tp->limit($this->option('limit'));
        }
        if (null !== $this->option('orderby')) {
            if (null !== $this->option('ordersort')) {
                $tp->orderBy($this->option('orderby'), $this->option('ordersort'));
            }else {
                $tp->orderBy($this->option('orderby'));
            }
        }
        $res = $tp->get();
        foreach ($res as $c) {
            if (is_array($c)) {
                dump([
                    'name' => $c['name'],
                    'address' => $c['address'],
                    'zip' => $c['zip'],
                    'town' => $c['town'],
                ]);
            }else {
                dump($c);
            }
        }
    }
}
