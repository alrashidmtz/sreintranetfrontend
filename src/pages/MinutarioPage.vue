<template>
  <q-page view="hHh lpR fFf">
    <q-toolbar bordered>
      <q-toolbar-title> Minutario </q-toolbar-title>
      <q-space></q-space>
      <q-btn></q-btn>
    </q-toolbar>
    <q-table
      dense
      title="Minutario"
      :pagination="initialPagination"
      :rows="storeMinutario.folios"
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
        <q-btn
          flat
          color="secondary"
          icon="add"
          label="Agregar"
          @click="showNewFolio()"
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
              @click="showEditFolio(props.row.id, props.row.name)"
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
          </q-td>
        </q-tr>
      </template>
    </q-table>
  </q-page>
</template>

<script setup>
import { ref } from "vue";
import { useQuasar } from "quasar";
import { useFoliosStore } from "src/stores/Folios-store";
import newFolioComponent from "./newFolioComponent.vue";

const $q = useQuasar();
const storeFolios = useFoliosStore();
const showNewFolioDialog = ref(false);
const filter = ref("");
const title = ref("Agregar");
const FolioId = ref(null);
const FolioName = ref(null);

const initialPagination = {
  sortBy: "name",
  descending: false,
  page: 1,
  rowsPerPage: 20,
};

const showNewFolio = () => {
  title.value = "Agregar";
  FolioId.value = null;
  FolioName.value = null;
  showNewFolioDialog.value = true;
};

const showEditFolio = (id, name) => {
  title.value = "Editar";
  FolioId.value = id;
  FolioName.value = name;
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
    const result = await storeFolios.delFolio(id);
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
    name: "name",
    required: true,
    label: "Folio",
    align: "left",
    field: "name",
    sortable: true,
  },
];
</script>
