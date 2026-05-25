<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = Recipe::with('ingredientList')->get();
        return response()->json($recipes, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'ingredients' => 'nullable|string', // kept for backward compatibility
            'instructions' => 'required|string',
            'prep_time' => 'nullable|integer',
            'cook_time' => 'nullable|integer',
            'servings' => 'nullable|integer',
            'category' => 'nullable|string',
            'image' => 'nullable|string|max:500',
            'difficulty' => 'nullable|string|in:easy,medium,hard',
            'ingredientList' => 'nullable|array',
            'ingredientList.*.name' => 'required|string',
            'ingredientList.*.quantity' => 'required|numeric',
            'ingredientList.*.unit' => 'required|string',
            'ingredientList.*.notes' => 'nullable|string',
        ]);

        // Create the recipe
        $recipe = Recipe::create($validated);

        // Create associated ingredients if provided
        if (!empty($validated['ingredientList'])) {
            foreach ($validated['ingredientList'] as $ingredient) {
                $recipe->ingredientList()->create($ingredient);
            }
        }

        return response()->json($recipe->load('ingredientList'), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        $recipe->load('ingredientList');
        return response()->json($recipe, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'ingredients' => 'nullable|string', // kept for backward compatibility
            'instructions' => 'sometimes|required|string',
            'prep_time' => 'nullable|integer',
            'cook_time' => 'nullable|integer',
            'servings' => 'nullable|integer',
            'category' => 'nullable|string',
            'image' => 'nullable|string|max:500',
            'difficulty' => 'nullable|string|in:easy,medium,hard',
            'ingredientList' => 'nullable|array',
            'ingredientList.*.id' => 'nullable|integer',
            'ingredientList.*.name' => 'required|string',
            'ingredientList.*.quantity' => 'required|numeric',
            'ingredientList.*.unit' => 'required|string',
            'ingredientList.*.notes' => 'nullable|string',
        ]);

        // Remove ingredients from validated array before updating recipe
        $ingredientData = $validated['ingredientList'] ?? [];
        unset($validated['ingredientList']);

        // Update the recipe
        $recipe->update($validated);

        // Handle ingredients - delete and recreate
        if (!empty($ingredientData)) {
            $recipe->ingredientList()->delete();
            foreach ($ingredientData as $ingredient) {
                $recipe->ingredientList()->create($ingredient);
            }
        }

        return response()->json($recipe->load('ingredientList'), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return response()->json(null, 204);
    }
}
