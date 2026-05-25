<template>
  <div class="py-6">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-start mb-6">
        <router-link to="/" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-medium px-3 py-2 rounded hover:bg-blue-50 transition">← Back to Recipes</router-link>
        <div class="flex gap-2" v-if="!loading">
          <router-link
            :to="`/recipes/${recipe.id}/edit`"
            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
          >
            Edit
          </router-link>
          <button
            @click="deleteRecipe"
            class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
          >
            Delete
          </button>
        </div>
      </div>

      <div v-if="loading" class="text-center py-8">
        <p class="text-gray-500">Loading recipe...</p>
      </div>

      <div v-if="error" class="bg-red-50 border-l-4 border-red-600 p-6 rounded">
        <h2 class="text-xl font-semibold text-red-800 mb-2">Error Loading Recipe</h2>
        <p class="text-red-700 mb-4">{{ error }}</p>
        <div class="space-x-3">
          <button @click="fetchRecipe" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
            Try Again
          </button>
          <router-link to="/" class="inline-block bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Back to Recipes
          </router-link>
        </div>
      </div>

      <div v-else class="bg-white rounded-lg shadow overflow-hidden">
        <!-- Recipe Image -->
        <div v-if="recipe.image" class="w-full h-96 overflow-hidden bg-gray-200">
          <img
            :src="recipe.image"
            :alt="recipe.title"
            class="w-full h-full object-cover"
            @error="onImageError"
          />
          <div class="hidden w-full h-full flex items-center justify-center text-gray-400" id="image-fallback">
            Image could not load
          </div>
        </div>
        
        <!-- Recipe Content -->
        <div class="p-6">
          <h1 class="text-4xl font-bold text-gray-900 mb-2">{{ recipe.title }}</h1>
          
          <div class="flex flex-wrap gap-3 mb-6">
            <span v-if="recipe.difficulty" :class="{
              'bg-green-100 text-green-800': recipe.difficulty === 'easy',
              'bg-yellow-100 text-yellow-800': recipe.difficulty === 'medium',
              'bg-red-100 text-red-800': recipe.difficulty === 'hard',
            }" class="inline-block px-3 py-1 rounded font-medium">
              {{ recipe.difficulty.charAt(0).toUpperCase() + recipe.difficulty.slice(1) }} Difficulty
            </span>
            <span v-if="recipe.category" class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded">
              {{ recipe.category }}
            </span>
            <span v-if="recipe.prep_time" class="inline-block bg-gray-100 text-gray-700 px-3 py-1 rounded">
              ⏱ Prep: {{ recipe.prep_time }} min
            </span>
            <span v-if="recipe.cook_time" class="inline-block bg-gray-100 text-gray-700 px-3 py-1 rounded">
              🔥 Cook: {{ recipe.cook_time }} min
            </span>
            <span v-if="recipe.servings" class="inline-block bg-gray-100 text-gray-700 px-3 py-1 rounded">
              👥 Servings: {{ recipe.servings }}
            </span>
          </div>

          <div v-if="recipe.description" class="mb-8">
            <h2 class="text-xl font-semibold text-gray-900 mb-2">Description</h2>
            <p class="text-gray-700">{{ recipe.description }}</p>
          </div>

          <div class="grid md:grid-cols-2 gap-8">
            <div v-if="recipe.ingredient_list && recipe.ingredient_list.length > 0">
              <h2 class="text-xl font-semibold text-gray-900 mb-4">Ingredients</h2>
              <ul class="space-y-2">
                <li v-for="ingredient in recipe.ingredient_list" :key="ingredient.id" class="text-gray-700">
                  <span class="font-medium">{{ ingredient.name }}</span>
                  <span class="text-gray-600">— {{ ingredient.quantity }} {{ ingredient.unit }}</span>
                  <span v-if="ingredient.notes" class="text-gray-500 ml-2">{{ ingredient.notes }}</span>
                </li>
              </ul>
            </div>

            <div v-else-if="recipe.ingredients">
              <h2 class="text-xl font-semibold text-gray-900 mb-4">Ingredients</h2>
              <ul class="space-y-2">
                <li v-for="(item, idx) in ingredientsList" :key="idx" class="text-gray-700">
                  • {{ item }}
                </li>
              </ul>
            </div>

            <div v-if="recipe.instructions">
              <h2 class="text-xl font-semibold text-gray-900 mb-4">Instructions</h2>
              <ol class="space-y-3">
                <li v-for="(item, idx) in instructionsList" :key="idx" class="text-gray-700">
                  {{ item }}
                </li>
              </ol>
            </div>
          </div>

          <div class="mt-8 p-4 bg-gray-50 rounded text-sm text-gray-600">
            <p>Created: {{ formatDate(recipe.created_at) }}</p>
            <p>Last updated: {{ formatDate(recipe.updated_at) }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { ref, onMounted, computed } from 'vue';
import { useRouter, useRoute } from 'vue-router';
import api from '../services/api';

export default {
  name: 'RecipeDetail',
  setup() {
    const router = useRouter();
    const route = useRoute();
    const recipe = ref({
      id: null,
      title: '',
      description: '',
      ingredients: '',
      instructions: '',
      ingredient_list: [],
      prep_time: null,
      cook_time: null,
      servings: null,
      category: '',
      created_at: null,
      updated_at: null,
    });
    const loading = ref(false);
    const error = ref(null);

    const fetchRecipe = async () => {
      loading.value = true;
      error.value = null;
      try {
        console.log('Fetching recipe with ID:', route.params.id);
        recipe.value = await api.getRecipe(route.params.id);
        console.log('Recipe loaded:', recipe.value);
      } catch (err) {
        console.error('Error fetching recipe:', err);
        error.value = `Failed to load recipe: ${err.message}`;
      } finally {
        loading.value = false;
      }
    };

    const deleteRecipe = async () => {
      if (confirm('Are you sure you want to delete this recipe?')) {
        try {
          await api.deleteRecipe(recipe.value.id);
          router.push('/');
        } catch (err) {
          error.value = err.message;
        }
      }
    };

    const formatDate = (date) => {
      if (!date) return 'Unknown';
      return new Date(date).toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
      });
    };

    const ingredientsList = computed(() => {
      return recipe.value.ingredients
        .split('\n')
        .map(item => item.trim())
        .filter(item => item.length > 0);
    });

    const instructionsList = computed(() => {
      return recipe.value.instructions
        .split('\n')
        .map(item => item.trim())
        .filter(item => item.length > 0);
    });

    const onImageError = (e) => {
      e.target.style.display = 'none';
      const fallback = document.getElementById('image-fallback');
      if (fallback) {
        fallback.classList.remove('hidden');
        fallback.classList.add('flex');
      }
    };

    onMounted(fetchRecipe);

    return {
      recipe,
      loading,
      error,
      deleteRecipe,
      formatDate,
      ingredientsList,
      instructionsList,
      onImageError,
    };
  },
};
</script>
