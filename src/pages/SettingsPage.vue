<template>
  <q-page>
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
        <q-tab name="sem" label="SEM" />
        <q-tab name="cadido" label="CADIDO" />
      </q-tabs>
      <q-separator />
      <q-tab-panels v-model="tab">
        <q-tab-panel name="usuarios">
          <UsuariosComponent />
        </q-tab-panel>

        <q-tab-panel name="empleados">
          <EmpleadosComponent />
        </q-tab-panel>

        <q-tab-panel name="sem">
          <SEMComponent />
        </q-tab-panel>

        <q-tab-panel name="cadido">
          <CadidoComponent />
        </q-tab-panel>
      </q-tab-panels>
    </div>
  </q-page>
</template>

<script setup>
import { ref } from "vue";

import UsuariosComponent from "src/components/settings/UsuariosComponent.vue";
import EmpleadosComponent from "src/components/settings/EmpleadosComponent.vue";
import SEMComponent from "src/components/settings/SEMComponent.vue";
import CadidoComponent from "src/components/settings/CadidoComponent.vue";

const tab = ref("usuarios");
</script>
