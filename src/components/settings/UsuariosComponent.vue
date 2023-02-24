<template>
  <q-table
    dense
    title="Usuarios"
    :pagination="initialPagination"
    :rows="storeUsuarios.usuarios"
    :columns="columns"
    :filter="filter"
    :loading="isLoading"
    row-key="id"
    loading-label="Cargando..."
    no-data-label="No se encontraron registros"
    no-results-label="No se encontraron registros en este momento"
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
        @click="showNewregistro()"
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
            @click="showEditregistro(props.row.id, props.row.name)"
          />
          <q-btn
            size="sm"
            flat
            round
            dense
            color="negative"
            icon="delete"
            function
            @click="deleteregistro(props.row.id, props.row.name)"
          />
        </q-td>
      </q-tr>
    </template>
  </q-table>
  <q-dialog v-model="showNewregistroDialog">
    <newUsuarioComponent
      :title="title"
      :registroId="registroId"
      :registroName="registroName"
    ></newUsuarioComponent>
  </q-dialog>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useQuasar } from "quasar";
import { useUsuariosStore } from "src/stores/usuarios-store";
import newUsuarioComponent from "./newUsuarioComponent.vue";

const $q = useQuasar();
const storeUsuarios = useUsuariosStore();
const showNewregistroDialog = ref(false);
const filter = ref("");
const title = ref("Agregar");
const registroId = ref(null);
const registroName = ref(null);
const isLoading = ref(false);

const initialPagination = {
  sortBy: "name",
  descending: false,
  page: 1,
  rowsPerPage: 20,
};

onMounted(async () => {
  isLoading.value = true;
  await storeUsuarios.fetch();
  isLoading.value = false;
});

const showNewregistro = () => {
  title.value = "Agregar";
  registroId.value = null;
  registroName.value = null;
  showNewregistroDialog.value = true;
};

const showEditregistro = (id, name) => {
  title.value = "Editar";
  registroId.value = id;
  registroName.value = name;
  showNewregistroDialog.value = true;
};

const deleteregistro = (id, name) => {
  console.log(id, name);
  $q.dialog({
    title: "Borrar registro",
    color: "negative",
    message: `¿Está seguro de borrar el registro: ${name}?`,
    cancel: true,
  }).onOk(async () => {
    const result = await storeUsuarios.delregistro(id);
    if (result) {
      $q.notify({
        color: "positive",
        message: "registro borrado con éxito",
      });
    }
  });
};

const columns = [
  {
    name: "username",
    required: true,
    label: "Usuario",
    align: "left",
    field: "username",
    sortable: true,
  },
  {
    name: "displayName",
    required: true,
    label: "Nombre",
    align: "left",
    field: "displayName",
    sortable: true,
  },
  {
    name: "type",
    required: true,
    label: "Permisos",
    align: "left",
    field: "type",
    sortable: true,
  },
  {
    name: "enabled",
    required: true,
    label: "Activo",
    align: "left",
    field: "enabled",
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
];
</script>
