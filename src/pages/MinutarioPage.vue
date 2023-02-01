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
      v-model:pagination="initialPagination"
      :rows="storeMinutario.folios"
      :loading="isLoadingTable"
      :columns="columns"
      :filter="filter"
      row-key="id"
      @request="onRequest"
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
import newFolioComponent from "src/components/newFolioComponent.vue";

const $q = useQuasar();
const storeMinutario = useMinutarioStore();
const showNewFolioDialog = ref(false);
const isLoadingTable = ref(false);
const filter = ref("");
const title = ref("Agregar");
const folio = ref({});

const initialPagination = {
  sortBy: "id",
  descending: true,
  page: 1,
  rowsPerPage: 20,
  rowsNumber: 0,
};

function onRequest(props) {
  const { page, rowsPerPage, sortBy, descending } = props.pagination;
  const filter = props.filter;

  isLoadingTable.value = true;
  // update rowsCount with appropriate value
  pagination.value.rowsNumber = getRowsNumber(filter);

  // get all rows if "All" (0) is selected
  const fetchCount =
    rowsPerPage === 0 ? pagination.value.rowsNumber : rowsPerPage;

  // calculate starting row of data
  const startRow = (page - 1) * rowsPerPage;

  // fetch data from "server"
  const returnedData = fetchFolios(
    startRow,
    fetchCount,
    filter,
    sortBy,
    descending
  );

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

  await storeMinutario.getRowsNumber(filter);
  initialPagination.rowsNumber = storeMinutario.rowsNumber;
  console.log(initialPagination);
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
    field: "id",
    sortable: true,
  },
  {
    name: "asunto",
    required: true,
    label: "Asunto",
    align: "left",
    field: "asunto",
    sortable: true,
  },
  {
    name: "fecha",
    required: true,
    label: "Fecha",
    align: "left",
    field: "fecha",
    sortable: true,
  },
  {
    name: "referencia",
    required: true,
    label: "Referencia",
    align: "left",
    field: "referencia",
    sortable: true,
  },
  {
    name: "documento",
    required: true,
    label: "Documento",
    align: "left",
    field: "Documento",
    sortable: true,
  },
  {
    name: "sicar",
    required: true,
    label: "Sicar",
    align: "left",
    field: "sical",
    sortable: true,
  },
  {
    name: "sem",
    required: true,
    label: "SEM",
    align: "left",
    field: "sem",
    sortable: true,
  },
  {
    name: "local",
    required: true,
    label: "Local",
    align: "left",
    field: "local",
    sortable: true,
  },
];
</script>
