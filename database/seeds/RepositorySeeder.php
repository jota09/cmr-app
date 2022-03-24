<?php

use App\Models\Repository;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RepositorySeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('repositories')->truncate();
        factory(Repository::class, 5)->create();
    }
}
