<script setup>
import NavBar from "@/components/NavBar.vue"
</script>
<template>
<el-container
    class="layout-container-demo"
    style="height: 500px; border: 1px solid #eee"
  >
<el-col :span="4">
  <NavBar></NavBar>
  </el-col>
  <el-col :span="8">
  <router-view />
  </el-col>
</el-row>
</el-container>
</template>
