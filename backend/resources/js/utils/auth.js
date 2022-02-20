export const auth = {
    storageKey: 'api-token',
  
    getToken () {
       return window.localStorage.getItem(this.storageKey);
    },
  
    hasToken () {
      return Boolean(this.getToken())
    },
  
    setToken (token) {
        window.localStorage.setItem(this.storageKey, token);
    },
  
    destroy () {
      window.localStorage.removeItem(this.storageKey)
    }
  }