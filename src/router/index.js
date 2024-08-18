import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('../components/homeComponent.vue')
    },
    {
      path: '/acervo',
      name: 'acervo',
      children: [
        {
          path: '',
          name: 'acervo',
          component: () => import('../components/acervoComponent.vue')
        },
        {
          path: 'detalhes/:id',
          name: 'livro',
          component: () => import('../components/acervoSingleComponent.vue')
        }
      ]
    },
    {
      path: '/seuslivros',
      name: 'seuslivros',
      component: () => import('../components/seusLivrosComponent.vue')
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('../components/loginComponent.vue')
    },
    {
      path: '/cadastro',
      name: 'cadastro',
      component: () => import('../components/cadastroComponent.vue')
    }
  ]   
})

export default router
