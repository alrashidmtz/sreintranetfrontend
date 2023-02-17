<template>
  <q-toolbar>
    <q-toolbar-title> Configuración </q-toolbar-title>
  </q-toolbar>
  <div class="q-mt-lg">
    <q-tabs
      dense
      v-model="tab"
      class="text-grey"
      active-color="primary"
      indicator-color="primary"
      align="left"
      narrow-indicator
    >
      <q-tab name="usuarios" label="Usuarios" />
      <q-tab name="empleados" label="Empleados" />
      <q-tab name="calendario" label="Calendario" />
      <q-tab name="remitente" label="Remitente" />
    </q-tabs>
    <q-separator />
    <q-tab-panels v-model="tab">
      <q-tab-panel name="usuarios">
        <UsuariosComponent />
      </q-tab-panel>

      <q-tab-panel name="empleados">
        <EmpleadosComponent />
      </q-tab-panel>

      <q-tab-panel name="calendario">
        <CalendarioComponent />
      </q-tab-panel>

      <q-tab-panel name="remitente">
        <RemitenteComponent />
      </q-tab-panel>
    </q-tab-panels>
  </div>
</template>

<script setup>
import { ref } from "vue";

import UsuariosComponent from "src/components/settings/UsuariosComponent.vue";
import EmpleadosComponent from "src/components/settings/EmpleadosComponent.vue";
import CalendarioComponent from "src/components/settings/CalendarioComponent.vue";
import RemitenteComponent from "src/components/settings/RemitenteComponent.vue";

const tab = ref("usuarios");
</script>
