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
          </div>

          <div class="grid grid-cols-2 gap-4">
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
            <label for="ingredients" class="block text-sm font-medium text-gray-700 mb-1">
              Ingredients * (one per line)
            </label>
            <textarea
              id="ingredients"
              v-model="form.ingredients"
              required
              rows="8"
              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 font-mono text-sm"
              placeholder="2 cups flour&#10;1 cup sugar&#10;3 eggs"
            ></textarea>
            <span v-if="errors.ingredients" class="text-red-600 text-sm">{{ errors.ingredients }}</span>
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
      prep_time: null,
      cook_time: null,
      servings: 1,
      category: '',
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
        form.value = recipe;
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

    onMounted(fetchRecipe);

    return {
      form,
      loading,
      error,
      errors,
      isEditing,
      backLink,
      submitForm,
    };
  },
};
</script>
