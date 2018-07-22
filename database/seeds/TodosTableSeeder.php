<?php

use Illuminate\Database\Seeder;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        //App\Category::truncate();
        //App\Todo::truncate();
        App\User::query()->delete();

        $faker = \Faker\Factory::create();

        $password = Hash::make('toptal');
        $user = App\User::create([
            'name' => 'Administrator',
            'email' => 'admin@test.com',
            'password' => $password,
        ]);  

         
        for ($i = 1; $i <= 3; $i++) {
            $cat = App\Category::create([
                'category' => 'Cat_'.$i,
                'user_id' => $user->id
            ]);
            // And now, let's create a few todos in our database:
            for ($a = 1; $a <= 3; $a++) {
                $due = ($a * 10) - $i;
                $duestring = ($due < 10) ? '2018-08-0'.$due : '2018-08-'.$due;
                App\Todo::create([
                    'todo' => $faker->sentence,
                    'category_id' => $cat->id,
                    'user_id' => $user->id,
                    'due' => $duestring
                ]);
            }
        }
    }
}
