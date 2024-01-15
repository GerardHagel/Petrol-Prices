import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/Main.vue'
import FAQ from '../views/FAQ.vue'
import Login from '../views/Login.vue'
import Calc from '../views/CurrencyConverter.vue'
import TravelCost from '../views/TravelCost.vue'
import Fuels from '../views/Fuels.vue'
import Articles from '../views/Articles.vue'
import reviews from '../views/FuelStationReviews.vue'
import Admin from '../views/Admin.vue'
import Register from '../views/Register.vue'
import ResetPassword from '../views/ResetPassword.vue'

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
      path: '/register',
      name: 'Register',
      component: Register
    },
    {
      path: '/resetpassword',
      name: 'ResetPassword',
      component: ResetPassword
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
    },
    {
      path: '/articles',
      name: 'Articles',
      component: Articles
    },
    {
      path: '/reviews',
      name: 'reviews',
      component: reviews
    },
    {
      path: '/admin',
      name: 'Admin',
      component: Admin
    }
  ]
})

export default router
