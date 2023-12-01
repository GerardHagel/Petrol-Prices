<template>
    <div class="login-container">
      <h2>Logowanie</h2>
      <form @submit.prevent="login">
        <label for="username">Nazwa użytkownika:</label>
        <input type="text" id="username" v-model="username" required>
  
        <label for="password">Hasło:</label>
        <input type="password" id="password" v-model="password" required>
  
        <button type="submit">Zaloguj się</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        username: "",
        password: "",
      };
    },
    methods: {
      login() {
        // Tutaj umieść logikę logowania
        console.log("Logowanie...", this.username, this.password);
      },
    },
  };
  </script>
  
  <style scoped>
  .login-container {
    max-width: 300px;
    margin: auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  
  form {
    display: flex;
    flex-direction: column;
  }
  
  label {
    margin-bottom: 5px;
  }
  
  input {
    margin-bottom: 10px;
    padding: 8px;
  }
  
  button {
    background-color: #3498db;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
  </style>
  