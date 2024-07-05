<template>
  <v-navigation-drawer expand-on-hover rail>
    <v-list>
      <template>
        <BaseDialog ref="logoutDialog" @ok="logout"></BaseDialog>
      </template>

      <v-list-item
        :title="userStore.getId"
        :subtitle="userStore.getName"
        @click="showLogoutDialog()"
      >
        <template v-slot:prepend>
          <v-icon :icon="UI.ICON.ACCOUNT" :color="UI.COLOR.PURPLE"></v-icon>
        </template>
      </v-list-item>
      <v-list-item
        v-for="menu in SIDE_BAR"
        :key="menu.title"
        :to="menu.path"
        v-show="menu.visibility"
      >
        <template v-slot:prepend>
          <v-icon :icon="menu.icon" :color="UI.COLOR.PURPLE"></v-icon>
        </template>
        <v-list-item-title>{{ menu.title }}</v-list-item-title>
      </v-list-item>
    </v-list>
  </v-navigation-drawer>
</template>

<script lang="ts" setup>
import { MESSAGE } from "@/constants/Message";
import BaseDialog from "@/components/BaseDialog.vue";
import { SIDE_BAR } from "@/constants/SideBar";
import { UI } from "@/constants/UI";
import { useUserStore } from "@/stores/user";
const logoutDialog = ref<InstanceType<typeof BaseDialog> | null>(null);
const router = useRouter();
const userStore = useUserStore();

/**
 * Show logout dialog
 *
 * @returns {void}
 * @author Yuto Saito
 */
function showLogoutDialog(): void {
  logoutDialog.value?.open([MESSAGE.ENQUIRY.LOGOUT]);
}

/**
 * Logout
 *
 * @returns {void}
 * @author Yuto Saito
 */
function logout(): void {
  userStore.$reset();
  router.push("login");
}
</script>
