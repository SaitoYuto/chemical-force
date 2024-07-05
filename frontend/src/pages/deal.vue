<template>
  <v-app>
    <v-main>
      <v-toolbar :color="UI.COLOR.INDIGO" image="@/assets/background.svg">
        <template v-slot:extension>
          <v-tabs v-model="tab" align-tabs="title">
            <v-tab value="customer"
              ><v-icon :icon="UI.ICON.ACCOUNT_GROUP"></v-icon>Customer</v-tab
            >
            <v-tab value="product"
              ><v-icon :icon="UI.ICON.STORE"></v-icon>Product</v-tab
            >
          </v-tabs>
        </template>
      </v-toolbar>
      <v-window v-model="tab">
        <v-window-item value="customer">
          <CustomerTable></CustomerTable>
        </v-window-item>
        <v-window-item value="product">
          <ProductTable></ProductTable>
        </v-window-item>
      </v-window>
    </v-main>
  </v-app>
</template>

<script lang="ts" setup>
import { UI } from "@/constants/UI";
const tab = ref("customer");
</script>

<route lang="json">
{
  "meta": {
    "requiresAuth": true
  }
}
</route>
