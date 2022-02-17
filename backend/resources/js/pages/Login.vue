<script setup>
import { reactive } from "vue"
import { login } from "@/api/user"

const form = reactive({
  email: "",
  password: "",
  remember: false,
})

const handleLogin = async () => {
  try {
    const data = await login(form)
    console.log(data)
  } catch (err) {
    console.log(err)
  }
}
</script>

<template>
  <form
    class="bg-white shadow-md rounded p-8 mb-2"
    @submit.prevent="handleLogin"
  >
    <div class="md:flex md:items-center mb-6">
      <div class="md:w-1/3">
        <label
          class="block text-gray-500 text-sm font-bold md:text-right mb-1 md:mb-0 pr-4"
          for="inline-full-name"
        >
          メール
        </label>
      </div>
      <div class="md:w-2/3">
        <input
          id="inline-full-name"
          v-model="form.email"
          class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
          type="text"
        />
      </div>
    </div>
    <div class="md:flex md:items-center mb-6">
      <div class="md:w-1/3">
        <label
          class="block text-gray-500 text-sm font-bold md:text-right mb-1 md:mb-0 pr-4"
          for="inline-password"
        >
          パスワード
        </label>
      </div>
      <div class="md:w-2/3">
        <input
          id="inline-password"
          v-model="form.password"
          class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
          type="password"
          placeholder="******************"
        />
      </div>
    </div>
    <div class="md:flex md:items-center mb-6">
      <div class="md:w-1/3"></div>
      <label class="md:w-2/3 block text-gray-500 font-bold">
        <input
          v-model="form.remember"
          class="mr-2 leading-tight"
          type="checkbox"
        />
        <span class="text-sm"> ログイン情報を記憶する </span>
      </label>
    </div>
    <div class="md:flex md:items-center">
      <div class="md:w-1/3"></div>
      <div class="md:w-1/3">
        <button
          type="submit"
          class="shadow bg-slate-700 hover:bg-slate-600 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
        >
          ログイン
        </button>
      </div>
    </div>
    <div class="mt-6 text-center text-sm">
      <a href="#" class="underline">新規登録</a>
    </div>
  </form>
</template>
