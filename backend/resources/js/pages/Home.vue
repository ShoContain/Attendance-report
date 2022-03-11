<script setup>
import { fetchList } from "@/api/movies"
import { ref, onMounted, reactive } from "vue"
import moment from "moment"
moment.locale("ja")

const activeName = ref("todaySchedule")
const date = ref("")
const query = reactive({
  page: 1,
  limit: 15,
  date: moment().format("YYYY-MM-DD"),
})

onMounted(() => {
  load()
})

const handleClick = () => {
  console.log('a')
  query.date =
    activeName.value === "todaySchedule"
      ? moment().format("YYYY-MM-DD")
      : moment().add(1, "day").format("YYYY-MM-DD")
  load()
}

const load = async () => {
  try {
    const data = await fetchList(query)
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
