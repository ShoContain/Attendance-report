<script setup>
import { useReservationStore } from "@/store/reservation"
import { onMounted } from "vue"

const reservationStore = useReservationStore()

</script>

<template>
  <div v-for="(item,index) in reservationStore.getReservations" :key="index">
    <p>{{ item.movie_name }}</p>
  </div>
</template>
