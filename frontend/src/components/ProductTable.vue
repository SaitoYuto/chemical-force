<template>
  <v-data-table :headers="PRODUCT_HEADER" :items="productData">
    <template v-slot:top>
      <FormDialog
        ref="formDialog"
        v-model:formData="clickedRow"
        @update="updateProduct"
      ></FormDialog>
      <BaseDialog ref="deleteDialog" @ok="deleteProduct"></BaseDialog>
      <BaseDialog ref="errorDialog" :showOK="false"></BaseDialog>
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
        @click="showFormDialog(items.item)"
      >
      </v-icon>
      <v-icon
        :icon="UI.ICON.DELETE"
        class="ml-6"
        @click="showDeleteDialog()"
      ></v-icon>
    </template>
  </v-data-table>
</template>

<script lang="ts" setup>
import FormDialog from "@/components/FormDialog.vue";
import BaseDialog from "@/components/BaseDialog.vue";
import { MESSAGE } from "@/constants/Message";
import { PRODUCT_HEADER } from "@/constants/TableHeader";
import { UI } from "@/constants/UI";
import { Product } from "@/interfaces/Common/Product";
import { DeleteProductRequest } from "@/interfaces/Requests/DeleteProduct";
import { SetProductRequest } from "@/interfaces/Requests/SetProduct";
import { DeleteProductResponse } from "@/interfaces/Responses/DeleteProduct";
import { SetProductResponse } from "@/interfaces/Responses/SetProduct";
import ApiRequester from "@/utils/ApiRequester";

defineProps({
  productData: {
    type: Array as PropType<Product[]>,
    required: false,
    default: [],
  },
});

// Initial clicked product data
const clickedRow = ref<Product>({
  id: "",
  name: "",
  description: "",
  price: 0,
  volume: 0,
  unit: "",
});
const deleteDialog = ref<InstanceType<typeof BaseDialog> | null>(null);
const errorDialog = ref<InstanceType<typeof BaseDialog> | null>(null);
const formDialog = ref<InstanceType<typeof FormDialog> | null>(null);

/**
 * Show edit dialog
 *
 * @param {Product} row
 * @returns {void}
 * @author Yuto Saito
 */
function showFormDialog(row: Product): void {
  formDialog.value?.open(row);
  clickedRow.value = row;
}

/**
 * Send update product request
 *
 * @returns {void}
 * @author Yuto Saito
 */
function updateProduct(): void {
  new ApiRequester<SetProductRequest, SetProductResponse>().call(
    "setProduct",
    {
      id: clickedRow.value.id,
      name: clickedRow.value.name,
      description: clickedRow.value.description,
      price: clickedRow.value.price,
      volume: clickedRow.value.volume,
      unit: clickedRow.value.unit,
    },
    () => {
      formDialog.value?.close();
    },
    (apiError) => {
      errorDialog.value?.open(apiError.errors);
    }
  );
}

/**
 * Show delete dialog
 *
 * @returns {void}
 * @author Yuto Saito
 */
function showDeleteDialog() {
  deleteDialog.value?.open([MESSAGE.ENQUIRY.DELETE]);
}

/**
 * Send delete product request
 *
 * @returns {void}
 * @author Yuto Saito
 */
function deleteProduct() {
  new ApiRequester<DeleteProductRequest, DeleteProductResponse>().call(
    "deleteProduct",
    { id: clickedRow.value.id },
    () => {
      deleteDialog.value?.close();
    },
    (apiError) => {
      errorDialog.value?.open(apiError.errors);
    }
  );
}
</script>
