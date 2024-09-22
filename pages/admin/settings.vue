<template>
    <div class="p-4 text-white">
      <!-- User Management Section -->
      <section class="mb-8">
        <h2 class="text-xl font-semibold mb-4">User Management</h2>
        <table class="w-full bg-gray-800 border border-gray-600 rounded-lg shadow">
          <thead>
            <tr>
              <th class="p-2 border-b border-gray-600">Username</th>
              <th class="p-2 border-b border-gray-600">Role</th>
              <th class="p-2 border-b border-gray-600">Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- Replace with dynamic user data -->
            <tr v-for="user in users" :key="user.id">
              <td class="p-2 border-b border-gray-600">{{ user.username }}</td>
              <td class="p-2 border-b border-gray-600">
                <select v-model="user.selectedRole" class="bg-gray-700 text-white border border-gray-600 rounded">
                  <option value="admin">Admin</option>
                  <option value="coordinator">Coordinator</option>
                  <option value="member">Member</option>
                </select>
              </td>
              <td class="p-2 border-b border-gray-600">
                <button @click="changeRole(user.id)" class="bg-blue-500 text-white px-2 py-1 rounded">Change Role</button>
                <button @click="deactivateUser(user.id)" class="bg-red-500 text-white px-2 py-1 rounded ml-2">Deactivate</button>
              </td>
            </tr>
            <!-- End of dynamic user data -->
          </tbody>
        </table>
      </section>
  
      <!-- Site Settings Section -->
      <section>
        <h2 class="text-xl font-semibold mb-4">Site Settings</h2>
        <form class="space-y-4">
          <div>
            <label for="site-name" class="block mb-2">Site Name</label>
            <input id="site-name" type="text" v-model="siteName" class="w-full p-2 bg-gray-700 text-white border border-gray-600 rounded"/>
          </div>
          <div>
            <label for="theme" class="block mb-2">Theme</label>
            <select id="theme" v-model="siteTheme" class="w-full p-2 bg-gray-700 text-white border border-gray-600 rounded">
              <option value="light">Light</option>
              <option value="dark">Dark</option>
            </select>
          </div>
          <!-- Add more site settings here -->
          <button @click.prevent="saveSettings" class="bg-blue-500 text-white px-4 py-2 rounded">Save Changes</button>
        </form>
      </section>
    </div>
  </template>
  
  <script>
  export default {
    name: 'SettingsPage',
    data() {
      return {
        users: [
          // Example user data; replace with actual data
          { id: 1, username: 'user1', selectedRole: 'admin' },
          { id: 2, username: 'user2', selectedRole: 'coordinator' },
        ],
        siteName: 'Example Site',
        siteTheme: 'light'
      }
    },
    methods: {
      async changeRole(userId) {
        const user = this.users.find(u => u.id === userId);
        if (user) {
          try {
            // Simulate API call to update role
            await fetch(`/api/users/${userId}/role`, {
              method: 'PUT',
              headers: { 'Content-Type': 'application/json' },
              body: JSON.stringify({ role: user.selectedRole })
            });
            alert('Role updated successfully');
          } catch (error) {
            console.error('Error updating role:', error);
            alert('Failed to update role');
          }
        }
      },
      async deactivateUser(userId) {
        try {
          // Simulate API call to deactivate user
          await fetch(`/api/users/${userId}/deactivate`, {
            method: 'POST'
          });
          // Remove user from list or update status
          this.users = this.users.filter(u => u.id !== userId);
          alert('User deactivated successfully');
        } catch (error) {
          console.error('Error deactivating user:', error);
          alert('Failed to deactivate user');
        }
      },
      async saveSettings() {
        try {
          // Simulate API call to save site settings
          await fetch('/api/settings', {
            method: 'PUT',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ siteName: this.siteName, theme: this.siteTheme })
          });
          alert('Settings saved successfully');
        } catch (error) {
          console.error('Error saving settings:', error);
          alert('Failed to save settings');
        }
      }
    }
  }
  </script>
  
  <style scoped>
  /* Additional styling if needed */
  </style>
  