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
          <svg
class="h-6 w-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
          </svg>
        </button>
        <div>
          <span class="text-4xl font-bold text-gray-600">{{ months[currentMonth] }}</span>
          <span class="ml-2 text-4xl text-gray-600">{{ currentYear }}</span>
        </div>
        <button @click="nextMonth">
          <svg
class="h-6 w-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
          </svg>
        </button>
      </div>
      <div class="grid grid-cols-7 border-t border-l border-gray-300">
        <!-- Day headers -->
        <div
          v-for="dayName in days" :key="dayName"
          class="text-center text-gray-600 font-bold p-2 border-r border-b border-gray-300">
          {{ dayName }}
        </div>

        <!-- previous month's days -->
        <div
          v-for="(day, index) in previousMonthDays" :key="'prev-' + index"
          class="relative text-center py-2 focus:outline-none border-r border-b border-gray-300 h-24 bg-gray-200 text-gray-400">
          <div class="absolute top-0 left-0 ml-1 mt-1 text-sm">{{ day }}</div>

          <!-- display events for previous month's days -->
          <div v-if="getEventsForDate(day).length" class="absolute bottom-0 left-0 ml-1 mb-1 text-xs text-black">
            <button v-for="event in getEventsForDate(day)" :key="event.title">
              {{ event.title }}
              {{ event.time }}
              {{ event.description }}
            </button>
          </div>
        </div>

        <!-- current month's days -->
        <div
          v-for="(date) in daysInMonth" :key="date.format('YYYY-MM-DD')"
          class="relative text-center py-2 focus:outline-none border-r border-b border-gray-300 h-24" :class="[
            {
              'bg-red-500 bg-opacity-50 font-bold ': isToday(date),
              'bg-gray-300 text-gray-500': !isCurrentMonth(date)
            },
            'calendar-day'
          ]">
          <div class="absolute top-0 left-0 ml-1 mt-1 text-sm text-gray-600">{{ date.date() }}</div>
          <div v-if="getEventsForDate(date).length" class="absolute bottom-0 left-0 ml-1 mb-1 text-xs text-black">
            <!-- could be anchor tag link to scroll down page for event description -->
             
             <!-- might need to add event id for primary key to match schemaa -->
            <button v-for="event in getEventsForDate(date)" :key="event.title">
              {{ event.title }}
              {{ event.time }}
              {{ event.description }}
            </button>
          </div>
        </div>

        <!-- next month's days -->
        <div
          v-for="(day, index) in nextMonthDays" :key="'next-' + index"
          class="relative text-center py-2 focus:outline-none border-r border-b border-gray-300 h-24 bg-gray-200 text-gray-400">
          <div class="absolute top-0 left-0 ml-1 mt-1 text-sm">{{ day }}</div>

          <!-- display events for next month's days -->
          <div v-if="getEventsForDate(day).length" class="absolute bottom-0 left-0 ml-1 mb-1 text-xs text-blue-600">
            <button v-for="event in getEventsForDate(day)" :key="event.title">
              {{ event.title }}
              {{ event.time }}
              {{ event.description }}
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script setup>
import { ref, computed } from 'vue'
import dayjs from 'dayjs'

// reactive state
const currentMonth = ref(dayjs().month())
const currentYear = ref(dayjs().year())

const months = [
  'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
]
const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']

const events = ref([
  {
    title: '1st General Meeting',
    date: '2024-08-22',
    time: '8:00PM',
    description: 'PLACEHOLDER',
  },
  {
    title: 'a duuuu',
    date: '2024-08-13',
    time: '8:00PM',
    description: 'PLACEHOLDER',
  },
  {
    title: 'Custom ARAM with Officers',
    date: '2024-7-30',
    time: '9:00PM',
    description: 'PLACEHOLDER',
  },
])

const daysInMonth = computed(() => {
  const startOfMonth = dayjs().year(currentYear.value).month(currentMonth.value).startOf('month')
  const endOfMonth = dayjs().year(currentYear.value).month(currentMonth.value).endOf('month')
  const daysArray = []

  for (let i = startOfMonth.date(); i <= endOfMonth.date(); i++) {
    daysArray.push(startOfMonth.date(i))
  }

  return daysArray
})

const prevMonth = () => {
  if (currentMonth.value === 0) {
    currentMonth.value = 11
    currentYear.value--
  } else {
    currentMonth.value--
  }
}

const nextMonth = () => {
  if (currentMonth.value === 11) {
    currentMonth.value = 0
    currentYear.value++
  } else {
    currentMonth.value++
  }
}
const previousMonthDays = computed(() => {
  const startOfMonth = dayjs().year(currentYear.value).month(currentMonth.value).startOf('month')
  const previousMonth = startOfMonth.subtract(1, 'month')
  const daysInPreviousMonth = previousMonth.daysInMonth()

  const leadingDays = startOfMonth.day() // days in prev month on current month calendar
  const previousMonthDaysArray = []

  for (let i = daysInPreviousMonth - leadingDays + 1; i <= daysInPreviousMonth; i++) {
    previousMonthDaysArray.push(i)
  }

  return previousMonthDaysArray
})

const nextMonthDays = computed(() => {
  const endOfMonth = dayjs().year(currentYear.value).month(currentMonth.value).endOf('month')
  const trailingDays = 6 - endOfMonth.day() // days in next month on current month calendar
  const nextMonthDaysArray = []

  for (let i = 1; i <= trailingDays; i++) {
    nextMonthDaysArray.push(i)
  }

  return nextMonthDaysArray
})



const isToday = (date) => date.isSame(dayjs(), 'day')
const isCurrentMonth = (date) => date.month() === currentMonth.value

// get events for days displayed on calendar
const getEventsForDate = (date) => {
  return events.value.filter(event => dayjs(event.date).isSame(date, 'day'))
}

</script>
