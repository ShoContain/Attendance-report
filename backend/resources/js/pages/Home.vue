<script setup>
import { ref } from "vue"
import { fetchList } from "@/api/movies"

const activeName = ref("todaySchedule")

const handleClick = (tab, event) => {
  console.log(tab, event)
}

const load = async () => {
  try {
    const data = await fetchList(new Date())
    console.log(data)
  } catch (err) {
    console.log(err)
  }
}
load()
</script>

<template>
  <el-card>
    <el-tabs v-model="activeName" class="demo-tabs" @tab-click="handleClick">
      <el-tab-pane label="本日の上映予定" name="todaySchedule"></el-tab-pane>
      <el-tab-pane label="明日の上映予定" name="tomorrowSchedule"
        >明日の上映予定</el-tab-pane
      >
    </el-tabs>
  </el-card>
</template>
