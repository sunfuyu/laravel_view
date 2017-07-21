<template>
  <div id="app">
    <transition enter-active-class="animated rollIn" leave-active-class="animated rotateOutDownRight">
      <router-view></router-view>
    </transition>
  </div>
</template>

<script>
    export default {
        name: 'app'
    }
</script>

<style>

</style>
