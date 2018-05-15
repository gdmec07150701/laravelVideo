<template>

  <div id="app">
    <transition enter-active-class="animated rollIn">
      <router-view/>
    </transition>
  </div>
</template>

<script>
export default {
  name: 'App'
}
</script>

