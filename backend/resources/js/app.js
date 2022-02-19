/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require("./bootstrap")

import { createApp } from "vue"
import router from "./router"
import App from "./App.vue"
import ElementPlus from 'element-plus';
import 'element-plus/dist/index.css'
import locale from "element-plus/lib/locale/lang/en";

createApp(App).use(router).use(ElementPlus,{locale}).mount("#app")
