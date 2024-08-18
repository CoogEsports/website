<template>
    
    <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md bg-lighter-base">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-white uppercase">Contact Us
        </h2>
        <form action="#" class="space-y-8">
            <div>
                <label for="email" class="block mb-2 text-sm font-medium uppercase text-white">Your
                    email</label>
                <input type="email" id="email"
                    class="border border-primary text-sm focus:ring-primary block w-full p-2.5 bg-lighter-base dark:placeholder-white/50 text-white"
                    placeholder="name@flowbite.com" required>
            </div>
            <div>
                <label for="subject"
                    class="block mb-2 text-sm font-medium uppercase text-white">Subject</label>
                <input type="text" id="subject"
                    class="border border-primary text-sm focus:ring-primary block w-full p-2.5 bg-lighter-base dark:placeholder-white/50 text-white"
                    placeholder="Let us know how we can help you" required>
            </div>
            <div class="sm:col-span-2">
                <label for="message" class="block mb-2 text-sm font-medium uppercase text-white">Your
                    message</label>
                <textarea id="message" rows="6"
                    class="border border-primary text-sm focus:ring-primary block w-full p-2.5 bg-lighter-base dark:placeholder-white/50 text-white"
                    placeholder="Leave a comment..."></textarea>
            </div>
            <button type="submit"
                class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Send
                message</button>
        </form>
    </div>
</template>