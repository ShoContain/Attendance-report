<script setup>
import { find } from "@/api/movies"
import { ref, onBeforeMount, computed } from "vue"
import { useRoute } from "vue-router"
import { Timer } from "@element-plus/icons-vue"

const loading = ref(false)
const movie = ref(null)
const route = useRoute()

onBeforeMount(() => {
  const id = route.params && route.params.id
  load(id)
})

const load = async (id) => {
  loading.value = true
  try {
    const { data } = await find(id)
    movie.value = data
    loading.value = false
  } catch (err) {
    // TODO:404ページを作成しリダイレクトをかける
    console.log(err)
  }
}

const getPath = computed(() => movie.value.image_path)
</script>

<template>
  <el-card v-loading="loading">
    <el-row :gutter="6">
      <el-col :md="10" :offset="2" class="demo-image__lazy">
        <div class="block">
          <el-image :src="getPath"></el-image>
          <span class="title">{{ movie.name }}</span>
          <el-tag
            v-for="category in movie.categories"
            :key="category"
            class="ml-2"
            type="info"
            >{{ category }}</el-tag
          >
        </div>
      </el-col>
      <el-col :md="12">
        <div>
          {{ movie.description }}
        </div>
        <div class="mb-2" style="color: #409efc">
          <el-icon :size="20" style="vertical-align: middle"><timer /></el-icon>
          <span style="vertical-align: middle">{{ movie.minutes }}分</span>
        </div>
        <el-button type="danger">予約する</el-button>
      </el-col>
    </el-row>
  </el-card>
</template>
<style scoped>
.demo-image__lazy .el-image {
  padding: 0 5px;
  max-width: 300px;
  max-height: 200px;
}
.demo-image__lazy .title {
  display: block;
  color: var(--el-text-color-secondary);
  font-size: 20px;
  margin-bottom: 20px;
}
</style>
