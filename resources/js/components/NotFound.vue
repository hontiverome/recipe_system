<template>
  <div class="py-12">
    <div class="max-w-lg mx-auto text-center">
      <h1 class="text-4xl font-bold text-gray-900 mb-4">404</h1>
      <p class="text-xl text-gray-600 mb-6">Page not found</p>
      <router-link to="/" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded transition">
        ← Back Home
      </router-link>
    </div>
  </div>
</template>

<script>
export default {
  name: 'NotFound',
};
</script>
