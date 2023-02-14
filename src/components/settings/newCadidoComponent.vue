<template>
  <q-card style="width: 600px">
    <q-card-section class="row items-center q-pb-none">
      <div class="text-h6">{{ title }} edificio</div>
      <q-space />
      <q-btn icon="close" flat round dense v-close-popup />
    </q-card-section>
    <q-card-section>
      <q-form @submit="onSubmit" class="q-gutter-md">
        <q-input outlined v-model="edificio" autofocus label="Nombre" dense>
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
import { useEdificiosStore } from "src/stores/edificios-store";

const $q = useQuasar();
const storeEdificios = useEdificiosStore();
const edificio = ref("");

const props = defineProps({
  title: {
    type: String,
    default: "",
  },
  edificioId: {
    type: String,
    requiered: true,
  },
  edificioName: {
    type: String,
    requiered: true,
  },
});

onMounted(() => {
  edificio.value = props.edificioName;
});

async function onSubmit() {
  try {
    let result = null;
    if (props.title === "Agregar") {
      result = await storeEdificios.addEdificio({ name: edificio.value });
    } else {
      result = await storeEdificios.updEdificio({
        id: props.edificioId,
        name: edificio.value,
      });
    }
    if (result) {
      $q.notify({
        color: "positive",
        message:
          props.title === "Agregar"
            ? "Edificio agregado correctamente"
            : "Edificio modificado correctamente",
      });
    }
  } catch (error) {
    $q.notify({
      color: "negative",
      message: "Ocurrió un error al agregar el edificio",
    });
    console.log(error);
  }
}
</script>
