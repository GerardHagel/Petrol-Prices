<template>
    <div class="form-box">
        <h2>Rejestracja</h2>
        <form @submit.prevent="registerUser">
            <label for="name">Imię:</label>
            <input v-model="userData.name" type="text" id="name" required />

            <label for="email">Email:</label>
            <input v-model="userData.email" type="email" id="email" required />

            <label for="password">Hasło:</label>
            <input v-model="userData.password" type="password" id="password" required />

            <label for="password_confirmation">Potwierdź hasło:</label>
            <input v-model="userData.password_confirmation" type="password" id="password_confirmation" required />
            <br>
            <button type="submit">Zarejestruj się</button>
            <br><RouterLink to="/login">Log in</RouterLink>
        </form>
    </div>
</template>
  
<script>
export default {
    data() {
        return {
            userData: {
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
            },
        };
    },
    methods: {
        async registerUser() {
            try {
                // Wywołanie API do rejestracji z użyciem axios lub innej biblioteki HTTP
                const response = await this.$axios.post('/api/register', this.userData);

                // Obsługa sukcesu, przekierowanie lub inne działania
                console.log('Użytkownik zarejestrowany:', response.data);

            } catch (error) {
                // Obsługa błędów rejestracji
                console.error('Błąd rejestracji:', error);
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

}
</style>
  