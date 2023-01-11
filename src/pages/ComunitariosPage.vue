<template>
  <q-page view="hHh lpR fFf">
    <q-toolbar bordered>
      <q-toolbar-title> Asuntos Comunitarios </q-toolbar-title>
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
                  v-for="formato in formatos"
                  :key="formato.id"
                  @click="
                    src = formato.link;
                    title = formato.name;
                  "
                >
                  <q-item-section>
                    <q-item-label>{{ formato.name }}</q-item-label>
                    <q-item-label caption>{{
                      formato.description
                    }}</q-item-label>
                  </q-item-section>
                </q-item>
              </q-list>
            </q-expansion-item>
            <q-expansion-item
              group="somegroup"
              icon="note"
              label="Circulares"
              header-class="text-bold bg-grey-2"
            >
              <q-list>
                <q-item
                  clickable
                  v-ripple
                  v-for="circular in circulares"
                  :key="circular.id"
                  @click="
                    src = circular.link;
                    title = circular.name;
                  "
                >
                  <q-item-section>
                    <q-item-label>{{ circular.name }}</q-item-label>
                    <q-item-label caption>{{
                      circular.description
                    }}</q-item-label>
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

const circulares = [
  {
    id: "c1",
    name: "IME5477.- RECORDATORIO SISTEMA INFORMÁTICO DE COMUNIDADES (SIC) IME",
    description: "",
    link: "docs/comunitarios/circulares/IME5477.pdf",
  },
];

const imagenes = [
  {
    id: "11",
    name: "IME",
    link: "docs/comunitarios/imagenes/IME5477.pdf",
  },
  {
    id: "12",
    name: "ANEXCID",
    link: "docs/comunitarios/imagenes/IME5477.pdf",
  },
  {
    id: "13",
    name: "IME Becas",
    link: "docs/comunitarios/imagenes/IME5477.pdf",
  },
  {
    id: "14",
    name: "SRE",
    link: "docs/comunitarios/imagenes/IME5477.pdf",
  },
  {
    id: "15",
    name: "Ventanilla de salud",
    link: "docs/comunitarios/imagenes/IME5477.pdf",
  },
];

const formatos = [
  {
    id: "f1",
    name: "Solicitud de Duplicado de Certificado de Primaria o Secundaria",
    description: "",
    link: "docs/comunitarios/Solicitud_de_Duplicados_de_Certificados.pdf",
  },
  {
    id: "f2",
    name: "Diagrama de Certificaciones de Estudios IME-DGAIR",
    description: "",
    link: "docs/comunitarios/DIAGRAMA_DE_CERTIFICACIONES_DE_ESTUDIOS_IME_DGAIR.pdf",
  },
  {
    id: "f3",
    name: "Directorio de Control Escolar por Estados",
    description: "",
    link: "docs/comunitarios/DIRECTORIO_CONTROL_ESCOLAR_ESTADOS_01.pdf",
  },
];
</script>
