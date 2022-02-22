import { defineStore } from "pinia"
import { login, getCsrfCookie, getInfo } from "@/api/user"

export const useUserStore = defineStore("main", {
  //stateの定義、初期値を返す関数を定義する。
  state: () => ({
        user: null,
        isAuth: false,
  }),
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
      await getCsrfCookie()
      await login(credentials)
      this.getInfo()
    },
    async getInfo() {
      try {
        const user = await getInfo()
        this.user = user
        this.isAuth = true
      } catch (err) {
        console.log(err)
      }
    },
  },
})
