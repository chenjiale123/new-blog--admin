<template>
  <div id="app">
    <router-view />
  </div>
</template>

<script>

export default {
  name: 'app',

}
</script>

<style lang="scss">
*{
  margin: 0;
  padding: 0;
}
html,body,#app{
  height: 100%;
}
#app {
  // background: linear-gradient(
  //   -45deg, #3eae82, #fed67c
  // );
  font-family: 'Roboto', sans-serif;
}
</style>
