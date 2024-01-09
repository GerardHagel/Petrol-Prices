<template>
    <div>
        <h2>Formularz kontaktowy</h2>
        <form @submit.prevent="submitForm">
            <label for="name">Imię i nazwisko:</label>
            <input type="text" v-model="formData.name" required>
            <br> <br>
            <label for="email">Adres email:</label>
            <input type="email" v-model="formData.email" required>
            <br> <br>
            <label for="subject">Temat zgłoszenia:</label>
            <input type="text" v-model="formData.subject" required>
            <br> <br>
            <label for="message">Treść zgłoszenia:</label>
            <textarea v-model="formData.message" required></textarea>
            <br><br>
            <button type="submit">Wyślij zgłoszenie</button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            formData: {
                name: '',
                email: '',
                subject: '',
                message: '',
            },
        };
    },
    methods: {
        submitForm() {
            axios.post('/submit-ticket', this.formData)
                .then(response => {
                    console.log(response.data.message);
                    // Wyczyszczenie formularza po poprawnym przesłaniu zgłoszenia
                    this.formData = {
                        name: '',
                        email: '',
                        subject: '',
                        message: '',
                    };
                })
                .catch(error => {
                    console.error('Błąd podczas przesyłania zgłoszenia:', error);
                });
        },
    },
};
</script>
