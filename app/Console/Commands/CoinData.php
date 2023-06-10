<?php

namespace App\Console\Commands;

use App\Models\cG;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class CoinData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    /**
     * The console command description.
     *
     * @var string
     */
    protected $signature = 'coin:fetch-store';

    protected $description = 'Fetches data from the Coingecko API endpoint and stores it in the database';


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

        $url = 'https://api.coingecko.com/api/v3/coins/list'; //?include_platform=true';

        try {
            $client = new \GuzzleHttp\Client(['verify' => false]);

            $response = $client->request(
                'GET',
                $url,
                [
                    'headers' => [
                        'Accept' => 'application/json',
                    ],

                    'query' => [
                        'include_platform' => 'true',
                        'vs_currency' => 'usd',
                        // 'key' => $apiKey,
                    ]
                ]
            );
            $data = json_decode($response->getBody(), true);

            foreach ($data as $coin) {
                $dd = [
                    'coin_id' => $coin['id'],
                    'name' => $coin['name'],
                    'symbol' => $coin['symbol'],
                    'platforms' => empty($coin['platforms']) ? '' : json_encode($coin['platforms'], true),
                    'created_at' => now(),
                    'updated_at' => now(),

                ];
                DB::table('coins')->insert($dd);
            }

            $this->info('Coin data fetched and stored successfully!');
        } catch (\Exception $e) {
            $this->error('An error occurred while fetching coin data: ' . $e->getMessage());
        }
    }
}
