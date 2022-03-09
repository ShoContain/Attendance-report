<script setup>
import { fetchList } from "@/api/movies"
import { ref, onMounted } from "vue"
import moment from "moment"
moment.locale("ja")

const activeName = ref("todaySchedule")
const date = ref("")

onMounted(() => {
  load()
})

const handleClick = (tab, event) => {
  console.log(tab, event)
}

const load = async () => {
  try {
    date.value =
      activeName.value === "todaySchedule"
        ? moment().endOf("day")
        : moment.add(1, "day").endOf("day")
    console.log(date.value)
    const data = await fetchList(date.value)
  } catch (err) {
    console.log(err)
  }
}
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
