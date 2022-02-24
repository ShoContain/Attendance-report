<script setup>
import { useUserStore } from "@/store/user"
const store = useUserStore()
</script>

<template>
  <h1 class="text-3xl text-green-500">{{ store.user.name }}</h1>
</template>
