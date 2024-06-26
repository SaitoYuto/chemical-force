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
          <CustomerTable :customerData="customers"></CustomerTable>
        </v-window-item>
        <v-window-item value="product">
          <ProductTable :productData="products"></ProductTable>
        </v-window-item>
      </v-window>
    </v-main>
  </v-app>
</template>

<script lang="ts" setup>
import { UI } from "@/constants/UI";
import { Customer } from "@/interfaces/Common/Customer";
import { Product } from "@/interfaces/Common/Product";
import { GetUserDealResponse } from "@/interfaces/Responses/GetUserDeal";
import { GetUserDealRequest } from "@/interfaces/Requests/GetUserDeal";
import { user } from "@/stores/user";
import ApiRequester from "@/utils/ApiRequester";

const tab = ref("customer");
const customers = ref([] as Customer[]);
const products = ref([] as Product[]);

/**
 * Request user deal data on mounted
 */
onMounted(() => {
  new ApiRequester<GetUserDealRequest, GetUserDealResponse>().call(
    "getUserDeal",
    {
      id: user().getId,
    },
    (response) => {
      customers.value = response.customers;
      products.value = response.products;
    },
    (apiError) => {
      console.log(...apiError.errors);
    }
  );
});
</script>

<route lang="json">
{
  "meta": {
    "requiresAuth": true
  }
}
</route>
