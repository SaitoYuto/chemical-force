<template>
  <v-app>
    <v-main class="d-flex" height="600px">
      <v-container class="d-flex justify-center">
        <div>
          <TodoCard class="my-6"></TodoCard>
        </div>
      </v-container>
      <v-container class="ma-0 pa-0" style="position: relative">
        <Information></Information>
      </v-container>
    </v-main>
  </v-app>
</template>

<route lang="json">
{
  "meta": {
    "requiresAuth": true
  }
}
</route>
