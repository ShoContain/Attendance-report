import Home from '@/pages/Home.vue'
import Login from '@/pages/Login.vue'

export default [
  {
    path: '/',
    name: 'Home',
    component: Home,
    meta: {
      title: 'ホーム'
    },
  },
  {
    path: '/login',
    name: 'login',
    component: Login,
    meta: {
      title: 'ログイン',
      fullScreen: true
    },
  }
]