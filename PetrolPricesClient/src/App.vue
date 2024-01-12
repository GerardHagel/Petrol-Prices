<script setup>
import { RouterLink, RouterView } from 'vue-router'

</script>

<template>
  <header>
    <div class="logo">
      <img src="src/assets/logo.png" alt="Logo" >
    </div>
    
      <div class="wrapper">
        <nav>
          <RouterLink to="/">Home</RouterLink>
          <RouterLink to="/">Lorem Ipsum</RouterLink>
          <RouterLink to="/faq">FAQ</RouterLink>
          <RouterLink to="/admin">Admin</RouterLink>
        </nav>
      </div>
    
    <div class="proficon">
      <img src="src/assets/profile-icon.png" alt="Logo" >
    </div>
  </header>
  <RouterView />
</template>

<style scoped>
.logo,.proficon{
  margin: 0;
  padding: 0;
}
.logo img, .proficon img{
  max-height: 40px;
  height: auto;
}
header {
  position: fixed;
  z-index: 1000;
  display: flex;
  justify-content: space-between;
  align-items: center;
  line-height: 1.5;
  max-height: 40px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  width: 100%;
  z-index: 1000;
}



nav {
  width: 100%;

  text-align: center;
  margin-top: 0;
}

nav a.router-link-exact-active {
  color: var(--color-text);
}

nav a.router-link-exact-active:hover {
  background-color: transparent;
}

nav a {
  display: inline-block;
  padding: 0 1rem;
  border-left: 1px solid var(--color-border);
}

nav a:first-of-type {
  border: 0;
}

@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }



  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }

  nav {
    text-align: left;
    
    font-size: 1rem;

    padding: 1rem 0;
    margin-top: 1rem;
  }
}
</style>
