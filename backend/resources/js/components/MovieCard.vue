<script setup>
import { computed } from "vue"
import { useRouter } from "vue-router"

const router = useRouter()

const props = defineProps({
  modelValue: {
    type: [Array],
    default: null,
  },
})
const computedValue = computed({
  get: () => props.modelValue,
  set: (value) => {
    emit("update:modelValue", value)
  },
})

const jumpToDetail = (id) => {
  router.push(`/movie/${id}`)
}
</script>

<template>
  <el-row>
    <el-col
      v-for="(movie, index) in computedValue"
      :key="index"
      :span="8"
      :offset="index > 0 ? 2 : 0"
    >
      <el-card :body-style="{ padding: '0px' }">
        <el-image
          style="width: 300px; height: 250px"
          :src="movie.image_path"
          fit="fill"
        ></el-image>
        <div style="padding: 14px">
          <span>{{ movie.name }}</span>
          <div class="bottom">
            <time class="time">{{ movie.start }} 開始</time>
            <el-button
              type="text"
              class="button"
              @click="jumpToDetail(movie.movie_id)"
              >詳細</el-button
            >
          </div>
        </div>
      </el-card>
    </el-col>
  </el-row>
</template>
<style scoped>
.time {
  font-size: 13px;
  color: #999;
}

.bottom {
  margin-top: 13px;
  line-height: 12px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.button {
  padding: 0;
  min-height: auto;
}

.image {
  width: 100%;
  display: block;
}
</style>
