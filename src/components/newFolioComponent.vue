<template>
  <q-card style="width: 600px">
    <q-card-section class="row items-center q-pb-none">
      <div class="text-h6">{{ title }} folio</div>
      <q-space />
      <q-btn icon="close" flat round dense v-close-popup />
    </q-card-section>
    <q-card-section>
      <q-form @submit="onSubmit" class="q-gutter-md">
        <q-input outlined v-model="folio" autofocus label="Nombre" dense>
        </q-input>
      </q-form>
    </q-card-section>
    <q-separator />
    <q-card-actions align="right">
      <q-btn
        label="Guardar"
        type="submit"
        color="primary"
        @click="onSubmit"
        v-close-popup
      />
    </q-card-actions>
  </q-card>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useQuasar } from "quasar";
import { useFoliosStore } from "src/stores/folios-store";

const $q = useQuasar();
const storefolios = useFoliosStore();
const folio = ref("");

const props = defineProps({
  title: {
    type: String,
    default: "",
  },
  folioId: {
    type: String,
    requiered: true,
  },
  folioName: {
    type: String,
    requiered: true,
  },
});

onMounted(() => {
  folio.value = props.folioName;
});

async function onSubmit() {
  try {
    let result = null;
    if (props.title === "Agregar") {
      result = await storefolios.addfolio({ name: folio.value });
    } else {
      result = await storefolios.updfolio({
        id: props.folioId,
        name: folio.value,
      });
    }
    if (result) {
      $q.notify({
        color: "positive",
        message:
          props.title === "Agregar"
            ? "folio agregado correctamente"
            : "folio modificado correctamente",
      });
    }
  } catch (error) {
    $q.notify({
      color: "negative",
      message: "Ocurrió un error al agregar el folio",
    });
    console.log(error);
  }
}
</script>
