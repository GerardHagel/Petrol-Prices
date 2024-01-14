<script setup>
import { RouterLink, RouterView } from 'vue-router'

</script>

<template>
  <header>
    <RouterLink to="/">
      <div class="logo">
        <img src="src/assets/logo.png" alt="Logo">
      </div>
    </RouterLink>

    <div class="wrapper">
      <nav>
        <RouterLink to="/">Home</RouterLink>
        <div class="dropdown">
          <RouterLink to="/">Extras</RouterLink>
          <div class="dropdown-content">
            <RouterLink to="/calc">Currency Calculator</RouterLink>
            <RouterLink to="/travelCost">Travel Cost Calculator</RouterLink>
            <RouterLink to="/fuels">Fuels</RouterLink>
            <RouterLink to="">Articles</RouterLink>
          </div>
        </div>
        <RouterLink to="/faq">FAQ</RouterLink>
        <RouterLink to="/admin">Admin</RouterLink>
      </nav>
    </div>

    <RouterLink to="/login">
      <div class="proficon">
        <img src="src/assets/profile-icon.png" alt="Logo">
      </div>
    </RouterLink>
  </header>
  <RouterView />
</template>

<style scoped>
a {max-width: 100%;}
.logo,
.proficon {
  margin: 0;
  padding: 0;
}

.logo img,
.proficon img {
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
  
  width: 100%;
  z-index: 1000;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #353535;
  min-width: 160px;
  
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
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
