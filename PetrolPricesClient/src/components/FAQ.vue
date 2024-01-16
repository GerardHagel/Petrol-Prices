<template>
    <div>
      <h2>FAQ</h2>
      <div v-for="(item, index) in faqItems" :key="index" class="faq-item">
        <h3>{{ item.question }}</h3>
        <p>{{ item.answer }}</p>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        faqItems: [
          {
            question: 'Jak mogę zarejestrować się na stronie?',
            answer: 'Aby się zarejestrować, kliknij przycisk "Zarejestruj się" i postępuj zgodnie z instrukcjami.',
          },
          {
            question: 'Jak mogę zresetować hasło?',
            answer: 'Aby zresetować hasło, kliknij przycisk "Zapomniałem hasła" na stronie logowania i postępuj zgodnie z instrukcjami.',
          },
          // Dodaj więcej pytań i odpowiedzi według potrzeb
        ],
      };
    },
  };
  </script>
  
  <style scoped>
  .faq-item {
    margin-bottom: 20px;
    color: white;
  }
  
  </style>
  