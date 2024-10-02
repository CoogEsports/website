<template>
    <div class="p-4">
      <h1 class="text-2xl font-bold">Manage Users</h1>
      <table class="min-w-full bg-white mt-6">
        <thead>
          <tr>
            <th class="py-2 px-4 border-b border-gray-200">Username</th>
            <th class="py-2 px-4 border-b border-gray-200">Email</th>
            <th class="py-2 px-4 border-b border-gray-200">Role</th>
            <th class="py-2 px-4 border-b border-gray-200">Actions</th>
          </tr>
        </thead>
        <tbody>
          <!-- Example data -->
          <tr>
            <td class="py-2 px-4 border-b border-gray-200">john_doe</td>
            <td class="py-2 px-4 border-b border-gray-200">john@example.com</td>
            <td class="py-2 px-4 border-b border-gray-200">Admin</td>
            <td class="py-2 px-4 border-b border-gray-200">
              <button class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
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
  