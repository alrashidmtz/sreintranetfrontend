<template>
  <q-page view="hHh lpR fFf">
    <q-toolbar bordered>
      <q-toolbar-title> Registro Civil </q-toolbar-title>
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
    name: "DSC16602.- Errores recurrentes en la emisión de actas de nacimiento de personas nacidas en México",
    description: "",
    link: "docs/civil/circulares/DSC16602.pdf",
  },
  {
    id: "c2",
    name: "ASJ-28157.- Procedimiento de perdida de nacionalidad Mexicana por naturalización.",
    description: "",
    link: "docs/civil/circulares/ASJ-28157.pdf",
  },
  {
    id: "c3",
    name: "DSC12737.- Actualizaciones a los Capítulos 1, 2, 5 y 5BIS, Libro I, Guía Consular.",
    description: "",
    link: "docs/civil/circulares/DSC12737.pdf",
  },
  {
    id: "c4",
    name: "DSC01044.- CIR Seg. Implementación del pase de revista digital - IMSS.",
    description: "",
    link: "docs/civil/circulares/DSC01044.pdf",
  },
  {
    id: "c5",
    name: "DSC02180.- Lineamientos que regulan el registro de nacimiento de los mexicanos que nacieron en territorio nacional",
    description: "",
    link: "docs/civil/circulares/DSC02180.pdf",
  },
  {
    id: "c6",
    name: "DSC04794.- Circular. Resolutivo para la ampliación de equipaje personal y franquicia para mexicanos repatriados - 2017.",
    description: "",
    link: "docs/civil/circulares/DSC04794.pdf",
  },
  {
    id: "c7",
    name: "DSC07616.- CIRCULAR - nuevo Reglamento LSEM - delegación de firma para servicios consulares, incluyendo actos de registro civil y notariales.",
    description: "",
    link: "docs/civil/circulares/DSC07616.pdf",
  },
  {
    id: "c8",
    name: "DSC11768.- Programa para brindar a los mexicanos la posibilidad de imprimir su acta de nacimiento en línea.",
    description: "",
    link: "docs/civil/circulares/DSC11768.pdf",
  },
  {
    id: "c9",
    name: "DSC11769.- Programa para brindar a los mexicanos la posibilidad de imprimir su acta de nacimiento en línea.",
    description: "",
    link: "docs/civil/circulares/DSC11769.pdf",
  },
  {
    id: "c10",
    name: "DSC12594.- Comprobación de supervivencia de pensionistas del Instituto de Seguridad Social para las Fuerzas Armadas Mexicanas.",
    description: "",
    link: "docs/civil/circulares/DSC12594.pdf",
  },
  {
    id: "c11",
    name: "DSC12676.- Impresión de actas de nacimiento por internet en papel bond en 11 nuevas entidades federativas.",
    description: "",
    link: "docs/civil/circulares/DSC12676.pdf",
  },
  {
    id: "c12",
    name: "DSC12808.- Se dan a conocer dos nuevas entidades federativas para la Impresión de actas de nacimiento por internet en papel bond.",
    description: "",
    link: "docs/civil/circulares/DSC12808.pdf",
  },
  {
    id: "c13",
    name: "DSC14293.- Circular.- Prorroga para la ampliación de equipaje personal y franquicia para mexicanos repatriados.",
    description: "",
    link: "docs/civil/circulares/DSC14293.pdf",
  },
  {
    id: "c14",
    name: "DSC14804.- Entidades federativas que entran al Programa de impresión de Actas de Nacimiento por Internet.",
    description: "",
    link: "docs/civil/circulares/DSC14804.pdf",
  },
  {
    id: "c15",
    name: "DSC15932.- Entidades federativas que entran al Programa de impresión de Actas de Nacimiento por Internet.",
    description: "",
    link: "docs/civil/circulares/DSC15932.pdf",
  },
  {
    id: "c16",
    name: "DSC17649.- Se comunica VURTE/ JUAN MANUEL SAHAGUN PELAYO",
    description: "",
    link: "docs/civil/circulares/DSC17649.pdf",
  },
  {
    id: "c17",
    name: "DSC13826.- Emiratos Árabes Unidos.- Acuerdo por el que se suprime el requisito de visa en pasaportes ordinarios a los nacionales de Emiratos Árabes Unidos.",
    description: "",
    link: "docs/civil/circulares/DSC13826.pdf",
  },
];
const formatos = [
  {
    id: "f1",
    name: "Guía rápida SIDEA",
    description: "",
    link: "docs/civil/Guia_rapida_sidea.pdf",
  },
  {
    id: "f2",
    name: "Manual SIAC Registro Civil",
    description: "",
    link: "docs/civil/ModuloRegistroCivil.pdf",
  },
  {
    id: "f3",
    name: "Programa Somos Mexicanos",
    description: "",
    link: "docs/civil/somosmexicanos.pdf",
  },
  {
    id: "f4",
    name: "Ley de Migración",
    description: "",
    link: "docs/civil/leydemigracion.pdf",
  },
  {
    id: "f5",
    name: "Reglamento de Migración",
    description: "",
    link: "docs/civil/reglamentodemigracion.pdf",
  },
  {
    id: "f6",
    name: "Lineamientos Generales para la expedición de visas",
    description: "",
    link: "docs/civil/DOF_lineamientos_generales.pdf",
  },
  {
    id: "f7",
    name: "Ley de Notariado CDMX",
    description: "",
    link: "docs/civil/leynotariadoCDMX.pdf",
  },
];
</script>
