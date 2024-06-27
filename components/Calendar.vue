<template>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
      <div class="bg-white p-6 rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-4">
          <button @click="prevMonth">
            <svg class="h-6 w-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
          </button>
          <div>
            <span class="text-lg font-bold">{{ months[currentMonth] }}</span>
            <span class="ml-2 text-lg">{{ currentYear }}</span>
          </div>
          <button @click="nextMonth">
            <svg class="h-6 w-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
          </button>
        </div>
        <div class="grid grid-cols-7 gap-4">
          <div v-for="day in days" :key="day" class="text-center font-bold">{{ day }}</div>
          <div v-for="(day, index) in blankDays" :key="'blank-' + index"></div>
          <div
            v-for="(date, index) in daysInMonth"
            :key="date"
            class="text-center py-2"
            :class="{
              'bg-red-500 text-white rounded-full': isToday(date),
              'bg-gray-300 text-gray-500': !isCurrentMonth(date)
            }"
          >
            {{ date.date() }}
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import dayjs from 'dayjs'
  
  export default {
    data() {
      return {
        currentMonth: dayjs().month(),
        currentYear: dayjs().year(),
        months: [
          'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
        ],
        days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
      }
    },
    computed: {
      daysInMonth() {
        const startOfMonth = dayjs().year(this.currentYear).month(this.currentMonth).startOf('month')
        const endOfMonth = dayjs().year(this.currentYear).month(this.currentMonth).endOf('month')
        const daysArray = []
  
        for (let i = startOfMonth.date(); i <= endOfMonth.date(); i++) {
          daysArray.push(startOfMonth.date(i))
        }
  
        return daysArray
      },
      blankDays() {
        const startOfMonth = dayjs().year(this.currentYear).month(this.currentMonth).startOf('month')
        return Array.from({ length: startOfMonth.day() })
      }
    },
    methods: {
      prevMonth() {
        if (this.currentMonth === 0) {
          this.currentMonth = 11
          this.currentYear--
        } else {
          this.currentMonth--
        }
      },
      nextMonth() {
        if (this.currentMonth === 11) {
          this.currentMonth = 0
          this.currentYear++
        } else {
          this.currentMonth++
        }
      },
      isToday(date) {
        return date.isSame(dayjs(), 'day')
      },
      isCurrentMonth(date) {
        return date.month() === this.currentMonth
      }
    }
  }
  </script>
  
  <style scoped>
  .grid div {
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  </style>
  