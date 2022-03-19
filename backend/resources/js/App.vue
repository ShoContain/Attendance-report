<script setup>
import { computed } from "vue"
import { useRoute } from "vue-router"
import DefaultLayout from "@/layouts/DefaultLayout.vue"
import FullScreenLayout from "@/layouts/FullScreenLayout.vue"

const route = useRoute()

const layout = computed(() =>
  route.meta.fullScreen ? FullScreenLayout : DefaultLayout
)
</script>

<template>
  <component :is="layout"></component>
</template>
