<template>
  <v-app>
    <v-main>
      <router-view />
      <ErrorDialog />
    </v-main>
  </v-app>
</template>

<script lang="ts" setup>
import ErrorDialog from "@/components/ErrorDialog.vue";
import { worker } from "@/mocks/browser";

if (import.meta.env.DEV) {
  // development mode
  worker.start({
    onUnhandledRequest: (req) => {
      // Ignore requests to node_modules
      if (req.url.startsWith("/node_modules/")) {
        return;
      }
      console.log(`Found an unhandled ${req.method} request to ${req.url}`);
    },
  });
}
</script>
