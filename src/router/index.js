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
      children: [
        {
          path: 'usuarios',
          name: 'adminUsuarios',
          component: () => import('../views/admin/adminUsuariosView.vue')
        },
        {
          path: 'acervo',
          name: 'adminAcervo',
          component: () => import('../views/admin/adminAcervoView.vue')
        },
        {
          path: 'acervo/adicionar',
          name: 'adminAcervoAdicionar',
          component: () => import('../views/admin/adminAcervoAdicionarView.vue')
        },
        {
          path: 'acervo/editar/:id',
          name: 'adminAcervoEditar',
          component: () => import('../views/admin/adminLivroView.vue'),
        },
        {
          path: 'acervo/livro/:id',
          name: 'adminLivro',
          component: () => import('../views/admin/adminAcervoSingle.vue'),
          props: true
        },
      ]
    },
    {
      path: '/admin/usuario/:id',
      name: 'adminUsuario',
      component: () => import('../views/admin/adminUsuarioView.vue')
    }
  ]
})

export default router
