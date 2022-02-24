<script setup>
import { ref } from "vue"

const activeIndex = ref("1")

const handleSelect = (key, keyPath) => {
  console.log(key, keyPath)
}
</script>

<template>
  <el-menu
    active-text-color="#ffd04b"
    background-color="#545c64"
    class="el-menu-vertical-demo"
    :default-active="activeIndex"
    text-color="#fff"
    mode="horizontal"
    @select="handleSelect"
  >
    <el-menu-item index="2">
      <el-icon><icon-menu /></el-icon>
      <span>上映スケジュール</span>
    </el-menu-item>
    <el-menu-item index="2">
      <el-icon><icon-menu /></el-icon>
      <span>作品案内</span>
    </el-menu-item>
    <el-menu-item index="3">
      <el-icon><document /></el-icon>
      <span>チケット購入</span>
    </el-menu-item>
  </el-menu>
</template>
