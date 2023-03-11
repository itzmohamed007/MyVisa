import { createRouter, createWebHistory } from 'vue-router'
import Token from '../views/Token.vue'
import Form from '../views/Form.vue'
import Calender from '../views/Calender.vue'
import Home from '../views/Home.vue'
import Track from '../views/Track.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: Home
  },
  {
    path: '/form',
    name: 'form',
    component: Form
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
  },
  {
    path: '/track',
    name: 'track',
    component: Track
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
