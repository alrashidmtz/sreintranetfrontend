<template>
  <q-card style="width: 600px">
    <q-card-section class="row items-center">
      <div class="text-h6">{{ title }} Calendario</div>
      <q-space />
      <q-btn icon="close" flat round dense v-close-popup />
    </q-card-section>
    <q-card-section>
      <q-form @submit="onSubmit" class="q-gutter-md">
        <q-input outlined v-model="name" autofocus label="Nombre" dense>
        </q-input>
        <q-input outlined v-model="lastName" label="Apellidos" dense> </q-input>
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
import { useCalendarioStore } from "src/stores/calendario-store";

const $q = useQuasar();
const storeCalendario = useCalendarioStore();
const name = ref("");
const lastName = ref("");

const props = defineProps({
  title: {
    type: String,
    default: "",
  },
  empleadoId: {
    type: String,
    requiered: true,
  },
  empleadoName: {
    type: String,
    requiered: true,
  },
  empleadoLastName: {
    type: String,
    requiered: true,
  },
});

onMounted(() => {
  name.value = props.empleadoName;
  lastName.value = props.empleadoLastName;
});

async function onSubmit() {
  try {
    let result = null;
    if (props.title === "Agregar") {
      result = await storeCalendario.addempleado({
        name: name.value,
        lastName: lastName.value,
      });
    } else {
      result = await storeCalendario.updempleado({
        id: props.empleadoId,
        name: name.value,
        lastName: lastName.value,
      });
    }
    if (result) {
      $q.notify({
        color: "positive",
        message:
          props.title === "Agregar"
            ? "Empleado agregado correctamente"
            : "Empleado modificado correctamente",
      });
    }
  } catch (error) {
    $q.notify({
      color: "negative",
      message: "Ocurrió un error al agregar el empleado",
    });
    console.log(error);
  }
}
</script>
