<?php

use App\Http\Controllers\ScrapeController;
use Illuminate\Database\Seeder;

class DictionarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ScrapeController::startScrape();
    }
}
