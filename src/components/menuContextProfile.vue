<template>
  <div>
    <q-card bordered flat class="text-center" style="width: 200px">
      <div class="q-mt-md">
        <q-avatar size="90px">
          <q-img src="images/user-icon.png"> </q-img>
        </q-avatar>
      </div>
      <q-card-section>
        <q-item-label class="text-subtitle2">{{
          currentUser.displayName
        }}</q-item-label>
        <q-item-label class="text-caption">{{
          currentUser.email
        }}</q-item-label>
      </q-card-section>
      <q-separator />
      <q-card-actions class="text-center">
        <q-btn
          v-close-popup
          flat
          label="Configuración"
          icon="settings"
          size="sm"
          color="primary"
          class="text-caption"
          to="/settings"
        />
      </q-card-actions>
      <q-separator />
      <q-card-actions>
        <q-space></q-space>
        <q-btn label="Salir" size="sm" color="primary" push v-close-popup />
      </q-card-actions>
    </q-card>
  </div>
</template>
<script setup>
import { useUsuariosStore } from "src/stores/usuarios-store";
const storeUsuarios = useUsuariosStore();
const { currentUser } = storeUsuarios;
</script>
