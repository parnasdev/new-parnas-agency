<?php

namespace Packages\academy\src\command;

use App\Console\InstallDefualtCheck;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Setting;
use App\Models\Status;
use App\Models\User;
use Illuminate\Console\Command;

class InstallAcademy extends Command
{
    use InstallDefualtCheck;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install:academy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'install defaults your academy';

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
        $defaults = config('academy.defaults');

        $dbs = [
            array('name' => 'Status' , 'module'=> null),
            array('name' => 'Permission' , 'module'=> null),
            array('name' => 'Setting' , 'module'=> null),
            array('name' => 'Post' , 'module'=> null)
        ];

        $status_keys = collect($defaults['statuses'])->pluck('name');
        $permission_keys = collect($defaults['permission'])->pluck('name');
        $setting_keys = array_keys($defaults['settings']);
        $post_keys = collect($defaults['posts'])->pluck('title');

        $conditions = [
            ['condition' => 'whereIn' , 'key' => 'name' , 'value' => $status_keys],
            ['condition' => 'whereIn' , 'key' => 'name' , 'value' => $permission_keys],
            ['condition' => 'whereIn' , 'key' => 'name' , 'value' => $setting_keys],
            ['condition' => 'whereIn' , 'key' => 'title' , 'value' => $post_keys],
        ];

        $res = $this->checking($dbs , $conditions);

        try {
            if ($res['Status']) {
                foreach ($defaults['statuses'] as $status) {
                    Status::query()->create($status);
                }

                $this->info('Status create Successful');
            }

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

            if ($res['Setting']) {
                foreach ($defaults['settings'] as $key => $setting) {
                    Setting::query()->create([
                        'name' => $key,
                        'value' => $setting
                    ]);
                }

                $this->info('setting generate Successful');
            }

            if ($res['Post']) {
                $user = User::query()->where('role_id' , 1)->first();
                foreach ($defaults['posts'] as $page) {
                    $user->posts()->create($page);
                }

                $this->info('Post and Page create Successful');
            }
            $this->info('Command finish successful');
        } catch (\Exception $exception){
            $this->error("You Have Error: $exception");
        }
    }
}
