<template>
  <v-data-table :headers="CUSTOMER_HEADER" :items="customerStore.getCustomers">
    <template v-slot:top>
      <FormDialog ref="addDialog" mode="add" @ok="addCustomer"></FormDialog>
      <FormDialog
        ref="editDialog"
        mode="edit"
        @ok="updateCustomer"
      ></FormDialog>
      <BaseDialog ref="deleteDialog" @ok="deleteCustomer"></BaseDialog>
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
import { CUSTOMER_HEADER } from "@/constants/TableHeader";
import { UI } from "@/constants/UI";
import { Customer } from "@/interfaces/Common/Customer";
import { useCustomerStore } from "@/stores/customer";

const customerStore = useCustomerStore();
customerStore.fetch();
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
    honorific: "",
    first_name: "",
    last_name: "",
    house_number: "",
    street: "",
    account: "",
  });
}

/**
 * Show edit dialog
 *
 * @param {Customer} row
 * @returns {void}
 * @author Yuto Saito
 */
function showEditDialog(row: Customer): void {
  // pass copy or row to delete reactivity
  editDialog.value?.open({ ...row });
}

/**
 * Show delete dialog
 *
 * @param {string} customer ID
 * @returns {void}
 * @author Yuto Saito
 */
function showDeleteDialog(customerId: string): void {
  clickedId.value = customerId;
  deleteDialog.value?.open([MESSAGE.ENQUIRY.DELETE]);
}

/**
 * Send add customer request
 *
 * @returns {void}
 * @author Yuto Saito
 */
function addCustomer(data: Customer): void {
  customerStore.add(data).then(addDialog.value?.close);
}

/**
 * Send update customer request
 *
 * @returns {void}
 * @author Yuto Saito
 */
function updateCustomer(data: Customer): void {
  customerStore.update(data).then(editDialog.value?.close);
}

/**
 * Send delete customer request
 *
 * @returns {void}
 * @author Yuto Saito
 */
function deleteCustomer(): void {
  customerStore.delete(clickedId.value).then(deleteDialog.value?.close);
}
</script>
