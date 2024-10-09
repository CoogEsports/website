<template>
  <div class="max-h-screen pb-8 bg-lighter-base text-white font-sans">
    <div class="container mx-auto py-8">
      <h2
        class="text-3xl font-bold mb-6"
      >
    CONTACT US  
    </h2>

      <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-[#2c2c2c]" >
      <form action="#" class="space-y-8">
        <div class="max-w-2xl mx-auto">
          <label
            for="email"
            class="block mb-2 text-sm font-medium uppercase text-white"
            >Your email</label
          >
          <input
            id="email"
            type="email"
            class="border border-primary text-sm focus:ring-primary block w-full p-2.5 bg-lighter-base dark:placeholder-white/50 text-white"
            placeholder="coogesports@account.com"
            required
          >
        </div>
        <div class="max-w-2xl mx-auto">
          <label
            for="subject"
            class="block mb-2 text-sm font-medium uppercase text-white"
          >
            subject
          </label>
          <input
            id="subject"
            type="text"
            class="border border-primary text-sm focus:ring-primary block w-full p-2.5 bg-lighter-base dark:placeholder-white/50 text-white"
            placeholder="let us know how we can help you"
            required
          >
        </div>
        <div class="max-w-2xl mx-auto sm:col-span-2">
          <label
            for="message"
            class="block mb-2 text-sm font-medium uppercase text-white"
            >Your message</label
          >
          <textarea
            id="message"
            rows="6"
            class="border border-primary text-sm focus:ring-primary block w-full p-2.5 bg-lighter-base dark:placeholder-white/50 text-white"
            placeholder="Leave a comment..."
          />
          <button
            type="submit"
            class="my-4 py-2 px-5 text-sm font-sans font-medium text-center text-white rounded-lg bg-primary text-gray-400 max-w-2xl hover:bg-secondary hover:text-white transition-colors duration-300"
          >
            Send message
          </button>
        </div>
      </form>
    </div>
  </div>
</template>
