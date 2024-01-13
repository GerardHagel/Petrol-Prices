<!-- HorizontalMenu.vue -->
<template>
  <div class="horizontal-menu">
    <router-link to="/">Home</router-link>
    <router-link to="/about">About</router-link>
    <router-link to="/contact">Contact</router-link>

    <!-- Dodaj inne elementy menu w zależności od potrzeb --> 
    <router-link to="/login">Login</router-link>


  </div>
</template>

<script>
export default {
  // Komponent nie musi zawierać logiki, ale możesz dodać metody, jeśli to konieczne
};
</script>


<style>

/* Styl dla menu */

body{
  background-color:gainsboro;
  margin: 0;
  padding: 0;
}
.horizontal-menu {
  justify-content: center;
  display: flex;
  list-style: none;
  padding: 0;
  
}

.horizontal-menu router-link {
  background-color: aquamarine;
  text-align: center;
  width: 25%;
  height: 10%;
  margin: 5px;
  text-decoration: none;
  color: #333;
  font-size: 36px;
  
}

.horizontal-menu router-link:hover {
  color: #007bff;
}
</style>
