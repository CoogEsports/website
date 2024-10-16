<template>
    <div class="p-4">
      <h1 class="text-2xl text-white font-sans">Manage Users</h1>
      <table class="min-w-full bg-base mt-6">
        <thead>
          <tr>
            <th class="py-2 px-4 border-b text-white border-lightest-base">Username</th>
            <th class="py-2 px-4 border-b text-white border-lightest-base">Email</th>
            <th class="py-2 px-4 border-b text-white border-lightest-base">Role</th>
            <th class="py-2 px-4 border-b text-white border-lightest-base">Actions</th>
          </tr>
        </thead>
        <tbody>
          <!-- Example data -->
          <tr>
            <td class="py-2 px-4 border-b text-white border-lightest-base">john_doe</td>
            <td class="py-2 px-4 border-b text-white border-lightest-base">john@example.com</td>
            <td class="py-2 px-4 border-b text-white border-lightest-base">Admin</td>
            <td class="py-2 px-4 border-b text-white border-lightest-base">
              <button class="bg-secondary text-white px-2 py-1 rounded">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  export default {
    layout: 'admin',
  }
  </script>
  