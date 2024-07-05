<template>
  <v-card width="250" variant="text">
    <v-img height="100" src="@/assets/logo.svg"></v-img>
    <v-card-text id="welcome-text"> {{ getGreetMessage() }} </v-card-text>
  </v-card>
</template>

<script lang="ts" setup>
import { useUserStore } from "@/stores/user";

/**
 * Get greet message depends on current hour
 *
 * @returns {string} greet message
 * @author Yuto Saito
 */
function getGreetMessage(): string {
  const hour = new Date().getHours();
  let greet = "";
  if (hour >= 5 && hour < 12) {
    greet = "Good morning";
  } else if (hour >= 12 && hour < 17) {
    greet = "Good afternoon";
  } else if (hour >= 17 && hour < 21) {
    greet = "Good evening";
  } else if (hour >= 21 && hour < 24) {
    greet = "Good night";
  } else {
    greet = "Welcome";
  }
  return greet + " " + useUserStore().getFirstName + "!";
}
</script>

<style>
#welcome-text {
  text-align: center;
  font-size: 1.4rem;
  font-weight: bold;
  font-family: "azo-sans-web, sans-serif";
}
</style>
