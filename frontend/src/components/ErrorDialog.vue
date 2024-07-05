<template>
  <v-dialog v-model="visibility" max-width="500">
    <v-card :title="UI.LABEL.ERROR">
      <v-card-text
        v-for="(message, index) in messages"
        :key="index"
        class="text-center"
      >
        {{ message }}
      </v-card-text>
      <v-card-actions>
        <v-spacer></v-spacer>
        <BaseButton
          :text="UI.LABEL.CLOSE"
          :block="false"
          @click="close"
        ></BaseButton>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script lang="ts" setup>
import BaseButton from "@/atoms/BaseButton.vue";
import { UI } from "@/constants/UI";
import { useErrorStore } from "@/stores/error";

const errorStore = useErrorStore();
const visibility = ref(false);
const messages = computed(() =>
  errorStore.getMessages(errorStore.keys[0] ?? "")
);
function close() {
  visibility.value = false;
  errorStore.remove(errorStore.keys[0] ?? "");
}

watch(
  () => errorStore.hasError,
  (hasError) => {
    visibility.value = hasError;
  }
);
</script>
