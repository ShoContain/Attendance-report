<script setup>
import { computed } from "vue"
import { Wallet, Timer, Tickets } from "@element-plus/icons-vue"
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

const jumpTo = (id) => {
  router.push(`/booking/${id}`)
}
</script>

<template>
  <el-descriptions
    v-for="(item, index) in computedValue"
    :key="index"
    :column="1"
    size="small"
    border
  >
    <el-descriptions-item>
      <template #label>
        <div class="cell-item">
          <el-icon class="mr-2"><wallet /></el-icon>
          スクリーン
        </div>
      </template>
      {{ item.auditorium_name }}
    </el-descriptions-item>
    <el-descriptions-item>
      <template #label>
        <el-icon class="mr-2"><timer /></el-icon>
        上映時間
      </template>
      {{ item.start }} ~ {{ item.end }}
    </el-descriptions-item>
    <el-descriptions-item>
      <el-button type="text" @click="jumpTo(item.id)">予約</el-button>
    </el-descriptions-item>
  </el-descriptions>
</template>

<style scoped>
.el-descriptions {
  margin-top: 30px;
}
.cell-item {
  display: flex;
  align-items: center;
}
</style>
