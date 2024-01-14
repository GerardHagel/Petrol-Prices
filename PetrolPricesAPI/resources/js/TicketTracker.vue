<template>
    <div>
        <h2>Śledzenie zgłoszeń</h2>
        <ul>
            <li v-for="ticket in tickets" :key="ticket.id">
                <strong>Temat:</strong> {{ ticket.subject }} <br>
                <strong>Status:</strong> {{ ticket.status }} <br>
                <strong>Data utworzenia:</strong> {{ ticket.created_at }} <br>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            tickets: [],
        };
    },
    mounted() {
        this.fetchTickets();
    },
    methods: {
        fetchTickets() {
            axios.get('/tickets')
                .then(response => {
                    this.tickets = response.data.tickets;
                })
                .catch(error => {
                    console.error('Błąd podczas pobierania zgłoszeń:', error);
                });
        },
    },
};
</script>
