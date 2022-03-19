<script setup>
import { find, store } from "@/api/booking"
import { useReservationStore } from "@/store/reservation"
import { ref, computed, reactive } from "vue"
import { useRoute,useRouter } from "vue-router"

const route = useRoute()
const router = useRouter()

const reservationStore = useReservationStore()

const loading = ref(false)
const screen = ref(null)
const selected = ref([])
const visible = ref(false)
const form = reactive({
  scheduledMovieId: null,
  selectedSeat: [],
})

const load = async (id) => {
  loading.value = true
  try {
    const { data } = await find(id)
    screen.value = data
    form.scheduledMovieId = data.scheduled_movie_id
    loading.value = false
  } catch (err) {
    // TODO:404ページを作成しリダイレクトをかける
    console.log(err)
  }
}

const handleSelect = async (id) => {
  const index = form.selectedSeat.indexOf(id)
  if (index === -1) {
    form.selectedSeat.push(id)
  } else {
    form.selectedSeat.splice(index, 1)
  }
}

const handleConfirmBooking = async () => {
  try {
    const result = await store(form)
    reservationStore.save(result.data)
    router.push('/reservation')
  } catch (err) {
    // if seat is taken reload this page
    router.go()
  }
}

const hasSelected = computed(() => form.selectedSeat.length > 0)
const selectedCount = computed(() => form.selectedSeat.length )

const id = route.params && route.params.id
load(id)
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
        <button
          v-for="(seat, seat_index) in row"
          :key="seat_index"
          class="seat"
          :class="[
            { occupied: screen.occupied_seats.includes(seat.id) },
            { selected: form.selectedSeat.includes(seat.id) },
          ]"
          :disabled="screen.occupied_seats.includes(seat.id)"
          @click="handleSelect(seat.id)"
        ></button>
      </div>
    </div>

    <p v-if="hasSelected" class="text">
      <span id="count">{{ form.selectedSeat.length }}</span
      >席選択しています。
    </p>
    <p v-else class="text">席を選択してください。</p>

    <el-popover
      v-if="hasSelected"
      v-model:visible="visible"
      placement="top"
      :width="160"
    >
      <p>{{ selectedCount }}席の予約を確定します。よろしいですか？</p>
      <div style="text-align: right; margin: 0">
        <el-button size="small" type="text" @click="visible = false"
          >キャンセル</el-button
        >
        <el-button size="small" type="primary" @click="handleConfirmBooking"
          >確定</el-button
        >
      </div>
      <template #reference>
        <el-button :disabled="!hasSelected" @click="visible = true"
          >予約</el-button
        >
      </template>
    </el-popover>
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
  width: 40%;
  margin: 20px auto;
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
