<!-- DisplayCalendar.vue

created: 06/27/2024 author of todo: brandon
updated: 10/08/2024 (added test qr code tied to every event)

-->
<!--TODO
  1. figure out qrcode generation display with admin linking qrcode
  2. only display qrcode when admin links correct google form
  3. allow admin to close qr code 
-->

<template>
  <div class="flex justify-center items-center min-h-fit">
    <div class="bg-calendar p-6 rounded-2xl w-full max-w-screen-lg">
      <div class="flex justify-between items-left mb-4">
        <div>
          <span class="text-4xl font-arimo font-bold text-black">{{
            months[currentMonth]
          }}</span>
          <span class="ml-2 text-4xl font-thin text-black">{{
            currentYear
          }}</span>
        </div>
        <div>
          <button @click="prevMonth">
            <svg
              class="h-6 w-6 text-white"
              fill="white"
              stroke="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
            >
              <polygon
                points="8,0 24,12 8,24"
                transform="scale(-1, 1) translate(-24, 0)"
              />
            </svg>
          </button>
          <button @click="nextMonth">
            <svg
              class="h-6 w-6 text-white"
              fill="white"
              stroke="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
            >
              <polygon points="8,0 24,12 8,24" />
            </svg>
          </button>
        </div>
      </div>
      <div class="grid grid-cols-7 gap-0.5 rounded-xs text-overflow">
        <!-- day headers -->
        <div
          v-for="dayName in days"
          :key="dayName"
          class="text-left text-[#111111] font-arimo px-1"
        >
          {{ dayName }}
        </div>

        <!-- previous month's days -->
        <div
          v-for="(pmDay, index) in previousMonthDays"
          :key="'prev-' + index"
          class="relative text-center rounded-lg py-2 focus:outline-none border-r border-b border-gray-300 h-24 bg-prev-next-month text-[#b3b2b2]"
        >
          <div class="justify-between">
            <div
              class="absolute top-0 left-0 ml-1 mt-1 mb-max text-sm rounded-lg p-1"
            >
              {{ pmDay.date() }}
            </div>

            <!-- display events for previous month's days -->
            <div
              v-if="getEventsForDate(pmDay).length"
              class="absolute inset-x-0 bottom-0 ml-4 mb-1 mr-3"
            >
              <a
                v-for="event in getEventsForDate(pmDay)"
                :key="event.id"
                :href="
                  '#event-' + event.title.replace(/\s+/g, '-').toLowerCase()
                "
                :class="{ 'line-through': isPastEvent(event.datetime) }"
                class="text-xs ellipsis-multiline"
              >
                <span class="line-clamp-3">
                  {{ event.title }}
                </span>
                <span>
                  {{ event.datetime.format('h:mm A') }}
                </span>
              </a>
            </div>
          </div>
        </div>

        <!-- current month's days -->
        <!-- curreently !isCurrentMonth(date) is redundent since isToday(date) compares all daymonthyear-->
        <div
          v-for="date in daysInMonth"
          :key="date.format('YYYY-MM-DD')"
          class="relative bg-current-month rounded-lg text-[#333333] text-center py-2 focus:outline-none border-r border-b h-24 overflow-hidden"
        >
          <div
            :class="{
              'px-2 bg-red-500 font-arimo rounded-full text-white':
                isToday(date),
            }"
            class="absolute top-0 left-0 ml-1 mt-1 text-sm p-1"
          >
            {{ date.date() }}
          </div>
          <div
            v-if="getEventsForDate(date).length"
            class="absolute inset-x-0 bottom-0 ml-4 mb-1 mr-3"
          >
            <!-- could be anchor tag link to scroll down page for event description -->

            <!-- might need to add event id for primary key to match schemaa -->
            <a
              v-for="event in getEventsForDate(date)"
              :key="event.id"
              :href="'#event-' + event.title.replace(/\s+/g, '-').toLowerCase()"
              :class="{ 'line-through': isPastEvent(event.datetime) }"
              class="font-arimo text-xs font-bold text-[#333333] ellipsis-multiline"
            >
              <span class="line-clamp-3">
                {{ event.title }}
              </span>
              <span>
                {{ event.datetime.format('h:mm A') }}
              </span>
            </a>
          </div>
        </div>

        <!-- next month's days -->
        <div
          v-for="(nmDay, index) in nextMonthDays"
          :key="'next-' + index"
          class="relative text-center rounded-lg py-2 focus:outline-none border-r border-b border-gray-300 h-24 bg-prev-next-month"
        >
          <div class="absolute top-0 left-0 ml-1 mt-1 text-sm text-[#b3b2b2]">
            {{ nmDay.date() }}
          </div>

          <!-- display events for next month's days -->
          <div
            v-if="getEventsForDate(nmDay).length"
            class="absolute inset-x-0 bottom-0 ml-4 mb-1 mr-3"
          >
            <a
              v-for="event in getEventsForDate(nmDay)"
              :key="event.id"
              :href="'#event-' + event.title.replace(/\s+/g, '-').toLowerCase()"
              :class="{ 'line-through': isPastEvent(event.datetime) }"
              class="text-xs flexbox text-[#b3b2b2] ellipsis-multiline"
            >
              <span class="line-clamp-3">
                {{ event.title }}
              </span>
              <span>
                {{ event.datetime.format('h:mm A') }}
              </span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Event Detail Sections -->
  <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700" >

  <h1 class="text-3xl font-bold text-secondary my-8 mb-10">UPCOMING EVENTS</h1>

  <!-- Display future events in a grid layout -->
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
    <div
      v-for="event in futureEvents"
      :key="event.id"
      @click="handleEventClick(event)"
    >
      <div
        class="bg-current-month h-full text-black border border-gray-300 rounded-md overflow-hidden"
      >
        <!-- Content container with padding and spacing -->
        <div class="p-4">
          <h2
            class="text-lg font-arimo font-bold mb-2 overflow-hidden text-ellipsis whitespace-nowrap"
          >
            {{ event.title }}
          </h2>
          <p class="font-bold text-secondary text-md mb-1 cursor-pointer">
            | QR-Code |
          </p>
          <p class="text-sm mb-1">
            Date: {{ event.datetime.format('dddd, MMMM D, YYYY') }}
          </p>
          <p class="text-sm mb-1">
            Time: {{ event.datetime.format('h:mm A') }}
          </p>
          <p class="text-sm">{{ event.description }}</p>
        </div>
      </div>
    </div>
  </div>

  <!-- qrcode component call -->
  <QRCode :show="showQrCode" :data="googleFormUrl" @close="closeQrCode" />

  <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700" >

  <!-- toggle button for past events -->
  <button
    class="w-auto text-left p-4 bg-prev-next-month text-lg font-arimo font-bold text-black border border-gray-300 rounded-md mb-2"
    @click="togglePastEvents"
  >
    <p v-if="!showPastEvents">Show Past Events</p>
    <p v-else>Hide Past Events</p>
  </button>

  <!-- display past events -->
  <div v-if="showPastEvents" class="grid grid-cols-1 lg:grid-cols-3 gap-4">
    <div v-for="event in pastEvents" :key="event.id">
      <div
        class="bg-prev-next-month h-full text-black border border-gray-300 rounded-md overflow-hidden"
      >
        <!-- content container with padding and spacing -->
        <div class="p-4 line-through">
          <h2
            class="text-lg font-arimo font-bold mb-2 overflow-hidden text-ellipsis whitespace-nowrap"
          >
            {{ event.title }}
          </h2>
          <p class="text-sm mb-1">
            Date: {{ event.datetime.format('dddd, MMMM D, YYYY') }}
          </p>
          <p class="text-sm mb-1">
            Time: {{ event.datetime.format('h:mm A') }}
          </p>
          <p class="text-sm">{{ event.description }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import dayjs from 'dayjs';
import QRCode from '~/components/QrCode.vue';

const showQrCode = ref(false);
const googleFormUrl =
  'https://docs.google.com/forms/d/e/1FAIpQLSfMdLMAN-vGrqv828vVxpweRaD4yJm3RWm7Zb55KT8ke_7Ysg/viewform?usp=sf_link';

// Function to handle event click and show QR code
const handleEventClick = () => {
  showQrCode.value = true; // Show QR code modal when an event is clicked
};

// Function to close the QR code modal
const closeQrCode = () => {
  showQrCode.value = false; // Hide QR code modal when close is emitted
};
// reactive state for current date
const today = ref(dayjs().startOf('day'));
const currentMonth = ref(dayjs().month());
const currentYear = ref(dayjs().year());

// static data so no ref() here
const months = [
  'January',
  'February',
  'March',
  'April',
  'May',
  'June',
  'July',
  'August',
  'September',
  'October',
  'November',
  'December',
];
const days = ['Sun', 'Mon', 'Tues', 'Wed', 'Thurs', 'Fri', 'Sat'];

const events = ref([
  {
    id: '1',
    title: '1st General Meeting',
    datetime: dayjs('2024-08-22T20:00:00'),
    description: 'PLACEHOLDER',
  },
  {
    id: '2',
    title: 'a duuuu',
    datetime: dayjs('2024-08-13T20:00:00'),
    description: 'PLACEHOLDER',
  },
  {
    id: '3',
    title:
      'Custom ARAM with Officers AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAFGRHUIEJAHTGRUIESHGUIRHESIL;GREUIGSHGRLUIEGUIEHTG UIERH',
    datetime: dayjs('2024-09-03T19:50:00'),
    description: 'PLACEHOLDER',
  },

  {
    id: '4',
    title: 'black myth wukong no hit run',
    datetime: dayjs('2024-08-25T19:00:00'),
    description: 'PLACEHOLDER',
  },
  {
    id: '5',
    title: 'obamna',
    datetime: dayjs('2024-06-30T21:00:00'),
    description: 'PLACEHOLDER',
  },
  {
    id: '6',
    title: 'demure',
    datetime: dayjs('2024-08-01T21:00:00'),
    description: 'PLACEHOLDER',
  },
  {
    id: '7',
    title: 'Community Game Night',
    datetime: dayjs('2024-09-05T18:00:00'),
    description:
      'Join us for a fun game night with various board games and video games.',
  },
  {
    id: '8',
    title: 'Tech Talk: AI Innovations',
    datetime: dayjs('2024-09-10T17:30:00'),
    description:
      'A discussion on the latest innovations in AI technology with industry experts.',
  },
  {
    id: '9',
    title: 'Weekend Workshop: Coding for Beginners',
    datetime: dayjs('2024-09-15T10:00:00'),
    description:
      'A hands-on workshop for beginners to learn the basics of coding.',
  },
  {
    id: '10',
    title: 'Charity Run for Health',
    datetime: dayjs('2024-09-20T08:00:00'),
    description:
      'Participate in a charity run to support health-related causes.',
  },
  {
    id: '11',
    title: 'Monthly Book Club Meeting',
    datetime: dayjs('2024-09-25T19:00:00'),
    description: 'Discuss the latest book with fellow book enthusiasts.',
  },
  {
    id: '12',
    title: 'Tech Conference 2024',
    datetime: dayjs('2024-10-01T09:00:00'),
    description:
      'Join us for a tech conference featuring keynote speakers and breakout sessions.',
  },
  {
    id: '13',
    title: 'Halloween Costume Party',
    datetime: dayjs('2024-10-31T20:00:00'),
    description:
      'Dress up and enjoy a spooky evening with music, games, and prizes.',
  },
  {
    id: '14',
    title: 'Thanksgiving Potluck',
    datetime: dayjs('2024-11-28T12:00:00'),
    description:
      'Celebrate Thanksgiving with a potluck dinner. Bring a dish to share!',
  },
  {
    id: '15',
    title: 'Winter Wonderland Gala',
    datetime: dayjs('2024-12-15T18:00:00'),
    description:
      'Enjoy an elegant evening at our Winter Wonderland Gala with fine dining and entertainment.',
  },
  {
    id: '16',
    title: "New Year's Eve Celebration",
    datetime: dayjs('2024-12-31T22:00:00'),
    description:
      'Ring in the new year with a party featuring live music, dancing, and a countdown to midnight.',
  },
]);

// method to check if an event is past today
const isPastEvent = (eventDate) => {
  return dayjs(eventDate).isBefore(today.value, 'day');
};

// reactive state to toggle past events section
const showPastEvents = ref(false);
const togglePastEvents = () => {
  showPastEvents.value = !showPastEvents.value;
};

// logic to help determine what days from prev or next months need to be shown on current month calendar
const daysInMonth = computed(() => {
  // gets current month days and populates array
  const startOfMonth = dayjs()
    .year(currentYear.value)
    .month(currentMonth.value)
    .startOf('month');
  const endOfMonth = dayjs()
    .year(currentYear.value)
    .month(currentMonth.value)
    .endOf('month');

  const daysArray = [];

  for (let i = startOfMonth.date(); i <= endOfMonth.date(); i++) {
    daysArray.push(startOfMonth.date(i));
  }

  return daysArray;
});

// gets previous and next month from displayed. so that prev/next buttons works for any month
const prevMonth = () => {
  if (currentMonth.value === 0) {
    currentMonth.value = 11;
    currentYear.value--;
  } else {
    currentMonth.value--;
  }
};

const nextMonth = () => {
  if (currentMonth.value === 11) {
    currentMonth.value = 0;
    currentYear.value++;
  } else {
    currentMonth.value++;
  }
};

// based on current month, get any days that should be displayed. e.g. july 30th 2024 and sept 1st 2024 should both be displayed on august 2024
const previousMonthDays = computed(() => {
  const startOfMonth = dayjs()
    .year(currentYear.value)
    .month(currentMonth.value)
    .startOf('month');
  const previousMonth = startOfMonth.subtract(1, 'month');
  const daysInPreviousMonth = previousMonth.daysInMonth();

  const leadingDays = startOfMonth.day(); // days in prev month on current month calendar
  const previousMonthDaysArray = [];

  for (
    let i = daysInPreviousMonth - leadingDays + 1;
    i <= daysInPreviousMonth;
    i++
  ) {
    previousMonthDaysArray.push(previousMonth.date(i));
  }

  return previousMonthDaysArray;
});

const nextMonthDays = computed(() => {
  const endOfMonth = dayjs()
    .year(currentYear.value)
    .month(currentMonth.value)
    .endOf('month');
  const nextMonth = endOfMonth.add(1, 'month');
  const trailingDays = 6 - endOfMonth.day(); // days in next month on current month calendar
  const nextMonthDaysArray = [];

  for (let i = 1; i <= trailingDays; i++) {
    nextMonthDaysArray.push(nextMonth.date(i));
  }

  return nextMonthDaysArray;
});

// function for red circle highlight on current day
const isToday = (date) => date.isSame(dayjs(), 'day');

// get events for days displayed on calendar
const getEventsForDate = (date) => {
  return events.value.filter((event) =>
    dayjs(event.datetime).isSame(date, 'day')
  );
};

// computed property to filter future events
const futureEvents = computed(() => {
  return events.value.filter((event) => !dayjs().isAfter(event.datetime));
});

// filter past events. sort by most recent
const pastEvents = computed(() => {
  return events.value
    .filter((event) => dayjs().isAfter(event.datetime))
    .sort((a, b) => b.datetime - a.datetime);
});
</script>

<!-- unfortunate custom css tailwind doesn't work?  -->
<style scoped>
.ellipsis-multiline {
  display: -webkit-box;
  text-align: center;
  line-clamp: 4; /* Adjust this number based on how many lines you want to show */
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
}
</style>
