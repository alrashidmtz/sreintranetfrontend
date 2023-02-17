<template>
  <q-card style="width: 600px">
    <q-card-section class="row items-center">
      <div class="text-h6">{{ title }} Usuario</div>
      <q-space />
      <q-btn icon="close" flat round v-close-popup />
    </q-card-section>
    <q-separator></q-separator>
    <q-card-section>
      <q-form @submit="onSubmit" class="q-gutter-md">
        <q-input
          autofocus
          outlined
          v-model="form.displayName"
          label="Nombre completo"
        >
        </q-input>
        <q-input outlined v-model="form.username" label="Usuario"> </q-input>
        <q-input outlined v-model="form.password" label="Contraseña"> </q-input>
        <q-input
          outlined
          v-model="form.confirmPassword"
          label="Confirmar contraseña"
        >
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
import { useEmpleadosStore } from "src/stores/empleados-store";

const $q = useQuasar();
const storeUsuarios = useEmpleadosStore();
const form = ref({
  username: "",
  displayName: "",
  password: "",
  confirmPassword: "",
});

const props = defineProps({
  title: {
    type: String,
    requiered: true,
  },
  usuario: {
    type: Object,
  },
});

onMounted(() => {
  form.value = props.usuario;
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
