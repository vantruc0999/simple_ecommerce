<template>
  <div v-if="transaction" class="container">
    <h1>Transaction Detail Page</h1>
    <p><b>ID:</b> {{ $route.params.id }}</p>
    <p><b>Transaction name:</b> {{ transaction.name }}</p>
    <p><b>Transaction price:</b> {{ transaction.price }}</p>
  </div>
  <div v-else>Loading transaction {{ $route.params.id }} ... </div>
</template>

<script>
export default {
  data() {
    return {
      transaction: null,
    };
  },
  created() {
    this.fetchTransactions();
  },
  methods: {
    async fetchTransactions() {
      const response = await fetch("http://localhost:3000/transactions/" + this.$route.params.id);
      const transaction = await response.json();
      this.transaction = transaction
    //   this.transaction.push(transaction)
    //   console.log(this.transaction)
    //   this.transactions = transactions;
    },
  },
};
</script>

<style>
</style>