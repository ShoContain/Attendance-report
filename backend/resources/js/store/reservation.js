import { defineStore } from "pinia"

export const useReservationStore = defineStore("reservationStore", {
  state: () => ({
    reservations: [],
  }),
  getters: {
    getReservations(state) {
      return state.reservations
    }
  },
  actions: {
    save(reservation) {
      this.reservations = reservation
    },
  },
})
