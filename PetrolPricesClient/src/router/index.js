import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/Main.vue'
import FAQ from '../views/FAQ.vue'
import Login from '../views/Login.vue'
import Calc from '../views/CurrencyConverter.vue'
import TravelCost from '../views/TravelCost.vue'
import Fuels from '../views/Fuels.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/faq',
      name: 'faq',
      component: FAQ
    },
    {
      path: '/login',
      name: 'login',
      component: Login
    },
    {
      path: '/calc',
      name: 'calc',
      component: Calc
    },
    {
      path: '/travelCost',
      name: 'TravelCost',
      component: TravelCost
    },
    {
      path: '/fuels',
      name: 'Fuels',
      component: Fuels
    }
    
    
    /*,
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    }*/
  ]
})

export default router
