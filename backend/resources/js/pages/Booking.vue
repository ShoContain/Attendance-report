<script setup>
import { find } from "@/api/booking"
import { ref, onBeforeMount } from "vue"
import { useRoute } from "vue-router"

const route = useRoute()
const loading = ref(false)

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
</script>

<template>
    <div>hoge</div>
</template>
