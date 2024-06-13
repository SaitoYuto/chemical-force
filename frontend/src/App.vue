<template>
  <v-app>
    <v-main>
      <router-view />
    </v-main>
  </v-app>
</template>

<script lang="ts" setup>
import { worker } from "@/mocks/browser";

if (import.meta.env.DEV) {
  // development mode
  worker.start();
}
</script>
