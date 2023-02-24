<template>
  <q-card style="width: 600px">
    <q-card-section class="row items-center">
      <div class="text-h6">{{ title }} empleado</div>
      <q-space />
      <q-btn icon="close" flat round v-close-popup />
    </q-card-section>
    <q-separator></q-separator>
    <q-card-section>
      <q-form @submit="onSubmit" class="q-gutter-md">
        <q-input outlined v-model="form.name" autofocus label="Nombre">
        </q-input>
        <q-input outlined v-model="form.lastName" label="Apellidos"> </q-input>
        <q-input outlined v-model="form.email" label="Correo electrónico">
        </q-input>
        <div class="row">
          <div class="col">
            <q-input outlined v-model="form.extension" label="Extensión">
            </q-input>
          </div>
          <div class="col q-pl-md">
            <q-select
              outlined
              v-model="form.tipo"
              :options="tipos"
              label="Tipo"
            />
          </div>
        </div>
        <q-input outlined v-model="form.puesto" label="Puesto"> </q-input>
        <q-select
          outlined
          v-model="form.departamento"
          :options="departamentos"
          label="Departamento"
        />
      </q-form>
    </q-card-section>
    <q-separator />
    <q-card-actions align="right">
      <q-btn-toggle
        class="q-ml-sm"
        v-model="form.enabled"
        toggle-color="primary"
        :options="[
          { label: 'Activo', value: 1 },
          { label: 'Inactivo', value: 0 },
        ]"
      />
      <q-space></q-space>
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
const storeEmpleados = useEmpleadosStore();
const form = ref({
  tipo: "PSPI",
  enabled: "1",
});

const props = defineProps({
  title: {
    type: String,
    default: "",
  },
  empleado: {
    type: Object,
    requiered: true,
  },
});

const tipos = ["PSPI", "SEM"];
const departamentos = [
  "Administración",
  "Asuntos Comunitarios",
  "Centro Cultural Mexicano",
  "Documentación",
  "Oficina del Titular",
  "Promoción y difusión",
  "Protección",
  "Tecnologías de la Información",
];

onMounted(() => {
  console.log(props.empleado);
  form.value = props.empleado;
});

async function onSubmit() {
  try {
    let result = null;
    console.log(form.value);
    if (props.title === "Agregar") {
      result = await storeEmpleados.add(form.value);
    } else {
      result = await storeEmpleados.upd(form.value);
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
