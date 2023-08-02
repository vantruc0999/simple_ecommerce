<template>
  <nav
    :class="['navbar', 'navbar-expand-lg', `bg-${theme}`, `navbar-${theme}`]"
  >
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <RouterLink to="/" class="nav-link">Home</RouterLink>
          </li>
          <li class="nav-item">
            <RouterLink :to="{ name: 'contact' }" class="nav-link"
              >Contact</RouterLink
            >
          </li>
          <li class="nav-item">
            <RouterLink :to="{ name: 'transactions' }" class="nav-link"
              >Transactions</RouterLink
            >
          </li>
          <li class="nav-item">
            <RouterLink :to="{ name: 'contact' }" class="nav-link"
              >Validate Form</RouterLink
            >
          </li>
          <li class="nav-item">
            <RouterLink :to="{ name: 'composition' }" class="nav-link"
              >Composition</RouterLink
            >
          </li>
        </ul>
      </div>
      <button class="btn btn-primary" @click="changeTheme">Change theme</button>
    </div>
  </nav>
</template>

<script>
export default {
  data() {
    return {
      pages: [],
      theme: "",
    };
  },
  created() {
    this.theme = localStorage.getItem('theme')
  },
  methods: {
    changeTheme() {
      this.theme === "light" ? (this.theme = "dark") : (this.theme = "light");
      localStorage.setItem('theme', this.theme)
    },
  },
};
</script>

<style>
</style>