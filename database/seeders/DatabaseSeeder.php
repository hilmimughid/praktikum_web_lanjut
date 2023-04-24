<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Coffee;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Coffee::create([
            'name' => 'Americano',
            'excerpt' => 'Americano is a type of coffee drink prepared by brewing espresso with added hot water',
            'description' => 'Americano is a type of coffee drink prepared by brewing espresso with added hot water, giving it a similar strength to, but different flavor from traditionally brewed coffee. It is served in a tall glass with a handle, called a latte glass, or in a smaller cup.',
            'price' => '$1'
        ]);

        Coffee::create([
            'name' => 'Cappuccino',
            'excerpt' => 'Cappuccino is a coffee-based drink that originated in Italy',
            'description' => 'Cappuccino is a coffee-based drink that originated in Italy, and is traditionally prepared with steamed milk foam. Variations of the drink involve the use of cream instead of milk, the inclusion of chocolate powder, and the addition of flavors.',
            'price' => '$3'
        ]);

        Coffee::create([
            'name' => 'Espresso',
            'excerpt' => 'Espresso is coffee of Italian origin',
            'description' => 'Espresso is coffee of Italian origin, brewed by forcing a small amount of nearly boiling water under pressure through finely ground coffee beans. Espresso is generally thicker than coffee brewed by other methods, has a higher concentration of suspended and dissolved solids, and has crema on top.',
            'price' => '$5'
        ]);

        Coffee::create([
            'name' => 'Latte',
            'excerpt' => 'Latte is a coffee drink made with espresso and steamed milk',
            'description' => 'Latte is a coffee drink made with espresso and steamed milk. It is typically made with a single shot of espresso, but can be made with a double shot for a stronger coffee flavor. It is served in a tall glass with a handle, called a latte glass, or in a smaller cup.',
            'price' => '$2'
        ]);

        Coffee::create([
            'name' => 'Macchiato',
            'excerpt' => 'Macchiato is a coffee drink made with espresso and a small amount of milk',
            'description' => 'Macchiato is a coffee drink made with espresso and a small amount of milk. It is typically made with a single shot of espresso, but can be made with a double shot for a stronger coffee flavor. It is served in a tall glass with a handle, called a latte glass, or in a smaller cup.',
            'price' => '$4'
        ]);

        Coffee::create([
            'name' => 'Mocha',
            'excerpt' => 'Mocha is a coffee drink made with espresso, chocolate, and steamed milk',
            'description' => 'Mocha is a coffee drink made with espresso, chocolate, and steamed milk. It is typically made with a single shot of espresso, but can be made with a double shot for a stronger coffee flavor. It is served in a tall glass with a handle, called a latte glass, or in a smaller cup.',
            'price' => '$6'
        ]);
    }
}
