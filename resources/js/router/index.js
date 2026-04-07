import { createRouter, createWebHistory } from 'vue-router';
import RecipeList from '../components/RecipeList.vue';
import RecipeDetail from '../components/RecipeDetail.vue';
import RecipeForm from '../components/RecipeForm.vue';
import NotFound from '../components/NotFound.vue';

const routes = [
  {
    path: '/',
    name: 'RecipeList',
    component: RecipeList,
  },
  {
    path: '/recipes',
    redirect: '/',
  },
  {
    path: '/recipes/:id',
    name: 'RecipeDetail',
    component: RecipeDetail,
  },
  {
    path: '/recipes/create',
    name: 'CreateRecipe',
    component: RecipeForm,
  },
  {
    path: '/recipes/:id/edit',
    name: 'EditRecipe',
    component: RecipeForm,
  },
  {
    path: '/:pathMatch(.*)*',
    name: 'NotFound',
    component: NotFound,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
