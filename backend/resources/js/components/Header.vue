<script setup>
import { ref } from "vue"
import { useUserStore } from "@/store/user"

const store = useUserStore()

const activeIndex = ref("1")

const handleSelect = (key) => {
  console.log(key)
}

const logout = () => {
  store.logout()
}

</script>

<template>
  <el-menu
    :default-active="activeIndex"
    active-text-color="#ffd04b"
    background-color="#545c64"
    text-color="#fff"
    mode="horizontal"
    @select="handleSelect"
  >
    <el-menu-item index="1">
      <span>上映スケジュール</span>
    </el-menu-item>
    <el-menu-item index="2">
      <span>作品案内</span>
    </el-menu-item>
    <el-menu-item index="3">
      <span>チケット購入</span>
    </el-menu-item>
    <el-menu-item index="3">
      <el-button @click="logout">ログアウト</el-button>
    </el-menu-item>
  </el-menu>
</template>
