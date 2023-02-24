<template>
  <q-card style="width: 600px">
    <q-card-section class="row items-center q-pb-none">
      <div class="text-h6">{{ title }} cadido</div>
      <q-space />
      <q-btn icon="close" flat round dense v-close-popup />
    </q-card-section>
    <q-card-section>
      <q-form @submit="onSubmit" class="q-gutter-md">
        <q-input outlined v-model="cadido" autofocus label="Nombre" dense>
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
import { useCadidoStore } from "src/stores/cadido-store";

const $q = useQuasar();
const storecadido = useCadidoStore();
const cadido = ref("");

const props = defineProps({
  title: {
    type: String,
    default: "",
  },
  cadidoId: {
    type: String,
    requiered: true,
  },
  cadidoName: {
    type: String,
    requiered: true,
  },
});

onMounted(() => {
  cadido.value = props.cadidoName;
});

async function onSubmit() {
  try {
    let result = null;
    if (props.title === "Agregar") {
      result = await storecadido.addcadido({ name: cadido.value });
    } else {
      result = await storecadido.updcadido({
        id: props.cadidoId,
        name: cadido.value,
      });
    }
    if (result) {
      $q.notify({
        color: "positive",
        message:
          props.title === "Agregar"
            ? "cadido agregado correctamente"
            : "cadido modificado correctamente",
      });
    }
  } catch (error) {
    $q.notify({
      color: "negative",
      message: "Ocurrió un error al agregar el cadido",
    });
    console.log(error);
  }
}
</script>
