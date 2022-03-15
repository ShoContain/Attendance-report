<script setup>
import { find } from "@/api/booking"
import { ref, onBeforeMount } from "vue"
import { useRoute } from "vue-router"

const route = useRoute()
const loading = ref(false)
const screen = ref(null)

onBeforeMount(() => {
  const id = route.params && route.params.id
  load(id)
})

const load = async (id) => {
  loading.value = true
  try {
    const { data } = await find(id)
    screen.value = data
    loading.value = false
  } catch (err) {
    // TODO:404ページを作成しリダイレクトをかける
    console.log(err)
  }
}
</script>

<template>
  <body>
    <ul class="showcase">
      <li>
        <div class="seat selected"></div>
        <small>選択した席</small>
      </li>
      <li>
        <div class="seat occupied"></div>
        <small>販売対象外</small>
      </li>
    </ul>

    <div class="container">
      <div class="screen"></div>

      <div v-for="(row, index) in screen.rows" :key="index" class="row">
        <div
          v-for="(seat, seat_index) in row"
          :key="seat_index"
          class="seat"
        ></div>
      </div>
    </div>

    <p class="text">
      You have selected <span id="count">0</span> seats for a price of $<span
        id="total"
        >0</span
      >
    </p>
  </body>
</template>

<style scoped>
body {
  background-color: #242333;
  color: #fff;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100vh;
  font-family: "Lato", sans-serif;
  margin: 0;
}
.container {
  perspective: 1000px;
  margin-bottom: 30px;
}

.seat {
  background-color: #444451;
  height: 12px;
  width: 15px;
  margin: 3px;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

.seat.selected {
  background-color: #6feaf6;
}

.seat.occupied {
  background-color: #fff;
}

.seat:nth-of-type(2) {
  margin-right: 18px;
}

.seat:nth-last-of-type(2) {
  margin-left: 18px;
}

.seat:not(.occupied):hover {
  cursor: pointer;
  transform: scale(1.2);
}

.showcase .seat:not(.occupied):hover {
  cursor: default;
  transform: scale(1);
}

.showcase {
  background: rgba(0, 0, 0, 0.1);
  padding: 5px 10px;
  border-radius: 5px;
  color: #777;
  list-style-type: none;
  display: flex;
  justify-content: space-between;
}

.showcase li {
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 10px;
}

.showcase li small {
  margin-left: 2px;
}

.row {
  display: flex;
  justify-content: center;
}

.screen {
  background-color: #fff;
  height: 70px;
  width: 100%;
  margin: 15px 0;
  transform: rotateX(-45deg);
  box-shadow: 0 3px 10px rgba(255, 255, 255, 0.7);
}

p.text {
  margin: 5px 0;
}

p.text span {
  color: #6feaf6;
}
</style>
