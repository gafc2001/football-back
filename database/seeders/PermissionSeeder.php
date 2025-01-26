<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $freeRole = Role::whereName('free')->first();
        $vipRole = Role::whereName('vip')->first();

        $perm1 = new Permission([
            "name" => "read.all",
        ]);
        $perm2 = new Permission([
            "name" => "favorites.create",
        ]);
        $perm3 = new Permission([
            "name" => "favorites.delete",
        ]);

        $freeRole->save([$perm1]);
        $vipRole->save([$perm1,$perm2,$perm3]);
    }
}
