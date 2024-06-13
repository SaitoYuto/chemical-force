<template>
  <InformationCard
    class="ml-auto"
    v-for="info in infos"
    :key="info.id"
    :id="info.id"
    :title="info.title"
    :content="info.content"
    @show-details="showDetails"
  >
  </InformationCard>
  <InformationDetail
    :visibility="visible"
    :info="selectedInfo"
    @close="closeDetails"
  ></InformationDetail>
</template>

<script lang="ts" setup>
import InformationCard from "@/atoms/InformationCard.vue";
import InformationDetail from "@/atoms/InformationDetail.vue";
import { Information } from "@/interfaces/Common/Information";
import { GetInformationRequest } from "@/interfaces/Requests/GetInformation";
import { GetInformationResponse } from "@/interfaces/Responses/GetInformation";
import { user } from "@/stores/user";
import ApiRequester from "@/utils/ApiRequester";

const infos = ref([] as Information[]);
const selectedInfo = ref<Information>();
const visible = ref(false);

/**
 * Request information data on mounted
 *
 * @author Yuto Saito
 */
onMounted(() => {
  new ApiRequester<GetInformationRequest, GetInformationResponse>().call(
    "getInformation",
    {
      userId: user().getId,
    },
    (response) => {
      infos.value = response.information;
    },
    (apiError) => {
      console.log(...apiError.errors);
    }
  );
});

/**
 * Show information detail
 *
 * @param {Information} selected information
 * @returns {void}
 * @author Yuto Saito
 */
function showDetails(selected: Information): void {
  selectedInfo.value = selected;
  visible.value = true;
}

/**
 * Close information detail
 *
 * @returns {void}
 * @author Yuto Saito

 */
function closeDetails(): void {
  visible.value = false;
}
</script>
