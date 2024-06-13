<template>
  <v-data-table :headers="PRODUCT_HEADER" :items="productData">
    <template v-slot:top>
      <FormDialog
        title="Product Information"
        v-model:formData="clickedRow"
        v-model:visibility="editDialog"
        @update="updateProduct"
      ></FormDialog>
      <BaseDialog
        v-model:visibility="deleteDialog"
        :text="MESSAGE.ENQUIRY.DELETE"
        @ok="deleteProduct"
      ></BaseDialog>
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
        @click="showDeleteDialog()"
      ></v-icon>
    </template>
  </v-data-table>
</template>

<script lang="ts" setup>
import { MESSAGE } from "@/constants/Message";
import { PRODUCT_HEADER } from "@/constants/TableHeader";
import { UI } from "@/constants/UI";
import { Product } from "@/interfaces/Common/Product";
import { DeleteProductRequest } from "@/interfaces/Requests/DeleteProduct";
import { SetProductRequest } from "@/interfaces/Requests/SetProduct";
import { DeleteProductResponse } from "@/interfaces/Responses/DeleteProduct";
import { SetProductResponse } from "@/interfaces/Responses/SetProduct";
import ApiRequester from "@/utils/ApiRequester";

// Initial clicked product data
const clickedRow = ref<Product>({
  id: "",
  name: "",
  desc: "",
  price: 0,
  volume: 0,
  unit: "",
});
const editDialog = ref(false);
const deleteDialog = ref(false);

defineProps({
  productData: {
    type: Array as PropType<Product[]>,
    required: false,
    default: [],
  },
});

/**
 * Show edit dialog
 *
 * @param {Product} row
 * @returns {void}
 * @author Yuto Saito
 */
function showEditDialog(row: Product): void {
  editDialog.value = true;
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
      id: "",
      name: "",
      desc: "",
      price: 0,
      volume: 0,
      unit: "",
    },
    (response) => {
      console.log(response.id);
      editDialog.value = false;
    },
    (apiError) => {
      console.log(...apiError.errors);
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
  deleteDialog.value = true;
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
    (response) => {
      console.log(response.id);
      deleteDialog.value = false;
    },
    (apiError) => {
      console.log(...apiError.errors);
    }
  );
}
</script>
