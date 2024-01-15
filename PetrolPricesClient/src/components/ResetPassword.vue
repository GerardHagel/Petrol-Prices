<template>
  <div class="form-box">
    <h2>Zresetuj hasło</h2>
    <form @submit.prevent="sendResetLink" v-if="!resetSuccess">
      <label for="email">Email:</label>
      <input v-model="email" type="email" id="email" required />
      <br>
      <button type="submit">Wyślij link resetujący hasło</button>
      <br><RouterLink to="/login">Log in</RouterLink>
    </form>

    <div v-if="resetSuccess">
      <p>Email z linkiem resetującym hasło został wysłany. Sprawdź swoją skrzynkę pocztową.</p>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      email: '',
      resetSuccess: false,
    };
  },
  methods: {
    async sendResetLink() {
      try {
        // Wywołanie API do wysłania linku resetującego z użyciem axios lub innej biblioteki HTTP
        const response = await this.$axios.post('/api/password/email', {
          email: this.email,
        });

        // Obsługa sukcesu
        this.resetSuccess = true;

      } catch (error) {
        // Obsługa błędów
        console.error('Błąd wysyłania linku resetującego:', error);
      }
    },
  },
};
</script>

<style scoped>

form {
  max-width: 400px;
  margin: 0 auto;
}

label {
  display: block;
  margin-bottom: 5px;
}
</style>
