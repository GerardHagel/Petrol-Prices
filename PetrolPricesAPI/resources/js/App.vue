<template>
    <div>
      <nav class="navbar">
        <div class="navbar-brand">
          <a class="navbar-item" href="#">
            My App
          </a>
          <div class="navbar-burger burger" @click="toggleMenu">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
        <div class="navbar-menu" :class="{ 'is-active': isMenuActive }">
          <div class="navbar-start">
            <a class="navbar-item" href="#">
              Home
            </a>
            <div class="navbar-item has-dropdown" :class="{ 'is-active': isDropdownActive }">
              <a class="navbar-link" @click="toggleDropdown">
                Products
              </a>
              <div class="navbar-dropdown">
                <a class="navbar-item" href="#">
                  Category 1
                </a>
                <a class="navbar-item" href="#">
                  Category 2
                </a>
              </div>
            </div>
          </div>
        </div>
      </nav>
  
      <div class="content">
        <h1>{{ message }}</h1>
        <button @click="changeMessage">Change Message</button>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        message: 'Hello, Vue!',
        isMenuActive: false,
        isDropdownActive: false,
      };
    },
    methods: {
      changeMessage() {
        this.message = 'Message Changed!';
      },
      toggleMenu() {
        this.isMenuActive = !this.isMenuActive;
      },
      toggleDropdown() {
        this.isDropdownActive = !this.isDropdownActive;
      },
    },
  };
  </script>
  
  <style scoped>
  /* Style komponentu Vue */
  .navbar {
    background-color: #3498db;
    padding: 1rem;
  }
  
  .navbar-burger {
    color: white;
  }
  
  .navbar-item:hover {
    background-color: #2980b9;
  }
  
  .navbar-link {
    color: white;
  }
  
  .navbar-dropdown {
    background-color: #3498db;
  }
  </style>