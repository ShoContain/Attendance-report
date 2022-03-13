import Home from "@/pages/Home.vue"
import Login from "@/pages/Login.vue"
import Detail from "@/pages/Detail.vue"

export default [
  {
    path: "/",
    name: "Home",
    component: Home,
    meta: {
      title: "ホーム",
      requiresAuth: false,
    },
  },
  {
    path: "/login",
    name: "login",
    component: Login,
    meta: {
      title: "ログイン",
      fullScreen: true,
      requiresAuth: false,
    },
  },
  {
    path: "/movie/:id(\\d+)",
    name: "detail",
    component: Detail,
    meta: {
      title: "詳細情報",
      requiresAuth: false,
    },
  },
]
