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
      :rows="folios"
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
          @click="showNewMinutario()"
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
              @click="showEditMinutario(props.row.id, props.row.name)"
            />
            <q-btn
              size="sm"
              flat
              round
              dense
              color="negative"
              icon="delete"
              function
              @click="deleteMinutario(props.row.id, props.row.name)"
            />
          </q-td>
        </q-tr>
      </template>
    </q-table>
  </q-page>
</template>

<script setup>
import { onMounted, computed } from "vue";
import { useMinutarioStore } from "src/stores/minutario-store";

const storeMinutario = useMinutarioStore();
const folios = computed(() => storeMinutario.folios);
onMounted(() => storeMinutario.fetchFolios);
</script>
