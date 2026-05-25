<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carbonara = Recipe::create([
            'title' => 'Spaghetti Carbonara',
            'description' => 'A classic Italian pasta dish with eggs, cheese, and bacon.',
            'ingredients' => "400g spaghetti\n200g guanciale or bacon\n4 large eggs\n100g Pecorino Romano cheese\nSalt and black pepper to taste",
            'instructions' => "1. Cook spaghetti in boiling salted water until al dente.\n2. While pasta cooks, fry guanciale until crispy.\n3. Beat eggs and mix with grated cheese.\n4. Drain pasta, reserving 1 cup pasta water.\n5. Mix hot pasta with guanciale and fat.\n6. Remove from heat and add egg mixture, tossing constantly.\n7. Add pasta water as needed for creamy sauce.\n8. Season with salt and pepper. Serve immediately.",
            'prep_time' => 10,
            'cook_time' => 20,
            'servings' => 4,
            'category' => 'Italian',
        ]);

        $carbonara->ingredientList()->createMany([
            ['name' => 'Spaghetti', 'quantity' => 400, 'unit' => 'g'],
            ['name' => 'Guanciale or Bacon', 'quantity' => 200, 'unit' => 'g'],
            ['name' => 'Large Eggs', 'quantity' => 4, 'unit' => 'whole'],
            ['name' => 'Pecorino Romano Cheese', 'quantity' => 100, 'unit' => 'g'],
            ['name' => 'Salt and Black Pepper', 'quantity' => 1, 'unit' => 'to taste'],
        ]);

        $cookies = Recipe::create([
            'title' => 'Chocolate Chip Cookies',
            'description' => 'Soft and chewy cookies loaded with chocolate chips.',
            'ingredients' => "225g butter, softened\n100g brown sugar\n100g white sugar\n2 large eggs\n2 tsp vanilla extract\n280g all-purpose flour\n1 tsp baking soda\n1 tsp salt\n340g chocolate chips",
            'instructions' => "1. Preheat oven to 190°C.\n2. Cream butter and sugars together.\n3. Beat in eggs and vanilla extract.\n4. In another bowl, mix flour, baking soda, and salt.\n5. Combine wet and dry ingredients.\n6. Stir in chocolate chips.\n7. Drop spoonfuls onto baking sheets.\n8. Bake for 9-11 minutes until golden brown.",
            'prep_time' => 15,
            'cook_time' => 10,
            'servings' => 24,
            'category' => 'Dessert',
        ]);

        $cookies->ingredientList()->createMany([
            ['name' => 'Butter', 'quantity' => 225, 'unit' => 'g', 'notes' => 'softened'],
            ['name' => 'Brown Sugar', 'quantity' => 100, 'unit' => 'g'],
            ['name' => 'White Sugar', 'quantity' => 100, 'unit' => 'g'],
            ['name' => 'Large Eggs', 'quantity' => 2, 'unit' => 'whole'],
            ['name' => 'Vanilla Extract', 'quantity' => 2, 'unit' => 'tsp'],
            ['name' => 'All-Purpose Flour', 'quantity' => 280, 'unit' => 'g'],
            ['name' => 'Baking Soda', 'quantity' => 1, 'unit' => 'tsp'],
            ['name' => 'Salt', 'quantity' => 1, 'unit' => 'tsp'],
            ['name' => 'Chocolate Chips', 'quantity' => 340, 'unit' => 'g'],
        ]);

        $caesar = Recipe::create([
            'title' => 'Caesar Salad',
            'description' => 'Fresh lettuce with homemade Caesar dressing and croutons.',
            'ingredients' => "1 head romaine lettuce\n100g Parmesan cheese\n100g croutons\n3 cloves garlic\n1 egg yolk\n2 tbsp lemon juice\n1 tbsp Worcestershire sauce\n120ml olive oil\nSalt and pepper to taste",
            'instructions' => "1. Wash and chop romaine lettuce.\n2. For dressing: blend garlic, egg yolk, lemon juice, and Worcestershire.\n3. Slowly add olive oil while blending.\n4. Season with salt and pepper.\n5. Toss lettuce with dressing.\n6. Top with Parmesan and croutons.\n7. Serve immediately.",
            'prep_time' => 15,
            'cook_time' => 0,
            'servings' => 4,
            'category' => 'Salad',
        ]);

        $caesar->ingredientList()->createMany([
            ['name' => 'Romaine Lettuce', 'quantity' => 1, 'unit' => 'head'],
            ['name' => 'Parmesan Cheese', 'quantity' => 100, 'unit' => 'g'],
            ['name' => 'Croutons', 'quantity' => 100, 'unit' => 'g'],
            ['name' => 'Garlic Cloves', 'quantity' => 3, 'unit' => 'cloves'],
            ['name' => 'Egg Yolk', 'quantity' => 1, 'unit' => 'whole'],
            ['name' => 'Lemon Juice', 'quantity' => 2, 'unit' => 'tbsp'],
            ['name' => 'Worcestershire Sauce', 'quantity' => 1, 'unit' => 'tbsp'],
            ['name' => 'Olive Oil', 'quantity' => 120, 'unit' => 'ml'],
            ['name' => 'Salt and Pepper', 'quantity' => 1, 'unit' => 'to taste'],
        ]);
    }
}
