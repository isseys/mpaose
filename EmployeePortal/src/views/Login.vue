<script>
import axios from 'axios';

export default {
  data() {
    return {
      email: "housing@housing.mv",
      password: "password"
    }
  },
  methods: {
    async login() {
      return await axios.post('https://housing-api.stag.mpao.mv/auth/signin',
          {email: this.email, password: this.password}, {'Access-Control-Allow-Origin': 'https://housing-api.stag.mpao.mv/auth/signin'}).then(response => {
        localStorage.setItem('accessToken', response.data.access_token);
        this.$router.push('/');
      });
    }
  }
}
</script>

<template>
  <main>
    <section class="bg-gray-50 dark:bg-gray-300 h-screen">
      <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white py-9">
          Sign in
        </h1>
        <div
            class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <form class="space-y-4 md:space-y-6" action="#">
              <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                  address</label>
                <input type="email" name="email" id="email" v-model="email"
                       class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                       placeholder="name@example.com" required="">
              </div>
              <div>
                <label for="password"
                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                <input type="password" v-model="password" name="password" id="password" placeholder="••••••••"
                       class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                       required="">
              </div>
              <button type="submit" @click="login()"
                      class="w-full text-white bg-blue-700 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                Sign in
              </button>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>
</template>
