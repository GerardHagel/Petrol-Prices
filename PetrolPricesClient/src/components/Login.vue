<template>
  <div>
    <h2>Login</h2>
    <form @submit.prevent="login">
      <label for="email">Email:</label>
      <input v-model="email" type="email" required />

      <label for="password">Password:</label>
      <input v-model="password" type="password" required />

      <button type="submit">Login</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      email: '',
      password: '',
    };
  },
  methods: {
    async login() {
      try {
        const response = await axios.post('/api/auth/login', {
          email: this.email,
          password: this.password,
        });

        // Jeśli logowanie jest udane, możesz obsłużyć odpowiedź
        console.log('Zalogowano pomyślnie', response.data);

        // Tutaj możesz obsłużyć przekierowanie do innej strony, jeśli jest to wymagane
      } catch (error) {
        // W przypadku błędu wyświetl go w konsoli lub obsłuż go odpowiednio
        console.error('Błąd logowania', error);
      }
    },
  },
};
</script>

  
  <style scoped>
  .faq-item {
    margin-bottom: 20px;
    color: white;
  }
  
  </style>
  