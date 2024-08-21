import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('../views/homeView.vue')
    },
    {
      path: '/acervo',
      name: 'acervo',
      component: () => import('../views/acervoView.vue')
    },
    {
      path: '/acervo/livro/:id',
      name: 'livro',
      component: () => import('../views/acervoSingleView.vue')
    },
    {
      path: '/seuslivros',
      name: 'seuslivros',
      component: () => import('../views/seusLivrosView.vue')
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('../views/loginView.vue')
    },
    {
      path: '/cadastro',
      name: 'cadastro',
      component: () => import('../views/cadastroView.vue')
    },
    {
      path: '/:pathMatch(.*)*',
      name: 'NotFound',
      component: () => import('../views/notFoundView.vue')
    }, 
    {
      path: '/admin',
      name: 'admin',
      component: () => import('../views/adminPanelView.vue')
    }
  ]
})

export default router
