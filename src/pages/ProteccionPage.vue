<template>
  <q-page view="hHh lpR fFf">
    <q-toolbar bordered>
      <q-toolbar-title> Protección </q-toolbar-title>
    </q-toolbar>
    <q-card flat>
      <div class="row" style="min-height: 600px">
        <div class="col-3">
          <q-list>
            <q-expansion-item
              group="somegroup"
              icon="library_books"
              label="Documentos"
              default-opened
              header-class="text-bold bg-grey-2"
            >
              <q-list>
                <q-item
                  clickable
                  v-ripple
                  v-for="documento in documentos"
                  :key="documento.id"
                  @click="
                    src = documento.link;
                    title = documento.name;
                  "
                >
                  <q-item-section>
                    <q-item-label>{{ documento.name }}</q-item-label>
                    <q-item-label caption>{{
                      documento.description
                    }}</q-item-label>
                  </q-item-section>
                </q-item>
              </q-list>
            </q-expansion-item>

            <q-expansion-item
              group="somegroup"
              icon="bookmark"
              label="Formatos"
              header-class="text-bold bg-grey-2"
            >
              <q-list>
                <q-item
                  clickable
                  v-ripple
                  v-for="formato in formatos"
                  :key="formato.id"
                  @click="
                    src = formato.link;
                    title = formato.name;
                  "
                >
                  <q-item-section>
                    <q-item-label>{{ formato.name }}</q-item-label>
                    <!-- <q-item-label caption>{{
                      formato.description
                    }}</q-item-label> -->
                  </q-item-section>
                </q-item>
              </q-list>
            </q-expansion-item>
          </q-list>
        </div>
        <div class="col bg-grey-9">
          <p class="text-center text-white text-h6 q-pt-sm">
            {{ title }}
          </p>
          <q-pdfviewer type="html5" :src="src" />
        </div>
      </div>
    </q-card>
  </q-page>
</template>

<script setup>
import { ref } from "vue";
const src = ref("");
const title = ref("");

const documentos = [
  {
    id: "f1",
    name: "Guía de protección consular",
    description: "",
    link: "docs/proteccion/Guiaproteccionconsular.pdf",
  },
  {
    id: "f4",
    name: "Normas de Protección v.3 Mayo 2017",
    description: "",
    link: "docs/proteccion/normasproteccionmayo2017v3.pdf",
  },
  {
    id: "f5",
    name: "Requisitos para Permiso Humanitario",
    description: "",
    link: "docs/proteccion/requisitosvisashumanitarias.xlsx",
  },
];

const formatos = [
  {
    id: "f2",
    name: "Formato Declaración Bajo Protesta de Decir Verdad",
    description: "",
    link: "docs/proteccion/Anexo1.pdf",
  },
  {
    id: "f3",
    name: "Formato Dictamen de casos de protección consular",
    description: "",
    link: "docs/proteccion/Anexo2.pdf",
  },
];
</script>
