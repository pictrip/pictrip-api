<?php

namespace App\Console\Commands;

use App\Features\Foursquare\FoursquareMethods;
use App\Features\Foursquare\FoursquareService;
use App\Models\Category;
use Illuminate\Console\Command;

class ParseFor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:for';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        /** @var FoursquareService $api */
        $api = resolve(FoursquareService::class);
        $res = $api->get(FoursquareMethods::CATEGORIES);

        $this->round($res->categories, null);
        //dd($res);
    }

    private function round($categories, $parent = null)
    {
        foreach ($categories as $category) {
            $innerCategory = $this->parse($category, $parent);
            $this->round($category->categories, $innerCategory);
        }
    }

    private function parse($arr, $parent = null)
    {
        $category = Category::firstOrCreate([
            'foursquare_id' => $arr->id,
        ], [
            'foursquare_id' => $arr->id,
            'name' => $arr->name,
            'pluralName' => $arr->pluralName,
            'shortName' => $arr->shortName,
            'icon' => $arr->icon->prefix.'%s'.$arr->icon->suffix,
            'parent_id' => $parent ? $parent->id : null,
        ]);

        return $category;
    }
}
