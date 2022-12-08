import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '@/views/HomeView.vue'
import NotFound from '@/views/404.vue'
import teamPage from '@/views/teamPage.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path:'/team/:id',
      name:'teamPage',
      component: teamPage,
      params: true
    },

    {
      path:'/:pathMatch(.*)*',
      name:'404',
      component:NotFound
    }

   
  ]
})

export default router
