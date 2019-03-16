import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home.vue'
import listProduct from './components/ListProduct.vue'
import detailProduct from './components/DetailProduct.vue'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/buy',
      name: 'listProduct',
      component: listProduct
    },
    {
      path: '/buy/detail/:id',
      name: 'detailProduct',
      component: detailProduct
    },
    {
      path: '/buy/detail/:id/:edit',
      name: 'editProduct',
      component: detailProduct
    }
  ]
})
