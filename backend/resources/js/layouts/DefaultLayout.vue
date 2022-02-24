<script setup>
import Header from "@/components/Header.vue"
</script>
<template>
  <el-container
    class="layout-container-demo"
    style="height: 500px; border: 1px solid #eee"
  >
    <el-header>
      <Header></Header>
    </el-header>
    <el-main>
      <router-view />
    </el-main>
  </el-container>
</template>
