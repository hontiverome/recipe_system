<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Seeder;

class RecipeImageSeeder extends Seeder
{
    public function run(): void
    {
        $recipes = [
            [
                'title' => 'Spaghetti Carbonara',
                'description' => 'Classic Italian pasta with creamy egg sauce, pancetta, and Pecorino cheese',
                'instructions' => "1. Cook spaghetti in salted boiling water until al dente\n2. Fry pancetta until crispy\n3. Beat eggs with cheese\n4. Toss hot pasta with pancetta and fat\n5. Add egg mixture off heat, stirring quickly\n6. Serve immediately with black pepper",
                'prep_time' => 10,
                'cook_time' => 20,
                'servings' => 4,
                'category' => 'Italian',
                'image' => 'https://images.pexels.com/photos/1998920/pexels-photo-1998920.jpeg',
                'difficulty' => 'medium',
                'ingredientList' => [
                    ['name' => 'Spaghetti', 'quantity' => 400, 'unit' => 'g'],
                    ['name' => 'Pancetta', 'quantity' => 200, 'unit' => 'g'],
                    ['name' => 'Eggs', 'quantity' => 4, 'unit' => 'whole'],
                    ['name' => 'Pecorino cheese', 'quantity' => 100, 'unit' => 'g'],
                    ['name' => 'Black pepper', 'quantity' => 1, 'unit' => 'tsp'],
                ]
            ],
            [
                'title' => 'Margherita Pizza',
                'description' => 'Classic Neapolitan pizza with fresh tomatoes, mozzarella, and basil',
                'instructions' => "1. Preheat oven to 250°C (480°F)\n2. Stretch pizza dough on pizza pan\n3. Spread tomato sauce evenly\n4. Add fresh mozzarella pieces\n5. Bake for 12-15 minutes until crust is golden\n6. Top with fresh basil, salt, and olive oil\n7. Serve hot",
                'prep_time' => 20,
                'cook_time' => 15,
                'servings' => 2,
                'category' => 'Italian',
                'image' => 'https://images.pexels.com/photos/825661/pexels-photo-825661.jpeg',
                'difficulty' => 'medium',
                'ingredientList' => [
                    ['name' => 'Pizza dough', 'quantity' => 500, 'unit' => 'g'],
                    ['name' => 'Tomato sauce', 'quantity' => 200, 'unit' => 'ml'],
                    ['name' => 'Fresh mozzarella', 'quantity' => 250, 'unit' => 'g'],
                    ['name' => 'Fresh basil', 'quantity' => 10, 'unit' => 'leaves'],
                    ['name' => 'Olive oil', 'quantity' => 2, 'unit' => 'tbsp'],
                ]
            ],
            [
                'title' => 'Pad Thai',
                'description' => 'Thai stir-fried noodles with shrimp, peanuts, and lime',
                'instructions' => "1. Soak rice noodles in hot water until soft\n2. Prepare sauce with tamarind, fish sauce, and brown sugar\n3. Heat oil in wok and stir-fry shrimp\n4. Add noodles and sauce, toss well\n5. Add garlic, shallots, and bean sprouts\n6. Top with peanuts, lime, and green onion\n7. Serve hot",
                'prep_time' => 15,
                'cook_time' => 10,
                'servings' => 3,
                'category' => 'Thai',
                'image' => 'https://images.pexels.com/photos/1126359/pexels-photo-1126359.jpeg',
                'difficulty' => 'medium',
                'ingredientList' => [
                    ['name' => 'Rice noodles', 'quantity' => 300, 'unit' => 'g'],
                    ['name' => 'Shrimp', 'quantity' => 300, 'unit' => 'g'],
                    ['name' => 'Tamarind paste', 'quantity' => 3, 'unit' => 'tbsp'],
                    ['name' => 'Fish sauce', 'quantity' => 3, 'unit' => 'tbsp'],
                    ['name' => 'Peanuts', 'quantity' => 100, 'unit' => 'g'],
                    ['name' => 'Lime', 'quantity' => 2, 'unit' => 'whole'],
                ]
            ],
            [
                'title' => 'Chicken Tikka Masala',
                'description' => 'Creamy Indian curry with tender chicken pieces and aromatic spices',
                'instructions' => "1. Marinate chicken in yogurt and spices for 30 minutes\n2. Grill or bake chicken until cooked through\n3. Make sauce with tomato, cream, and spices\n4. Add cooked chicken to sauce\n5. Simmer for 10 minutes\n6. Garnish with cilantro\n7. Serve with rice or naan",
                'prep_time' => 45,
                'cook_time' => 25,
                'servings' => 4,
                'category' => 'Indian',
                'image' => 'https://images.pexels.com/photos/1624487/pexels-photo-1624487.jpeg',
                'difficulty' => 'medium',
                'ingredientList' => [
                    ['name' => 'Chicken breast', 'quantity' => 700, 'unit' => 'g'],
                    ['name' => 'Yogurt', 'quantity' => 200, 'unit' => 'ml'],
                    ['name' => 'Tomato sauce', 'quantity' => 300, 'unit' => 'ml'],
                    ['name' => 'Heavy cream', 'quantity' => 200, 'unit' => 'ml'],
                    ['name' => 'Garam masala', 'quantity' => 2, 'unit' => 'tsp'],
                    ['name' => 'Cumin', 'quantity' => 1, 'unit' => 'tsp'],
                ]
            ],
            [
                'title' => 'Beef Tacos',
                'description' => 'Seasoned ground beef tacos with fresh toppings and lime crema',
                'instructions' => "1. Brown ground beef with taco seasoning\n2. Warm tortillas in skillet\n3. Fill tortillas with beef\n4. Add shredded lettuce, tomato, and cheese\n5. Serve with salsa and lime crema\n6. Garnish with cilantro",
                'prep_time' => 10,
                'cook_time' => 10,
                'servings' => 4,
                'category' => 'Mexican',
                'image' => 'https://images.pexels.com/photos/461198/pexels-photo-461198.jpeg',
                'difficulty' => 'easy',
                'ingredientList' => [
                    ['name' => 'Ground beef', 'quantity' => 500, 'unit' => 'g'],
                    ['name' => 'Taco seasoning', 'quantity' => 2, 'unit' => 'tbsp'],
                    ['name' => 'Flour tortillas', 'quantity' => 8, 'unit' => 'whole'],
                    ['name' => 'Shredded lettuce', 'quantity' => 200, 'unit' => 'g'],
                    ['name' => 'Tomato', 'quantity' => 2, 'unit' => 'whole'],
                    ['name' => 'Shredded cheese', 'quantity' => 150, 'unit' => 'g'],
                ]
            ],
            [
                'title' => 'Caesar Salad',
                'description' => 'Classic salad with crispy romaine, parmesan, croutons, and creamy caesar dressing',
                'instructions' => "1. Wash and tear romaine lettuce\n2. Make caesar dressing with anchovies, lemon, garlic, and mayo\n3. Toss lettuce with dressing\n4. Top with parmesan shavings and croutons\n5. Add grilled chicken for protein (optional)\n6. Serve immediately",
                'prep_time' => 15,
                'cook_time' => 0,
                'servings' => 2,
                'category' => 'Salad',
                'image' => 'https://images.pexels.com/photos/1059905/pexels-photo-1059905.jpeg',
                'difficulty' => 'easy',
                'ingredientList' => [
                    ['name' => 'Romaine lettuce', 'quantity' => 300, 'unit' => 'g'],
                    ['name' => 'Parmesan cheese', 'quantity' => 100, 'unit' => 'g'],
                    ['name' => 'Croutons', 'quantity' => 100, 'unit' => 'g'],
                    ['name' => 'Anchovy fillets', 'quantity' => 4, 'unit' => 'whole'],
                    ['name' => 'Lemon juice', 'quantity' => 2, 'unit' => 'tbsp'],
                    ['name' => 'Mayonnaise', 'quantity' => 100, 'unit' => 'ml'],
                ]
            ],
            [
                'title' => 'Chocolate Chip Cookies',
                'description' => 'Chewy cookies loaded with chocolate chips and butter',
                'instructions' => "1. Preheat oven to 190°C (375°F)\n2. Cream butter and brown sugar\n3. Add eggs and vanilla\n4. Mix in flour, baking soda, and salt\n5. Fold in chocolate chips\n6. Drop spoonfuls on baking sheet\n7. Bake for 10-12 minutes until golden\n8. Cool on wire rack",
                'prep_time' => 15,
                'cook_time' => 12,
                'servings' => 24,
                'category' => 'Dessert',
                'image' => 'https://images.pexels.com/photos/1126359/pexels-photo-1126359.jpeg',
                'difficulty' => 'easy',
                'ingredientList' => [
                    ['name' => 'Butter', 'quantity' => 225, 'unit' => 'g'],
                    ['name' => 'Brown sugar', 'quantity' => 200, 'unit' => 'g'],
                    ['name' => 'Eggs', 'quantity' => 2, 'unit' => 'whole'],
                    ['name' => 'Vanilla extract', 'quantity' => 1, 'unit' => 'tsp'],
                    ['name' => 'Flour', 'quantity' => 280, 'unit' => 'g'],
                    ['name' => 'Chocolate chips', 'quantity' => 340, 'unit' => 'g'],
                ]
            ],
            [
                'title' => 'Grilled Salmon',
                'description' => 'Perfectly grilled salmon with lemon butter sauce and fresh herbs',
                'instructions' => "1. Preheat grill to medium-high heat\n2. Pat salmon dry and season with salt and pepper\n3. Grill salmon skin-side down for 5-6 minutes\n4. Flip and grill for 4-5 minutes until cooked through\n5. Make lemon butter sauce with white wine and herbs\n6. Drizzle sauce over salmon\n7. Serve with grilled vegetables",
                'prep_time' => 10,
                'cook_time' => 12,
                'servings' => 2,
                'category' => 'Seafood',
                'image' => 'https://images.pexels.com/photos/1092730/pexels-photo-1092730.jpeg',
                'difficulty' => 'medium',
                'ingredientList' => [
                    ['name' => 'Salmon fillets', 'quantity' => 400, 'unit' => 'g'],
                    ['name' => 'Butter', 'quantity' => 50, 'unit' => 'g'],
                    ['name' => 'Lemon', 'quantity' => 1, 'unit' => 'whole'],
                    ['name' => 'White wine', 'quantity' => 100, 'unit' => 'ml'],
                    ['name' => 'Fresh dill', 'quantity' => 1, 'unit' => 'tbsp'],
                    ['name' => 'Salt and pepper', 'quantity' => 1, 'unit' => 'tsp'],
                ]
            ],
            [
                'title' => 'Tom Yum Soup',
                'description' => 'Thai hot and sour soup with shrimp, coconut milk, and aromatic herbs',
                'instructions' => "1. Bring broth to boil with lemongrass and galangal\n2. Add shrimp and cook until pink\n3. Add fish sauce, lime juice, and chili\n4. Pour in coconut milk\n5. Add mushrooms and tomatoes\n6. Simmer for 5 minutes\n7. Garnish with cilantro and green onion\n8. Serve hot",
                'prep_time' => 15,
                'cook_time' => 15,
                'servings' => 3,
                'category' => 'Thai',
                'image' => 'https://images.pexels.com/photos/1092730/pexels-photo-1092730.jpeg',
                'difficulty' => 'medium',
                'ingredientList' => [
                    ['name' => 'Chicken broth', 'quantity' => 1, 'unit' => 'liter'],
                    ['name' => 'Shrimp', 'quantity' => 300, 'unit' => 'g'],
                    ['name' => 'Lemongrass', 'quantity' => 2, 'unit' => 'stalk'],
                    ['name' => 'Coconut milk', 'quantity' => 200, 'unit' => 'ml'],
                    ['name' => 'Fish sauce', 'quantity' => 2, 'unit' => 'tbsp'],
                    ['name' => 'Lime juice', 'quantity' => 3, 'unit' => 'tbsp'],
                ]
            ],
            [
                'title' => 'Beef Bourguignon',
                'description' => 'French braised beef stew with red wine, mushrooms, and pearl onions',
                'instructions' => "1. Brown beef chunks in batches\n2. Sauté pearl onions and mushrooms\n3. Add tomato paste and cook briefly\n4. Deglaze with red wine and beef broth\n5. Return beef to pot with herbs\n6. Braise in oven at 160°C for 3 hours\n7. Adjust seasoning and serve with potatoes\n8. Garnish with parsley",
                'prep_time' => 30,
                'cook_time' => 180,
                'servings' => 6,
                'category' => 'French',
                'image' => 'https://images.pexels.com/photos/2803386/pexels-photo-2803386.jpeg',
                'difficulty' => 'hard',
                'ingredientList' => [
                    ['name' => 'Beef chuck', 'quantity' => 1200, 'unit' => 'g'],
                    ['name' => 'Red wine', 'quantity' => 500, 'unit' => 'ml'],
                    ['name' => 'Pearl onions', 'quantity' => 300, 'unit' => 'g'],
                    ['name' => 'Mushrooms', 'quantity' => 250, 'unit' => 'g'],
                    ['name' => 'Tomato paste', 'quantity' => 2, 'unit' => 'tbsp'],
                    ['name' => 'Beef broth', 'quantity' => 500, 'unit' => 'ml'],
                ]
            ],
            [
                'title' => 'Risotto Mushroom',
                'description' => 'Creamy Italian rice dish with mushrooms, parmesan, and butter',
                'instructions' => "1. Heat broth and keep warm\n2. Sauté mushrooms and set aside\n3. Toast arborio rice in butter and oil\n4. Add white wine and stir until absorbed\n5. Gradually add warm broth, stirring constantly\n6. After 18 minutes, rice should be creamy\n7. Add mushrooms and parmesan\n8. Finish with butter and serve immediately",
                'prep_time' => 10,
                'cook_time' => 25,
                'servings' => 4,
                'category' => 'Italian',
                'image' => 'https://images.pexels.com/photos/1092730/pexels-photo-1092730.jpeg',
                'difficulty' => 'medium',
                'ingredientList' => [
                    ['name' => 'Arborio rice', 'quantity' => 300, 'unit' => 'g'],
                    ['name' => 'Mushrooms', 'quantity' => 300, 'unit' => 'g'],
                    ['name' => 'Vegetable broth', 'quantity' => 1, 'unit' => 'liter'],
                    ['name' => 'White wine', 'quantity' => 150, 'unit' => 'ml'],
                    ['name' => 'Parmesan cheese', 'quantity' => 100, 'unit' => 'g'],
                    ['name' => 'Butter', 'quantity' => 75, 'unit' => 'g'],
                ]
            ],
            [
                'title' => 'Buddha Bowl',
                'description' => 'Healthy grain bowl with roasted vegetables, proteins, and tahini dressing',
                'instructions' => "1. Cook quinoa according to package directions\n2. Roast vegetables (broccoli, sweet potato, carrots) at 200°C for 25 minutes\n3. Massage kale with olive oil\n4. Arrange grains, vegetables, and kale in bowl\n5. Add chickpeas and nuts\n6. Drizzle with tahini dressing\n7. Add avocado slices\n8. Serve warm or room temperature",
                'prep_time' => 20,
                'cook_time' => 30,
                'servings' => 2,
                'category' => 'Healthy',
                'image' => 'https://images.pexels.com/photos/1092730/pexels-photo-1092730.jpeg',
                'difficulty' => 'easy',
                'ingredientList' => [
                    ['name' => 'Quinoa', 'quantity' => 150, 'unit' => 'g'],
                    ['name' => 'Broccoli', 'quantity' => 200, 'unit' => 'g'],
                    ['name' => 'Sweet potato', 'quantity' => 250, 'unit' => 'g'],
                    ['name' => 'Chickpeas', 'quantity' => 200, 'unit' => 'g'],
                    ['name' => 'Kale', 'quantity' => 100, 'unit' => 'g'],
                    ['name' => 'Tahini', 'quantity' => 3, 'unit' => 'tbsp'],
                ]
            ],
            [
                'title' => 'Falafel Wrap',
                'description' => 'Middle Eastern fried chickpea patties with tahini sauce and fresh vegetables',
                'instructions' => "1. Soak chickpeas overnight\n2. Blend with herbs and spices to form dough\n3. Form into patties\n4. Deep fry until golden\n5. Warm pita bread\n6. Spread tahini sauce on bread\n7. Fill with falafel, lettuce, tomato, cucumber\n8. Roll and serve with hummus",
                'prep_time' => 30,
                'cook_time' => 20,
                'servings' => 4,
                'category' => 'Middle Eastern',
                'image' => 'https://images.pexels.com/photos/5737346/pexels-photo-5737346.jpeg',
                'difficulty' => 'medium',
                'ingredientList' => [
                    ['name' => 'Chickpeas', 'quantity' => 400, 'unit' => 'g'],
                    ['name' => 'Onion', 'quantity' => 1, 'unit' => 'whole'],
                    ['name' => 'Fresh parsley', 'quantity' => 50, 'unit' => 'g'],
                    ['name' => 'Cumin', 'quantity' => 1, 'unit' => 'tsp'],
                    ['name' => 'Pita bread', 'quantity' => 4, 'unit' => 'whole'],
                    ['name' => 'Tahini', 'quantity' => 100, 'unit' => 'ml'],
                ]
            ],
            [
                'title' => 'Korean Bulgogi',
                'description' => 'Marinated and grilled thin slices of beef with sweet and savory flavors',
                'instructions' => "1. Slice beef thinly against the grain\n2. Make marinade with soy sauce, brown sugar, sesame oil, garlic\n3. Marinate beef for 2-4 hours\n4. Heat grill or skillet to high heat\n5. Cook beef in batches for 2-3 minutes per side\n6. Serve on lettuce wraps with rice and vegetables\n7. Garnish with sesame seeds and green onion",
                'prep_time' => 240,
                'cook_time' => 10,
                'servings' => 4,
                'category' => 'Korean',
                'image' => 'https://images.pexels.com/photos/1092730/pexels-photo-1092730.jpeg',
                'difficulty' => 'medium',
                'ingredientList' => [
                    ['name' => 'Beef sirloin', 'quantity' => 600, 'unit' => 'g'],
                    ['name' => 'Soy sauce', 'quantity' => 5, 'unit' => 'tbsp'],
                    ['name' => 'Brown sugar', 'quantity' => 3, 'unit' => 'tbsp'],
                    ['name' => 'Sesame oil', 'quantity' => 2, 'unit' => 'tbsp'],
                    ['name' => 'Garlic', 'quantity' => 4, 'unit' => 'cloves'],
                    ['name' => 'Sesame seeds', 'quantity' => 2, 'unit' => 'tbsp'],
                ]
            ],
            [
                'title' => 'Tiramisu',
                'description' => 'Classic Italian layered dessert with mascarpone, coffee, and cocoa',
                'instructions' => "1. Whip mascarpone with sugar until smooth\n2. Beat egg yolks until pale and fluffy\n3. Fold egg yolks into mascarpone\n4. Whip egg whites until stiff peaks form\n5. Fold egg whites into mascarpone mixture\n6. Dip ladyfingers in coffee and layer in dish\n7. Spread mascarpone mixture over ladyfingers\n8. Repeat layers and dust with cocoa powder\n9. Refrigerate for 4 hours\n10. Serve chilled",
                'prep_time' => 30,
                'cook_time' => 240,
                'servings' => 8,
                'category' => 'Dessert',
                'image' => 'https://images.pexels.com/photos/2109112/pexels-photo-2109112.jpeg',
                'difficulty' => 'medium',
                'ingredientList' => [
                    ['name' => 'Mascarpone', 'quantity' => 500, 'unit' => 'g'],
                    ['name' => 'Sugar', 'quantity' => 100, 'unit' => 'g'],
                    ['name' => 'Eggs', 'quantity' => 4, 'unit' => 'whole'],
                    ['name' => 'Ladyfingers', 'quantity' => 400, 'unit' => 'g'],
                    ['name' => 'Coffee', 'quantity' => 300, 'unit' => 'ml'],
                    ['name' => 'Cocoa powder', 'quantity' => 2, 'unit' => 'tbsp'],
                ]
            ],
            [
                'title' => 'Shrimp Scampi',
                'description' => 'Garlic butter shrimp pasta with white wine and fresh parsley',
                'instructions' => "1. Cook linguine in salted boiling water until al dente\n2. Heat butter and olive oil in large skillet\n3. Add minced garlic and cook for 30 seconds\n4. Add shrimp and cook until pink (2-3 minutes per side)\n5. Deglaze with white wine\n6. Add lemon juice and red pepper flakes\n7. Toss cooked pasta with shrimp and sauce\n8. Garnish with fresh parsley and grated cheese\n9. Serve with crusty bread",
                'prep_time' => 10,
                'cook_time' => 15,
                'servings' => 4,
                'category' => 'Seafood',
                'image' => 'https://images.pexels.com/photos/1092730/pexels-photo-1092730.jpeg',
                'difficulty' => 'easy',
                'ingredientList' => [
                    ['name' => 'Shrimp', 'quantity' => 500, 'unit' => 'g'],
                    ['name' => 'Linguine', 'quantity' => 400, 'unit' => 'g'],
                    ['name' => 'Garlic', 'quantity' => 6, 'unit' => 'cloves'],
                    ['name' => 'Butter', 'quantity' => 50, 'unit' => 'g'],
                    ['name' => 'White wine', 'quantity' => 150, 'unit' => 'ml'],
                    ['name' => 'Lemon juice', 'quantity' => 2, 'unit' => 'tbsp'],
                ]
            ],
        ];

        foreach ($recipes as $recipe) {
            $ingredientData = $recipe['ingredientList'];
            unset($recipe['ingredientList']);

            $created = Recipe::create($recipe);

            foreach ($ingredientData as $ingredient) {
                $created->ingredientList()->create($ingredient);
            }
        }
    }
}
