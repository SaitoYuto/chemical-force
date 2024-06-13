<template>
  <v-navigation-drawer expand-on-hover rail>
    <v-list>
      <template>
        <BaseDialog
          v-model:visibility="logoutDialog"
          :text="MESSAGE.ENQUIRY.LOGOUT"
          @ok="logout"
        ></BaseDialog>
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
import { SIDE_BAR } from "@/constants/SideBar";
import { UI } from "@/constants/UI";
import { user } from "@/stores/user";
const router = useRouter();
const userStore = user();
const logoutDialog = ref(false);

/**
 * Show logout dialog
 *
 * @returns {void}
 * @author Yuto Saito
 */
function showLogoutDialog(): void {
  logoutDialog.value = true;
}

/**
 * Logout
 *
 * @returns {void}
 * @author Yuto Saito
 */
function logout(): void {
  userStore.clear();
  router.push("login");
}
</script>
