<template>
  <v-dialog v-model="visibility" max-width="500">
    <v-card :title="title">
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

defineExpose({
  open,
  close,
});

defineProps({
  text: {
    type: String,
    required: true,
  },
  title: {
    type: String,
    required: false,
    default: "",
  },
});

const emit = defineEmits();
const visibility = defineModel("visibility", {
  type: Boolean,
  default: false,
});

/**
 * Open dialog
 *
 * @returns {void}
 * @author Yuto Saito
 */
function open(): void {
  visibility.value = true;
}

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
