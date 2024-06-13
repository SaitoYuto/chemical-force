<template>
  <v-dialog v-model="visibility" class="pa-6" max-width="300">
    <v-card>
      <v-card-text class="text-center">
        {{ text }}
      </v-card-text>
      <v-card-actions>
        <v-spacer></v-spacer>
        <BaseButton
          :text="UI.LABEL.CLOSE"
          :block="false"
          @click="close"
        ></BaseButton>
        <BaseButton
          :text="UI.LABEL.OK"
          :block="false"
          @click="emit('ok')"
        ></BaseButton>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script lang="ts" setup>
import BaseButton from "@/atoms/BaseButton.vue";
import { UI } from "@/constants/UI";

const emit = defineEmits();

const visibility = defineModel("visibility", {
  type: Boolean,
  default: false,
});

defineProps({
  text: {
    type: String,
    required: true,
  },
});

/**
 * Close dialog
 *
 * @returns {void}
 * @author Yuto Saito
 */
function close(): void {
  visibility.value = false;
}
</script>
