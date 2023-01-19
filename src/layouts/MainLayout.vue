<template>
  <q-layout view="hHh lpR fFf">
    <q-header elevated>
      <q-toolbar class="toolbar_top">
        <q-btn dense flat round icon="menu" @click="toggleRightDrawer" />
        <q-toolbar-title>
          <img
            class="flex flex-center"
            style="height: 50px"
            src="images/consulmex_banner_blanco.png"
            alt="Logo consulmex filadelfia"
          />
        </q-toolbar-title>
      </q-toolbar>
      <q-toolbar class="toolbar">
        <q-space></q-space>
        <q-tabs v-model="tab" shrink>
          <q-route-tab name="home" icon="home" to="/" />
          <q-route-tab
            name="documentacion"
            label="Documentación"
            to="/documentacion"
          />
          <q-route-tab name="proteccion" label="Protección" to="/proteccion" />
          <q-route-tab
            name="registrocivil"
            label="Registro Civil"
            to="/civil"
          />
          <q-route-tab
            name="comunitarios"
            label="Asuntos Comunitarios"
            to="/comunitarios"
          />
        </q-tabs>
      </q-toolbar>
      <!-- <div class="q-pa-sm logo_mexico flex flex-center">
        <q-img src="images/Logo_Blanco-01.png" width="300px" />
      </div> -->
    </q-header>

    <q-drawer show-if-above v-model="rightDrawerOpen" side="left" bordered>
      <div class="q-pa-md logo_mexico">
        <q-img src="images/Logo_Blanco-01.png"></q-img>
      </div>
      <q-list>
        <q-item-label header> Ligas externas </q-item-label>

        <EssentialLink
          v-for="link in linksList"
          :key="link.title"
          v-bind="link"
        />
        <q-item-label header> Aplicaciones </q-item-label>

        <EssentialLinkLocal
          v-for="link in applications"
          :key="link.title"
          v-bind="link"
        />
      </q-list>
    </q-drawer>

    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script setup>
import { ref } from "vue";
import EssentialLink from "components/EssentialLink.vue";
import EssentialLinkLocal from "components/EssentialLinkLocal.vue";

const tab = ref("home");
const rightDrawerOpen = ref(false);

function toggleRightDrawer() {
  rightDrawerOpen.value = !rightDrawerOpen.value;
}

const applications = [
  {
    title: "Minutario",
    caption: "Generador de números de folio",
    icon: "post_add",
    link: "#/minutario",
  },
  {
    title: "Vacaciones",
    caption: "Gestión de vacaciones",
    icon: "beach_access",
    link: "#/vacaciones",
  },
  {
    title: "C. Móvil",
    caption: "Gestión de Consulado Móvil",
    icon: "holiday_village",
    link: "#/conmovil",
  },
];

const linksList = [
  {
    title: "SUET",
    caption: "Sistema Integral de Emisión de Trámites",
    icon: "memory",
    link: "https://suet.sre.gob.mx/",
  },
  {
    title: "Consulta CURP",
    caption: "Documentacion",
    icon: "person",
    link: "https://www.gob.mx/curp/",
  },
  {
    title: "ACTAMEX",
    caption: "Sistema de verificación de Actos Registrales",
    icon: "book",
    link: "https://cevar.registrocivil.gob.mx/eVAR/AutenticaServlet",
  },
  {
    title: "SIDEA",
    caption: "Sistema Integal de Impresión de Actas",
    icon: "bookmark",
    link: "https://csidea.registrocivil.gob.mx/SideaV2/logOutAction.do",
  },
  {
    title: "CAPF",
    caption: "Constancia de Antecedentes Penales Federales",
    icon: "lock_person",
    link: "https://constancias.oadprs.gob.mx/",
  },
  {
    title: "SPC",
    caption: "Sistema de Protección Consular",
    icon: "admin_panel_settings",
    link: "https://spc.sre.gob.mx/",
  },
  {
    title: "Extranet",
    caption: "Secretaría de Relaciones Exteriores",
    icon: "public",
    link: "https://extranet.sre.gob.mx/",
  },
  {
    title: "Intranet DGSC",
    caption: "Intranet DG Servicios Consulares",
    icon: "public",
    link: "https://intranetdgsc.sre.gob.mx/",
  },
];
</script>

<style scoped>
.toolbar_top {
  background-color: #0d221e;
  height: 60px;
}
.toolbar {
  background-color: #13322b;
}

.logo_mexico {
  background-image: url("images/home.png");
  background-size: cover;
  height: 110px;
}
</style>
