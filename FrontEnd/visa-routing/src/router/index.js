import { createRouter, createWebHistory } from 'vue-router'
import Token from '../views/Token.vue'
import Home from '../views/Home.vue'
import Calender from '../views/Calender.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: Home
  },
  {
    path: '/token',
    name: 'token',
    component: Token
  },
  {
    path: '/calender',
    name: 'calender',
    component: Calender
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
