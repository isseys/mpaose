<script>
export default {
  mounted() {
    localStorage.removeItem('accessToken');
    this.$router.push('login');
  }
}
</script>

<template>
  <main>
    <h1>Redirecting...</h1>
  </main>
</template>
