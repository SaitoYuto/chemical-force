<template>
  <v-app>
    <v-main>
      <BaseDialog ref="errorDialog" :showOK="false"></BaseDialog>
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
import BaseDialog from "@/components/BaseDialog.vue";
import { Area } from "@/interfaces/Common/Area";
import { GetAreaResponse } from "@/interfaces/Responses/GetArea";
import { GetAreaRequest } from "@/interfaces/Requests/GetArea";
import { useUserStore } from "@/stores/user";
import ApiRequester from "@/utils/ApiRequester";

const areas = ref([] as Area[]);
const errorDialog = ref<InstanceType<typeof BaseDialog> | null>(null);
const userStore = useUserStore();

/**
 * Request area data on mounted
 */
onMounted(() => {
  new ApiRequester<GetAreaRequest, GetAreaResponse>()
    .post("getArea", {
      id: userStore.getId,
    })
    .then((res) => (areas.value = res.data.areas));
});
</script>

<route lang="json">
{
  "meta": {
    "requiresAuth": true
  }
}
</route>
