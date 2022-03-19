import { defineStore } from "pinia"
import { login, me, logout } from "@/api/user"

export const useUserStore = defineStore("userStore", {
  //stateの定義、初期値を返す関数を定義する。
  state: () => ({
    user: null,
    isAuth: false,
  }),
  persist: {
    enabled: true,
  },
  getters: {
    isLoggedIn(state) {
      return state.isAuth
    },
    getUserInfo(state) {
      return state.user
    },
  },
  actions: {
    async login(credentials) {
      await login(credentials)
      const user = await me()
      this.user = user
      this.isAuth = true
    },
    async logout() {
      await logout()
      this.user = null
      this.isAuth = false
    },
  },
})
