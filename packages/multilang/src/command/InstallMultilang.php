<?php

namespace Packages\multilang\src\command;

use App\Console\InstallDefualtCheck;
use App\Models\Setting;
use Illuminate\Console\Command;

class InstallMultilang extends Command
{
    use InstallDefualtCheck;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install:multilang';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'install defaults your multilang';

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
        $defaults = config('multilang.defaults');

        $dbs = [
            array('name' => 'Setting' , 'module'=> null),
        ];


        $setting_keys = array_keys($defaults['settings']);

        $conditions = [
            ['condition' => 'whereIn' , 'key' => 'name' , 'value' => $setting_keys],
        ];

        $res = $this->checking($dbs , $conditions);

        try {
            if ($res['Setting']) {
                foreach ($defaults['settings'] as $key => $setting) {
                    Setting::query()->create([
                        'name' => $key,
                        'value' => $setting
                    ]);
                }

                $this->info('setting generate Successful');
            }
            $this->info('Command finish successful');
        } catch (\Exception $exception){
            $this->error("You Have Error: $exception");
        }
    }
}
