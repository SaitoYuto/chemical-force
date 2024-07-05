<template>
  <v-card width="250" variant="text">
    <v-img height="100" src="@/assets/logo.svg"></v-img>
    <v-card-text id="welcome-text"> {{ getGreedMessage() }} </v-card-text>
  </v-card>
</template>

<script lang="ts" setup>
import { useUserStore } from "@/stores/user";

/**
 * Get greed message depends on current hour
 *
 * @returns {string} greed message
 * @author Yuto Saito
 */
function getGreedMessage(): string {
  const hour = new Date().getHours();
  let greed = "";
  if (hour >= 5 && hour <= 11) {
    greed = "Good morning";
  } else if (hour >= 12 && hour <= 16) {
    greed = "Good afternoon";
  } else if (hour >= 17 && hour <= 20) {
    greed = "Good evening";
  } else if (hour >= 21 && hour <= 24) {
    greed = "Good night";
  } else {
    greed = "Welcome";
  }
  return greed + " " + useUserStore().getFirstName + "!";
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
