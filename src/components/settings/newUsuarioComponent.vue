<template>
  <q-card style="width: 600px">
    <q-card-section class="row items-center q-pb-none">
      <div class="text-h6">{{ title }} usuario</div>
      <q-space />
      <q-btn icon="close" flat round dense v-close-popup />
    </q-card-section>
    <q-card-section>
      <q-form @submit="onSubmit" class="q-gutter-md">
        <q-input outlined v-model="name" autofocus label="Nombre" dense>
        </q-input>
        <q-input outlined v-model="email" label="Correo electrónico" dense>
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
import { useempleadosStore } from "src/stores/empleados-store";

const $q = useQuasar();
const storeUsuarios = useempleadosStore();
const name = ref("");
const email = ref("");

const props = defineProps({
  title: {
    type: String,
    default: "",
  },
  empleadoId: {
    type: String,
    requiered: true,
  },
  usuarioName: {
    type: String,
    requiered: true,
  },
  usuarioEmail: {
    type: String,
    requiered: true,
  },
});

onMounted(() => {
  name.value = props.usuarioName;
  email.value = props.usuarioEmail;
});

async function onSubmit() {
  try {
    let result = null;
    if (props.title === "Agregar") {
      result = await storeUsuarios.addUsuario({
        name: name.value,
        email: email.value,
      });
    } else {
      result = await storeUsuarios.updUsuario({
        id: props.usuarioId,
        name: name.value,
        email: email.value,
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
