<?php

namespace Packages\form\src\command;

use App\Console\InstallDefualtCheck;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Setting;
use App\Models\Status;
use App\Models\User;
use Illuminate\Console\Command;

class InstallForm extends Command
{
    use InstallDefualtCheck;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install:form';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'install defaults your form';

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
        $defaults = config('form.defaults');

        $dbs = [
            array('name' => 'Permission' , 'module'=> null),
        ];

        $permission_keys = collect($defaults['permission'])->pluck('name');

        $conditions = [
            ['condition' => 'whereIn' , 'key' => 'name' , 'value' => $permission_keys],
        ];

        $res = $this->checking($dbs , $conditions);
        try {
            if ($res['Permission']) {
                foreach ($defaults['permission'] as $permission) {
                    Permission::query()->create($permission);
                }

                foreach ($defaults['permission_role'] as $pr) {
                    $role = Role::query()->find($pr['role_id']);
                    $role->permissions()->attach($pr['permission_id']);
                }

                $this->info('Permission create Successful');
                $this->info('Permission And Role sync Successful');
            }

            $this->info('Command finish successful');
        } catch (\Exception $exception){
            $this->error("You Have Error: $exception");
        }
    }
}
