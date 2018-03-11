<?php

use Illuminate\Database\Seeder;

use App\Todo;

class CreateFirstTodo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Todo::create(['desc' => 'Create awesome app!']);
    }
}
