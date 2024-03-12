<?php

namespace App\Console\Commands;

use App\Models\Capability;
use App\Models\Point;
use Illuminate\Console\Command;

class scriptToAddCapabilities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:script-to-add-capabilities';

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
        $capabilities = Capability::all();
        $points = Point::all();

        foreach ($points as $point) {
            $randomCapability = $capabilities->random();


            $point->update([
                'capability_id' => $randomCapability->id,
                'capability_name' => $randomCapability->name,
            ]);
//            dd($point->toArray());
        }
    }
}
