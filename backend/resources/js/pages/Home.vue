<script setup>
import { fetchList } from "@/api/movies"
import { ref, onBeforeMount, reactive } from "vue"
import moment from "moment"
moment.locale("ja")
import MovieCard from "@/components/MovieCard"

const activeName = ref("todaySchedule")
const list = ref([])
const loading = ref(false)
const query = reactive({
  page: 1,
  limit: 15,
  date: moment().format("YYYY-MM-DD"),
})

onBeforeMount(() => {
  load()
})

const handleClick = () => {
  query.date =
    activeName.value === "todaySchedule"
      ? moment().format("YYYY-MM-DD")
      : moment().add(1, "day").format("YYYY-MM-DD")
  load()
}

const load = async () => {
  try {
    loading.value = true
    const { data } = await fetchList(query)
    list.value = data
    loading.value = false
  } catch (err) {
    console.log(err)
  }
}
</script>

<template>
    <el-tabs
      v-model="activeName"
      v-loading="loading"
      class="demo-tabs"
      @tab-click="handleClick"
    >
      <el-tab-pane label="本日の上映予定" name="todaySchedule">
        <movie-card v-model="list"></movie-card>
      </el-tab-pane>
      <el-tab-pane label="明日の上映予定" name="tomorrowSchedule"
        ><movie-card v-model="list"></movie-card
      ></el-tab-pane>
    </el-tabs>
</template>
