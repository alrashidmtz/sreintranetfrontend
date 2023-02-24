<template>
  <q-table
    dense
    title="Empleados"
    :pagination="initialPagination"
    :rows="storeEmpleados.empleados"
    :columns="columns"
    :filter="filter"
    :loading="isLoading"
    row-key="id"
    loading-label="Cargando..."
    no-data-label="No se encontraron Registros"
    no-results-label="No se encontraron Registros en este momento"
    rows-per-page-label="Registros por página:"
  >
    <template v-slot:top-right>
      <q-input
        dense
        debounce="300"
        color="primary"
        v-model="filter"
        placeholder="Buscar"
      >
        <template v-slot:append>
          <q-icon v-if="filter === ''" name="search" />
          <q-icon
            v-else
            name="clear"
            class="cursor-pointer"
            @click="filter = ''"
          />
        </template>
      </q-input>
      <q-btn
        flat
        color="secondary"
        icon="add"
        label="Agregar"
        @click="showNewEmpleado()"
      ></q-btn>
    </template>
    <template v-slot:header="props">
      <q-tr>
        <q-th v-for="col in props.cols" :key="col.name" :props="props">
          {{ col.label }}
        </q-th>
        <q-th auto-width />
      </q-tr>
    </template>
    <template v-slot:body="props">
      <q-tr :props="props">
        <q-td v-for="col in props.cols" :key="col.name" :props="props">
          {{ col.value }}
        </q-td>
        <q-td auto-width>
          <q-btn
            size="sm"
            flat
            round
            dense
            color="primary"
            icon="edit"
            @click="showEditEmpleado(props.row)"
          />
          <q-btn
            size="sm"
            flat
            round
            dense
            color="negative"
            icon="delete"
            function
            @click="deleteEmpleado(props.row.id, props.row.name)"
          />
        </q-td>
      </q-tr>
    </template>
  </q-table>
  <q-dialog v-model="showNewEmpleadoDialog">
    <newEmpleadosComponent
      :title="title"
      :empleado="empleado"
    ></newEmpleadosComponent>
  </q-dialog>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useQuasar } from "quasar";
import { useEmpleadosStore } from "src/stores/empleados-store";
import newEmpleadosComponent from "./newEmpleadosComponent.vue";

const $q = useQuasar();
const storeEmpleados = useEmpleadosStore();
const showNewEmpleadoDialog = ref(false);
const filter = ref("");
const title = ref("Agregar");
const empleado = ref({});
const isLoading = ref(false);

const initialPagination = {
  sortBy: "name",
  descending: false,
  page: 1,
  rowsPerPage: 20,
};

onMounted(async () => {
  isLoading.value = true;
  await storeEmpleados.fetch();
  isLoading.value = false;
});

const showNewEmpleado = () => {
  title.value = "Agregar";
  empleado.value = {
    tipo: "PSPI",
    enabled: "1",
  };
  showNewEmpleadoDialog.value = true;
};

const showEditEmpleado = (emp) => {
  console.log(emp);
  title.value = "Editar";
  empleado.value = emp;
  showNewEmpleadoDialog.value = true;
};

const deleteEmpleado = (id, name) => {
  console.log(id, name);
  $q.dialog({
    title: "Borrar Empleado",
    color: "negative",
    message: `¿Está seguro de borrar el Empleado: ${name}?`,
    cancel: true,
  }).onOk(async () => {
    const result = await storeEmpleados.del(id);
    if (result) {
      $q.notify({
        color: "positive",
        message: "Empleado borrado con éxito",
      });
    }
  });
};

const columns = [
  {
    name: "name",
    required: true,
    label: "Nombre",
    align: "left",
    field: "name",
    sortable: true,
  },
  {
    name: "lastName",
    required: true,
    label: "Apellidos",
    align: "left",
    field: "lastName",
    sortable: true,
  },
  {
    name: "puesto",
    required: true,
    label: "Puesto",
    align: "left",
    field: "puesto",
    sortable: true,
  },
  {
    name: "departamento",
    required: true,
    label: "Departamento",
    align: "left",
    field: "departamento",
    sortable: true,
  },
  {
    name: "extension",
    required: true,
    label: "extension",
    align: "left",
    field: "extension",
    sortable: true,
  },
  {
    name: "email",
    required: true,
    label: "Correo electrónico",
    align: "left",
    field: "email",
    sortable: true,
  },
  {
    name: "tipo",
    required: true,
    label: "Tipo",
    align: "left",
    field: "tipo",
    sortable: true,
  },
  {
    name: "enabled",
    required: true,
    label: "Activo?",
    align: "left",
    field: "enabled",
    sortable: true,
  },
];
</script>
