import { createRouter, createWebHistory } from 'vue-router'
import Dashboard from '../views/DashBoard.vue'
import Login from '../views/Login.vue'
import Logout from '../views/Logout.vue'

// ideally we should not be storing it in localStorage
function isAuthenticated() {
  return localStorage.getItem('accessToken');
}

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: Dashboard,
      meta : {
        requiresAuth : true
      }
    },
    {
      path: '/login',
      name: 'login',
      component: Login
    },
    {
      path: '/logout',
      name: 'logout',
      component: Logout
    }
  ]
})

router.beforeEach(async (to, from) => {
  const requiresAuth = to.matched.some((x) => x.meta.requiresAuth);

  if (requiresAuth && !isAuthenticated() && to.name !== 'login') {
    // redirect the user to the login page
    return { name: 'login' }
  }
});

export default router;
