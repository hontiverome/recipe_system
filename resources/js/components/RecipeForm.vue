<template>
  <div class="py-6">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="mb-6">
        <router-link :to="backLink" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-medium px-3 py-2 rounded hover:bg-blue-50 transition">← Back</router-link>
      </div>

      <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">
          {{ isEditing ? 'Edit Recipe' : 'Create New Recipe' }}
        </h1>

        <form @submit.prevent="submitForm" class="space-y-6">
          <div>
            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
              Title *
            </label>
            <input
              id="title"
              v-model="form.title"
              type="text"
              required
              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
              placeholder="e.g., Spaghetti Carbonara"
            />
            <span v-if="errors.title" class="text-red-600 text-sm">{{ errors.title }}</span>
          </div>

          <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
              Description
            </label>
            <textarea
              id="description"
              v-model="form.description"
              rows="3"
              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
              placeholder="Brief description of the recipe"
            ></textarea>
          </div>

          <div>
            <label for="image" class="block text-sm font-medium text-gray-700 mb-1">
              Image URL
            </label>
            <input
              id="image"
              v-model="form.image"
              type="url"
              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
              placeholder="https://example.com/recipe-image.jpg"
            />
            <p class="text-sm text-gray-500 mt-1">Paste a URL from Unsplash, Pexels, or similar free image services</p>
            <div v-if="form.image" class="mt-3 rounded overflow-hidden h-32 border border-gray-300">
              <img :src="form.image" :alt="form.title" class="w-full h-full object-cover" @error="form.image = form.image" />
            </div>
          </div>

          <div class="grid grid-cols-2 gap-4">
            <div>
              <label for="category" class="block text-sm font-medium text-gray-700 mb-1">
                Category
              </label>
              <input
                id="category"
                v-model="form.category"
                type="text"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="e.g., Italian"
              />
            </div>

            <div>
              <label for="difficulty" class="block text-sm font-medium text-gray-700 mb-1">
                Difficulty
              </label>
              <select
                id="difficulty"
                v-model="form.difficulty"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
              >
                <option value="">Select difficulty</option>
                <option value="easy">Easy</option>
                <option value="medium">Medium</option>
                <option value="hard">Hard</option>
              </select>
            </div>
          </div>

          <div class="grid grid-cols-2 gap-4">
            <div>
              <label for="servings" class="block text-sm font-medium text-gray-700 mb-1">
                Servings
              </label>
              <input
                id="servings"
                v-model.number="form.servings"
                type="number"
                min="1"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
              />
            </div>

            <div>
              <label for="prep_time" class="block text-sm font-medium text-gray-700 mb-1">
                Prep Time (minutes)
              </label>
              <input
                id="prep_time"
                v-model.number="form.prep_time"
                type="number"
                min="0"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
              />
            </div>
          </div>

          <div class="grid grid-cols-2 gap-4">
            <div>
              <label for="cook_time" class="block text-sm font-medium text-gray-700 mb-1">
                Cook Time (minutes)
              </label>
              <input
                id="cook_time"
                v-model.number="form.cook_time"
                type="number"
                min="0"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
              />
            </div>
          </div>

          <div>
            <div class="flex justify-between items-center mb-4">
              <label class="block text-sm font-medium text-gray-700">
                Ingredients *
              </label>
              <button
                type="button"
                @click="addIngredient"
                class="text-sm bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded"
              >
                + Add Ingredient
              </button>
            </div>
            
            <div v-if="form.ingredientList && form.ingredientList.length > 0" class="space-y-3 mb-4">
              <div v-for="(ingredient, idx) in form.ingredientList" :key="idx" class="flex gap-2 items-end bg-gray-50 p-3 rounded">
                <input
                  v-model="ingredient.name"
                  type="text"
                  placeholder="Ingredient name"
                  required
                  class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
                <input
                  v-model.number="ingredient.quantity"
                  type="number"
                  step="0.01"
                  placeholder="Qty"
                  required
                  class="w-20 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
                <input
                  v-model="ingredient.unit"
                  type="text"
                  placeholder="Unit"
                  required
                  class="w-20 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
                <input
                  v-model="ingredient.notes"
                  type="text"
                  placeholder="Notes (optional)"
                  class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
                <button
                  type="button"
                  @click="removeIngredient(idx)"
                  class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded"
                >
                  Remove
                </button>
              </div>
            </div>

            <button
              v-if="!form.ingredientList || form.ingredientList.length === 0"
              type="button"
              @click="addIngredient"
              class="w-full py-8 border-2 border-dashed border-gray-300 rounded text-gray-500 hover:border-gray-400 hover:text-gray-600 text-center font-medium transition"
            >
              Click to add ingredients
            </button>

            <span v-if="errors.ingredientList" class="text-red-600 text-sm">{{ errors.ingredientList }}</span>
          </div>

          <div>
            <label for="instructions" class="block text-sm font-medium text-gray-700 mb-1">
              Instructions * (step per line)
            </label>
            <textarea
              id="instructions"
              v-model="form.instructions"
              required
              rows="8"
              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 font-mono text-sm"
              placeholder="1. Mix the flour and sugar&#10;2. Add eggs and mix well&#10;3. Bake at 350°F"
            ></textarea>
            <span v-if="errors.instructions" class="text-red-600 text-sm">{{ errors.instructions }}</span>
          </div>

          <div v-if="error" class="bg-red-50 p-4 rounded border border-red-200">
            <p class="text-red-700">{{ error }}</p>
          </div>

          <div class="flex justify-end gap-4 pt-4">
            <router-link
              :to="backLink"
              class="inline-flex items-center gap-2 px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition"
            >
              ← Back
            </router-link>
            <button
              type="submit"
              :disabled="loading"
              class="px-4 py-2 bg-blue-600 hover:bg-blue-700 disabled:bg-gray-400 text-white rounded-md"
            >
              {{ loading ? 'Saving...' : (isEditing ? 'Update Recipe' : 'Create Recipe') }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { ref, onMounted, computed } from 'vue';
import { useRouter, useRoute } from 'vue-router';
import api from '../services/api';

export default {
  name: 'RecipeForm',
  setup() {
    const router = useRouter();
    const route = useRoute();
    const loading = ref(false);
    const error = ref(null);
    const errors = ref({});
    const form = ref({
      title: '',
      description: '',
      ingredients: '',
      instructions: '',
      ingredientList: [],
      prep_time: null,
      cook_time: null,
      servings: 1,
      category: '',
      image: '',
      difficulty: '',
    });

    const isEditing = computed(() => !!route.params.id);

    const backLink = computed(() => {
      return isEditing.value ? `/recipes/${route.params.id}` : '/';
    });

    const fetchRecipe = async () => {
      if (!isEditing.value) return;
      
      loading.value = true;
      try {
        const recipe = await api.getRecipe(route.params.id);
        form.value = {
          title: recipe.title,
          description: recipe.description,
          ingredients: recipe.ingredients,
          instructions: recipe.instructions,
          ingredientList: recipe.ingredient_list || [],
          prep_time: recipe.prep_time,
          cook_time: recipe.cook_time,
          servings: recipe.servings,
          category: recipe.category,
          image: recipe.image || '',
          difficulty: recipe.difficulty || '',
        };
      } catch (err) {
        error.value = err.message;
      } finally {
        loading.value = false;
      }
    };

    const submitForm = async () => {
      errors.value = {};
      loading.value = true;
      error.value = null;

      try {
        // Validate that at least some ingredients are provided
        if (!form.value.ingredientList || form.value.ingredientList.length === 0) {
          errors.value.ingredientList = 'Please add at least one ingredient';
          loading.value = false;
          return;
        }

        if (isEditing.value) {
          await api.updateRecipe(route.params.id, form.value);
        } else {
          await api.createRecipe(form.value);
        }
        router.push('/');
      } catch (err) {
        if (err.message.includes('validation')) {
          error.value = 'Please fill in all required fields correctly';
        } else {
          error.value = err.message;
        }
      } finally {
        loading.value = false;
      }
    };

    const addIngredient = () => {
      if (!form.value.ingredientList) {
        form.value.ingredientList = [];
      }
      form.value.ingredientList.push({
        name: '',
        quantity: null,
        unit: '',
        notes: '',
      });
    };

    const removeIngredient = (index) => {
      form.value.ingredientList.splice(index, 1);
    };

    onMounted(fetchRecipe);

    return {
      form,
      loading,
      error,
      errors,
      isEditing,
      backLink,
      submitForm,
      addIngredient,
      removeIngredient,
    };
  },
};
</script>
