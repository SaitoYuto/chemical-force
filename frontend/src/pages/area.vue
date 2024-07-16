<template>
  <v-app>
    <v-main>
      <v-card>
        <v-container fluid>
          <v-row dense>
            <v-col v-for="area in areaStore.getAreas" :key="area.id">
              <v-card
                :id="area.id"
                :image="generateImageUrl(area.image)"
                height="300"
              >
                <v-card-title class="area_title">{{ area.name }}</v-card-title>
                <v-fab-transition>
                  <div v-show="expandSet.has(area.id)" class="h-100">
                    <v-list class="h-100" density="compact">
                      <v-list-item
                        :prepend-icon="UI.ICON.ACCOUNT"
                        :title="`Manager:  ${area.manager_name}`"
                      >
                      </v-list-item>
                      <v-list-item
                        :prepend-icon="UI.ICON.GBP"
                        :title="`Sales Target: ${area.sales_target}`"
                      >
                      </v-list-item>
                      <v-list-item
                        :prepend-icon="UI.ICON.STORE"
                        :title="`Depot: ${area.depot}`"
                      >
                      </v-list-item>
                    </v-list>
                  </div>
                </v-fab-transition>
              </v-card>
              <v-card-actions class="pa-0">
                <BaseButton
                  :text="
                    expandSet.has(area.id) ? UI.LABEL.CLOSE : UI.LABEL.DETAIL
                  "
                  @click="toggleAreaDetail(area.id)"
                ></BaseButton>
              </v-card-actions>
            </v-col>
          </v-row>
        </v-container>
      </v-card>
    </v-main>
  </v-app>
</template>

<script lang="ts" setup>
import BaseButton from "@/atoms/BaseButton.vue";
import { UI } from "@/constants/UI";
import { useAreaStore } from "@/stores/area";

const areaStore = useAreaStore();
areaStore.fetch();
const expandSet = ref(new Set());

/**
 * Generate image URL
 *
 * @param image path
 * @returns {string}
 * @author Yuto Saito
 */
function generateImageUrl(image: string): string {
  return import.meta.env.DEV ? image : location.origin + "/" + image;
}

/**
 * Toggle area detail
 *
 * @param areaId
 * @returns {void}
 * @author Yuto Saito
 */
function toggleAreaDetail(areaId: string): void {
  if (expandSet.value.has(areaId)) {
    expandSet.value.delete(areaId);
  } else {
    expandSet.value.add(areaId);
  }
}
</script>

<route lang="json">
{
  "meta": {
    "requiresAuth": true
  }
}
</route>

<style scoped>
.area_title {
  background-color: rgba(0, 0, 0, 0.5);
  color: white;
}
</style>
