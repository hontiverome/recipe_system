<template>
    <div class="min-h-screen bg-gray-50">
        <!-- Navigation -->
        <nav class="bg-white shadow-sm sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <router-link to="/" class="flex items-center">
                            <h1 class="text-2xl font-bold text-blue-600">🍳 Recipe Manager</h1>
                        </router-link>
                    </div>
                    <div class="flex items-center">
                        <router-link
                            to="/recipes/create"
                            class="text-blue-600 hover:text-blue-800 font-medium"
                        >
                            + New Recipe
                        </router-link>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main>
            <router-view />
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-200 mt-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <p class="text-center text-gray-600">
                    © 2026 Recipe Management System. Built with Laravel & Vue 3.
                </p>
            </div>
        </footer>
    </div>
</template>

<script>
export default {
    name: 'App',
};
</script>

<style>
/* Global styles */
body {
    background-color: #f9fafb;
}
</style>
