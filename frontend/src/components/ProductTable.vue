<template>
  <v-data-table :headers="PRODUCT_HEADER" :items="productStore.getProducts">
    <template v-slot:top>
      <FormDialog ref="addDialog" mode="add" @ok="addProduct"></FormDialog>
      <FormDialog ref="editDialog" mode="edit" @ok="updateProduct"></FormDialog>
      <BaseDialog ref="deleteDialog" @ok="deleteProduct"></BaseDialog>
      <BaseButton text="Register" @click="showAddDialog"></BaseButton>
    </template>
    <template v-slot:headers="{ columns }">
      <tr>
        <template v-for="column in columns" :key="column.key">
          <th>
            <span>{{ column.title }}</span>
          </th>
        </template>
      </tr>
    </template>
    <template v-slot:item.actions="items">
      <v-icon
        :icon="UI.ICON.PENCIL"
        class="me-6"
        @click="showEditDialog(items.item)"
      >
      </v-icon>
      <v-icon
        :icon="UI.ICON.DELETE"
        class="ml-6"
        @click="showDeleteDialog(items.item.id)"
      ></v-icon>
    </template>
  </v-data-table>
</template>

<script lang="ts" setup>
import BaseButton from "@/atoms/BaseButton.vue";
import FormDialog from "@/components/FormDialog.vue";
import BaseDialog from "@/components/BaseDialog.vue";
import { MESSAGE } from "@/constants/Message";
import { PRODUCT_HEADER } from "@/constants/TableHeader";
import { UI } from "@/constants/UI";
import { Product } from "@/interfaces/Common/Product";
import { product } from "@/stores/product";

const productStore = product();
productStore.fetch();
const clickedId = ref("");
const addDialog = ref<InstanceType<typeof FormDialog> | null>(null);
const deleteDialog = ref<InstanceType<typeof BaseDialog> | null>(null);
const editDialog = ref<InstanceType<typeof FormDialog> | null>(null);

/**
 * Show add dialog
 *
 * @returns {void}
 * @author Yuto Saito
 */
function showAddDialog(): void {
  addDialog.value?.open({
    id: "",
    name: "",
    description: "",
    price: 0,
    volume: 0,
    unit: "",
  });
}

/**
 * Show edit dialog
 *
 * @param {Product} row
 * @returns {void}
 * @author Yuto Saito
 */
function showEditDialog(row: Product): void {
  editDialog.value?.open({ ...row });
}

/**
 * Show delete dialog
 *
 * @param {string} product ID
 * @returns {void}
 * @author Yuto Saito
 */
function showDeleteDialog(productId: string) {
  clickedId.value = productId;
  deleteDialog.value?.open([MESSAGE.ENQUIRY.DELETE]);
}

/**
 * Send add product request
 *
 * @returns {void}
 * @author Yuto Saito
 */
function addProduct(data: Product): void {
  productStore.add(data).then(addDialog.value?.close);
}

/**
 * Send update product request
 *
 * @returns {void}
 * @author Yuto Saito
 */
function updateProduct(data: Product): void {
  productStore.update(data).then(editDialog.value?.close);
}

/**
 * Send delete product request
 *
 * @returns {void}
 * @author Yuto Saito
 */
function deleteProduct() {
  productStore.delete(clickedId.value).then(deleteDialog.value?.close);
}
</script>
