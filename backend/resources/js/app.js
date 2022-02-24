/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require("./bootstrap")

import { createApp } from "vue"
import ElementPlus from 'element-plus';
import 'element-plus/dist/index.css'
import locale from "element-plus/lib/locale/lang/en";
import App from "./App.vue"
import { createPinia } from 'pinia'
import piniaPersist from 'pinia-plugin-persist'
import router from "./router"
import './router/permission' 

const app = createApp(App)
const pinia = createPinia()

app.use(router)
app.use(ElementPlus,{locale})
app.use(pinia.use(piniaPersist))
app.mount("#app")
