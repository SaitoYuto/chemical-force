<template>
  <Transition>
    <v-card v-if="visibility" class="detailed-view">
      <v-card-title>{{ info.title }}</v-card-title>
      <v-card-text class="text-body-1">{{ info.content }}</v-card-text>
      <v-card-actions>
        <BaseButton
          text="Close"
          :block="false"
          @click="emit('close')"
        ></BaseButton>
      </v-card-actions>
    </v-card>
  </Transition>
</template>

<script lang="ts" setup>
import BaseButton from "@/atoms/BaseButton.vue";
import { Information } from "@/interfaces/Common/Information";

const emit = defineEmits();
defineProps({
  visibility: {
    type: Boolean,
    required: true,
  },
  info: {
    type: Object as PropType<Information>,
    required: true,
    default: { id: "", title: "", content: "" },
  },
});
</script>

<style scoped>
.detailed-view {
  position: absolute;
  top: 0;
  right: 0;
  width: 100%;
  height: 100%;
  border: 1px solid black;
}

.v-enter-active,
.v-leave-active {
  transition: opacity 0.2s ease;
}

.v-enter-from,
.v-leave-to {
  opacity: 0;
}
</style>
