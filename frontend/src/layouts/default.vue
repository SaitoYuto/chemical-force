<template>
  <v-app>
    <div id="default-background"></div>
    <SideBar></SideBar>
    <v-main>
      <router-view />
    </v-main>
  </v-app>
</template>

<style scoped>
#default-background {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  opacity: 0.4;
  overflow: hidden;
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  background-image: url("@/assets/background.svg");
}
</style>
