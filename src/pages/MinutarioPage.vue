<template>
  <q-page view="hHh lpR fFf">
    <q-toolbar>
      <q-toolbar-title> Minutario </q-toolbar-title>
      <q-space></q-space>
      <q-btn
        stretch
        flat
        color="primary"
        icon="add"
        label="Agregar"
        @click="showNewFolio()"
      />
    </q-toolbar>
    <q-table
      flat
      dense
      :pagination="initialPagination"
      :rows="storeMinutario.folios"
      :loading="isLoadingTable"
      :columns="columns"
      :filter="filter"
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
          <!-- <q-td auto-width>
            <q-btn
              size="sm"
              flat
              round
              dense
              color="primary"
              icon="edit"
              @click="showEditFolio(props.row)"
            />
            <q-btn
              size="sm"
              flat
              round
              dense
              color="negative"
              icon="delete"
              function
              @click="deleteFolio(props.row.id, props.row.name)"
            />
          </q-td> -->
        </q-tr>
      </template>
    </q-table>
    <q-dialog v-model="showNewFolioDialog">
      <newFolioComponent :title="title" :folio="folio"></newFolioComponent>
    </q-dialog>
  </q-page>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useQuasar } from "quasar";
import { useMinutarioStore } from "src/stores/minutario-store";
import { useEmpleadosStore } from "src/stores/empleados-store";

import newFolioComponent from "src/components/newFolioComponent.vue";

const storeMinutario = useMinutarioStore();
const storeEmpleado = useEmpleadosStore();

const $q = useQuasar();

const showNewFolioDialog = ref(false);
const isLoadingTable = ref(false);
const filter = ref("");
const title = ref("Agregar");
const folio = ref({});

const initialPagination = {
  rowsPerPage: 20,
};

// @request="onRequest"
function onRequest(props) {
  const { page, rowsPerPage, sortBy, descending } = props.pagination;
  const filter = props.filter;

  isLoadingTable.value = true;
  // update rowsCount with appropriate value
  pagination.value.rowsNumber = getRowsNumber(filter);

  // fetch data from "server"
  const returnedData = fetchFolios();

  // clear out existing data and add new
  rows.value.splice(0, rows.value.length, ...returnedData);

  // don't forget to update local pagination object
  pagination.value.page = page;
  pagination.value.rowsPerPage = rowsPerPage;
  pagination.value.sortBy = sortBy;
  pagination.value.descending = descending;

  // ...and turn of loading indicator
  isLoadingTable.value = false;
}

onMounted(async () => {
  isLoadingTable.value = true;
  storeEmpleado.fetch();

  await storeMinutario.fetchFolios();

  isLoadingTable.value = false;
});

const showNewFolio = () => {
  title.value = "Agregar";
  folio.value = {
    id: "",
    asunto: "",
    fecha: new Date().toISOString().slice(0, 10),
    referencia: "",
    documento: "",
    sicar: "",
    sem: "",
    local: "",
  };
  showNewFolioDialog.value = true;
};

const showEditFolio = (folio) => {
  title.value = "Editar";
  folio.value = folio;
  showNewFolioDialog.value = true;
};

const deleteFolio = (id, name) => {
  console.log(id, name);
  $q.dialog({
    title: "Borrar Folio",
    color: "negative",
    message: `¿Está seguro de borrar el Folio: ${name}?`,
    cancel: true,
  }).onOk(async () => {
    const result = await storeMinutario.delFolio(id);
    if (result) {
      $q.notify({
        color: "positive",
        message: "Folio borrado con éxito",
      });
    }
  });
};

const columns = [
  {
    name: "id",
    required: true,
    label: "Folio",
    align: "left",
    field: "ID",
    sortable: true,
  },
  {
    name: "fecha",
    required: true,
    label: "Fecha",
    align: "left",
    field: "FECHA",
    // sort: (a, b, rowA, rowB) => parseInt(a, 10) - parseInt(b, 10),
    format: (val, row) => `${val.toString().slice(0, 10)}`,
    sortable: true,
  },
  {
    name: "asunto",
    required: true,
    label: "Asunto",
    align: "left",
    field: "ASUNTO",
    sortable: true,
    with: "50px",
  },
  {
    name: "referencia",
    required: true,
    label: "Referencia",
    align: "left",
    field: "REFERENCIA",
    sortable: true,
  },
  {
    name: "documento",
    required: true,
    label: "Documento",
    align: "left",
    field: "DOCUMENTO",
    sortable: true,
  },
  {
    name: "sicar",
    required: true,
    label: "Sicar",
    align: "left",
    field: "SICAR",
    sortable: true,
  },
  {
    name: "sem",
    required: true,
    label: "SEM",
    align: "left",
    field: "SEM",
    sortable: true,
  },
  {
    name: "local",
    required: true,
    label: "Local",
    align: "left",
    field: "LOCAL",
    sortable: true,
  },
];
</script>
