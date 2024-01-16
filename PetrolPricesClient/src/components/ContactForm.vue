<template>
    <div class="form-box">
        <h2>Formularz kontaktowy</h2>
        <form @submit.prevent="submitForm">
            <label for="name">Imię i nazwisko: </label><br>
            <input type="text" v-model="formData.name" required>
            <br>
            <label for="email">Adres email: </label><br>
            <input type="email" v-model="formData.email" required>
            <br>
            <label for="subject">Temat zgłoszenia: </label><br>
            <input type="text" v-model="formData.subject" required>
            <br>
            <label for="message">Treść zgłoszenia: </label><br>
            <textarea v-model="formData.message" required></textarea>
            <br>
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
        async submitForm() {
            try {
                const response = await fetch('/submit-ticket', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify(this.formData),
                });

                const data = await response.json();
                console.log(data);

                // Wyczyszczenie formularza po poprawnym przesłaniu zgłoszenia
                this.formData = {
                    name: '',
                    email: '',
                    subject: '',
                    message: '',
                };
            } catch (error) {
                console.error('Błąd podczas przesyłania zgłoszenia:', error);
            }
        },
    },
};
</script>
