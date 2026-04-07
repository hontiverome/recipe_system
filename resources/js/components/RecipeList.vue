<template>
  <div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center mb-6">
        <div>
          <h1 class="text-3xl font-bold text-gray-900">Recipes</h1>
          <p class="mt-2 text-gray-600">Browse and manage your favorite recipes</p>
        </div>
        <router-link
          to="/recipes/create"
          class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
        >
          + Add Recipe
        </router-link>
      </div>

      <div v-if="loading" class="text-center py-8">
        <p class="text-gray-500">Loading recipes...</p>
      </div>

      <div v-else-if="error" class="bg-red-50 p-4 rounded border border-red-200">
        <p class="text-red-700">{{ error }}</p>
        <button
          @click="fetchRecipes"
          class="mt-2 text-red-600 hover:text-red-800 underline"
        >
          Try again
        </button>
      </div>

      <div v-else-if="recipes.length === 0" class="text-center py-8">
        <p class="text-gray-500">No recipes yet.</p>
        <router-link to="/recipes/create" class="text-blue-600 hover:text-blue-800">
          Create one now
        </router-link>
      </div>

      <div v-else class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        <router-link
          v-for="recipe in recipes"
          :key="recipe.id"
          :to="`/recipes/${recipe.id}`"
          class="bg-white rounded-lg shadow hover:shadow-lg transition-shadow p-4 cursor-pointer"
        >
          <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ recipe.title }}</h3>
          <p v-if="recipe.description" class="text-gray-600 text-sm mb-3 line-clamp-2">
            {{ recipe.description }}
          </p>
          <div class="flex flex-wrap gap-2">
            <span v-if="recipe.category" class="inline-block bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">
              {{ recipe.category }}
            </span>
            <span v-if="recipe.prep_time" class="inline-block bg-gray-100 text-gray-700 px-2 py-1 rounded text-xs">
              ⏱ {{ recipe.prep_time }}m prep
            </span>
            <span v-if="recipe.cook_time" class="inline-block bg-gray-100 text-gray-700 px-2 py-1 rounded text-xs">
              🔥 {{ recipe.cook_time }}m cook
            </span>
            <span v-if="recipe.servings" class="inline-block bg-gray-100 text-gray-700 px-2 py-1 rounded text-xs">
              👥 {{ recipe.servings }} servings
            </span>
          </div>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
import { ref, onMounted } from 'vue';
import api from '../services/api';

export default {
  name: 'RecipeList',
  setup() {
    const recipes = ref([]);
    const loading = ref(false);
    const error = ref(null);

    const fetchRecipes = async () => {
      loading.value = true;
      error.value = null;
      try {
        recipes.value = await api.getRecipes();
      } catch (err) {
        error.value = err.message;
      } finally {
        loading.value = false;
      }
    };

    onMounted(fetchRecipes);

    return {
      recipes,
      loading,
      error,
      fetchRecipes,
    };
  },
};
</script>

<style scoped>
.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>
