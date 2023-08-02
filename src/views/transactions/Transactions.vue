<template>
  <div class="container text-center">
    <h1>Transactions List</h1>
    <div class="row" v-if="transactions.length > 0">
      <div
        class="col-lg-3 col-md-6 col-sm-12 tran"
        v-for="transaction in transactions"
        :key="transaction.id"
      >
        <router-link
          :to="{ name: 'transactionDetail', params: { id: transaction.id } }"
          >{{ transaction.name }}</router-link
        >
        <p>${{ transaction.price }}</p>
      </div>
    </div>
    <div v-else-if="error">{{ error }}</div>
    <div v-else><h1>Loading transaction ...</h1></div>
  </div>
</template>

<script>
import { ref } from "vue";

export default {
  //   data() {
  //     return {
  //       transactions: [],
  //     };
  //   },
  //   created() {
  //     const transactions = this.fetchTransactions();
  //   },
  //   methods: {
  //     async fetchTransactions() {
  //       const response = await fetch("http://localhost:3000/transactions");
  //       const transactions = await response.json();
  //       this.transactions = transactions;
  //     },
  //     // filterTransaction() {
  //     //   return this.transactions.filter((item) => {
  //     //     return item.id % 2 == 0;
  //     //   });
  //     // },
  //   },
  //   computed: {
  //     filterOddTransaction() {
  //       return this.transactions.filter((item) => {
  //         return item.id % 2 == 0;
  //       });
  //     },
  //   },
  setup() {
    const transactions = ref([]);
    const error = ref(null);

    // console.log(transactions, error);

    const fetchTrans = async () => {
      try {
        const response = await fetch("http://localhost:3000/transactions");
        console.log(transactions);
        if (!response.ok) {
          throw new Error("Something went wrong!!!");
        }
        transactions.value = await response.json();
      } catch (err) {
        error.value = err;
        console.log(error.value)
      }
    };

    fetchTrans();

    return {transactions, error}
  },
};
</script>

<style scoped>
.tran {
  border: 1px solid black;
  padding-right: 10px;
}

.tran a {
  text-decoration: none;
  color: black;
  font-weight: bold;
}
</style>