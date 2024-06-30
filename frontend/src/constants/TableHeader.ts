import { Customer } from "@/interfaces/Common/Customer";
import { Product } from "@/interfaces/Common/Product";
import type { VDataTable } from "vuetify/components";
/**
 * Table header constants.
 *
 * @author Yuto Saito
 */
export const CUSTOMER_HEADER: VDataTable["$props"]["headers"] = [
  {
    key: "id",
    value: "id",
    title: "ID",
  } as const,

  { key: "honorific", value: "honorific", title: "Honorific" } as const,
  {
    key: "fullName",
    value: (customer: Customer) =>
      `${customer.first_name} ${customer.last_name}`,
    title: "Name",
  } as const,
  { key: "house_number", value: "house_number", title: "House No" } as const,
  { key: "street", value: "street", title: "Street" } as const,
  { key: "account", value: "account", title: "Account" } as const,
  { key: "actions" } as const,
] as const;

export const PRODUCT_HEADER: VDataTable["$props"]["headers"] = [
  {
    key: "id",
    value: "id",
    title: "ID",
  } as const,
  {
    key: "name",
    value: "name",
    title: "Name",
  } as const,
  {
    key: "description",
    value: "description",
    title: "Description",
    width: "60%",
  } as const,
  { key: "price", value: "price", title: "Price(£)" } as const,
  {
    key: "volume",
    value: (product: Product) => `${product.volume} (${product.unit})`,
    title: "Volume",
  } as const,
  { title: "", key: "actions" } as const,
] as const;
