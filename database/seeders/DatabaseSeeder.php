<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    private function randBooks()
    {
        return rand(72,91);
    }

    public function run()
    {

        //Book::factory(20)->create();
        //Author::factory(10)->create();

        $authors = Author::get();

        foreach ($authors as $author) {
            $books = Book::find(array_map(array($this, 'randBooks'), array_pad([],rand(1, 4), 0)));
            $author->books()->attach($books);
        }




      /*  AdminUser::factory(1)->create([
            'login' => 'db_admin',
            'password' => bcrypt('12345'),
        ]);*/
    }
}
