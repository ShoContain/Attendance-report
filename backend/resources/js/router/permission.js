import router from "./index"
import { useUserStore } from "@/store/user"

router.beforeEach(async (to, from, next) => {
  const store = useUserStore()
  const isLoggedIn = store.isLoggedIn
  if (isLoggedIn) {
    if (to.path === "/login") {
      next({ path: "/" })
    } else {
      next()
    }
  } else {
    if (to.meta.requiresAuth) {
      // other pages that do not have permission to access are redirected to the login page.
      next(`/login?redirect=${to.path}`)
    } else {
      // in the free login whitelist, go directly
      next()
    }
  }
})
