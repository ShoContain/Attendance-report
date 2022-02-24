<script setup>
import { reactive, ref } from "vue"
import { useRoute, useRouter } from "vue-router"
import { useUserStore } from "@/store/user"
import { csrf } from "@/api/user"

const router = useRouter()
const route = useRoute()

const store = useUserStore()

const formmRef = ref()

const form = reactive({
  email: "",
  password: "",
  remember: false,
})

const loading = ref(false)

const rules = reactive({
  email: [
    {
      required: true,
      message: "メールアドレスは必須です。",
      trigger: "blur",
    },
    {
      type: "email",
      message: "メールアドレスの形式で入力して下さい。",
      trigger: ["blur"],
    },
  ],
  password: [
    {
      required: true,
      message: "パスワードは必須です。",
      trigger: "blur",
    },
  ],
})

const redirect = ref(route.query.redirect)
const submitForm = (formEl) => {
  if (!formEl) return
  formEl.validate((valid) => {
    if (valid) {
      loading.value = true
      csrf().then(() => {
        store
          .login(form)
          .then(() => {
            router.push({ path: redirect.value || "/" })
            loading.value = false
          })
          .catch(() => {
            loading.value = false
          })
      })
    } else {
      console.log("error submit!")
      return false
    }
  })
}
</script>

<template>
  <el-form ref="formmRef" :model="form" :rules="rules" label-width="120px">
    <el-form-item label="メールアドレス" prop="email">
      <el-input v-model="form.email"></el-input>
    </el-form-item>
    <el-form-item label="パスワード" prop="password">
      <el-input v-model="form.password" type="password"></el-input>
    </el-form-item>
    <el-form-item label="ログイン情報を記憶する" prop="remember">
      <el-checkbox v-model="form.remember"></el-checkbox>
    </el-form-item>
    <el-form-item>
      <el-button
        v-loading="loading"
        type="primary"
        @click="submitForm(formmRef)"
        >ログイン</el-button
      >
    </el-form-item>
  </el-form>
</template>
<style scoped>
.el-form-item--default {
  margin-bottom: 30px;
}
</style>
