import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('../assets/components/homeComponent.vue')
    },
    {
      path: '/acervo',
      name: 'acervo',
      children: [
        {
          path: '',
          name: 'acervo',
          component: () => import('../assets/components/acervoComponent.vue')
        },
        {
          path: 'detalhes/:id',
          name: 'livro',
          component: () => import('../assets/components/acervoSingleComponent.vue')
        }
      ]
    },
    {
      path: '/seuslivros',
      name: 'seuslivros',
      component: () => import('../assets/components/seusLivrosComponent.vue')
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('../assets/components/loginComponent.vue')
    },
    {
      path: '/cadastro',
      name: 'cadastro',
      component: () => import('../assets/components/cadastroComponent.vue')
    }
  ]   
})

export default router
