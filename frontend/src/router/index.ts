import { createRouter, createWebHistory } from 'vue-router'
import List from '@/pages/items/List.vue'
import Register from '@/pages/register/Register.vue';

const routes = [
  { path: '/item', component: List },
  { path: '/register', component: Register },
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
