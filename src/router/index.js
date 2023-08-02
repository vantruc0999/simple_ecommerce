import { createRouter, createWebHistory } from 'vue-router'

import HomeView from '../views/HomeView.vue'
import Contact from '../views/Contact.vue'
import Transactions from '../views/transactions/Transactions.vue'
import TransactionDetail from '../views/transactions/TransactionDetail.vue'
import TestComposition from '../views/TestComposition.vue'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      component : HomeView,
      name: 'home',
      props : true,
    },
    {
      path: '/contact-123',
      component : Contact,
      name: 'contact',
      props : true,
    },
    {
      path: '/transactions',
      component : Transactions,
      name: 'transactions',
      props : true,
    },
    ,
    {
      path: '/transactions/:id',
      component : TransactionDetail,
      name: 'transactionDetail',
      props : true,
    },
    {
      path: '/composition',
      component : TestComposition,
      name: 'composition',
      props : true,
    },
  ]
})

export default router
