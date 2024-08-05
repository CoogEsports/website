<!--TODO
created: 06/27/2024 author of todo: brandon

1. figure out how to apply multiple class overrides based on one condition.
   this is for current day in calendar. want to make white text and more transparent bg color
2. functionality- will have to query database and display all events on proper dates. don't forget -->

<template>
  <div class="flex justify-center items-center min-h-fit bg-lighter-base">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-screen-lg">
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
        <div v-for="day in days" :key="day" class="text-center font-bold">
          {{ day }}
        </div>
        <div v-for="(day, index) in blankDays" :key="'blank-' + index"></div>
        <!-- want to change styling of current day. right now only first class change works (bg-red-500) -->
        <button
          v-for="(date, index) in daysInMonth"
          :key="date"
          class="relative text-center py-2 focus:outline-none"
          :class="[{
            '!bg-red-500 text-white': isToday(date),
            '!bg-gray-300 text-gray-500': !isCurrentMonth(date)
          }, 'calendar-day']"
        >
          <div class="absolute top-0 left-0 ml-1 mt-1 text-sm text-gray-600">{{ date.date() }}</div>
          <div class="absolute bottom-0 right-0 mr-1 mb-1 text-xs text-gray-500">Event</div>
        </button>
      </div>
    </div>
  </div>
</template>

<!-- script to track current day as well as populate current calendar year -->
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

<!-- style for individual cells of calendar -->
<style scoped>
.grid {
  display: grid;
  grid-template-columns: repeat(7, minmax(0, 1fr));
  gap: 8px;
}

.grid button {
  height: 80px; 
  display: flex;
  justify-content: center;
  align-items: right;
  border: none;
  background-color: transparent;
  cursor: pointer;
  position: relative;
  width: auto; 
}

.grid button:hover {
  background-color: #f0f0f0;
}

.grid button .text-sm {
  font-size: 0.75rem; 
}

.grid button .text-xs {
  font-size: 0.625rem; 
}

.calendar-day {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 40px;
  font-weight: bold;
}
</style>
