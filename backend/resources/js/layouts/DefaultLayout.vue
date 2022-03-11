<script setup>
import Header from "@/components/Header.vue"
</script>
<template>
  <el-container>
    <el-header>
      <Header></Header>
    </el-header>
    <el-main>
      <router-view />
    </el-main>
  </el-container>
</template>
