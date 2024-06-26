<template>
  <v-app>
    <v-main>
      <v-card>
        <v-container fluid>
          <v-row dense>
            <v-col v-for="area in areas" :key="area.id">
              <v-card>
                <v-card-title>{{ area.name }}</v-card-title>
                <v-card-text>{{ "DEPOT: " + area.depot }}</v-card-text>
                <v-img
                  gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
                  height="200"
                  cover
                  src="https://picsum.photos/500/300?image=43"
                ></v-img>
                <v-card-text v-if="area.manager_id == userStore.getId">{{
                  "SALES TARGET: " + area.sales_target
                }}</v-card-text>
              </v-card>
            </v-col>
          </v-row>
        </v-container>
      </v-card>
    </v-main>
  </v-app>
</template>

<script lang="ts" setup>
import { Area } from "@/interfaces/Common/Area";
import { GetAreaResponse } from "@/interfaces/Responses/GetArea";
import { GetAreaRequest } from "@/interfaces/Requests/GetArea";
import { user } from "@/stores/user";
import ApiRequester from "@/utils/ApiRequester";

const userStore = user();
const areas = ref([] as Area[]);

/**
 * Request area data on mounted
 */
onMounted(() => {
  new ApiRequester<GetAreaRequest, GetAreaResponse>().call(
    "getArea",
    {
      id: userStore.getId,
    },
    (response) => {
      areas.value = response.areas;
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
