<template>
  <q-page view="hHh lpR fFf">
    <q-toolbar bordered>
      <q-toolbar-title> Documentación </q-toolbar-title>
    </q-toolbar>
    <q-card flat>
      <div class="row" style="min-height: 600px">
        <div class="col-3">
          <q-list>
            <q-expansion-item
              group="somegroup"
              icon="explore"
              label="Guia Consular"
              default-opened
              header-class="text-bold bg-grey-2"
            >
              <q-expansion-item
                group="guiaconsular"
                :content-inset-level="1"
                switch-toggle-side
                dense-toggle
                expand-separator
                v-for="libro in libros"
                :key="libro.id"
                :label="libro.name"
                :caption="libro.description"
              >
                <q-list>
                  <q-item
                    clickable
                    v-ripple
                    v-for="cap in libro.caps"
                    :key="cap.id"
                    @click="
                      src = cap.link;
                      title = libro.name;
                    "
                  >
                    <q-item-section>
                      <q-item-label overline>{{ cap.name }}</q-item-label>
                      <q-item-label caption>{{ cap.description }}</q-item-label>
                    </q-item-section>
                  </q-item>
                </q-list>
              </q-expansion-item>
            </q-expansion-item>
            <q-expansion-item
              group="somegroup"
              icon="library_books"
              label="Documentos"
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
    name: "DSC07249.- Normas para el Manejo y Control de las Formas Numeradas y/o Valoradas.",
    description: "",
    link: "docs/documentacion/circulares/DSC07249.pdf",
  },
];
const documentos = [
  {
    id: "d1",
    name: "Catálogo de observaciones",
    description: "",
    link: "docs/documentacion/documentos/Catálogo_de_Observaciones.pdf",
  },
  {
    id: "d2",
    name: "Medidas, Peso y Estatura",
    description: "",
    link: "docs/documentacion/documentos/Peso.pdf",
  },
  {
    id: "d3",
    name: "Guía de Impresión de Matrícula Consular",
    description: "",
    link: "docs/documentacion/documentos/GuiaMatricula.pdf",
  },
  {
    id: "d4",
    name: "Instructivo Normativo para la asignación de la CURP",
    description: "",
    link: "docs/documentacion/documentos/DOF-formación_curp.pdf",
  },
];
const libros = [
  {
    id: "libro1",
    name: "Libro 1",
    description: "Documentación a Mexicanos",
    caps: [
      {
        id: "l1c1",
        name: "Capítulo 1",
        description:
          "Expedición de pasaportes ordinarios en las oficinas consulares",
        link: "docs/guiaconsular/Libro1Capitulo1.pdf",
      },
      {
        id: "l1c1a2",
        name: "Capítulo 1 A2",
        description: "Procedimientos SIAC: Matrículas y Pasaportes 4.1",
        link: "docs/guiaconsular/Libro1Capitulo1anexo2.pdf",
      },
      {
        id: "l1c1A3",
        name: "Capítulo 1 A3",
        description:
          "Acta Administrativa Circunstanciada por extravío, robo o destrucción de pasaporte o certificado de matrícula consular (Julio, 2018)",
        link: "docs/guiaconsular/Libro1Capitulo1anexo3.pdf",
      },
      {
        id: "l1c2",
        name: "Capítulo 2",
        description:
          "Impresión de pasaportes G Prima a través del Centro de Emisión de Pasaportes para el Exterior (CEPE)",
        link: "docs/guiaconsular/Libro1Capitulo2.pdf",
      },
      {
        id: "l1c3",
        name: "Capítulo 3",
        description: "Compulsa de documentos",
        link: "docs/guiaconsular/Libro1Capitulo3.pdf",
      },
      {
        id: "l1c4",
        name: "Capítulo 4",
        description:
          "Inscripción de los mexicnaos y Certificado de Matrícula Consular",
        link: "docs/guiaconsular/Libro1Capitulo4.pdf",
      },
      {
        id: "l1c5",
        name: "Capítulo 5",
        description:
          "De las actas de nacimiento expedidas en una oficina consular",
        link: "docs/guiaconsular/Libro1Capitulo5.pdf",
      },
      {
        id: "l1c5B",
        name: "Capítulo 5B",
        description:
          "De las actas de nacimiento expedidas en las oficinas consulares para personas nacidas en territorio nacional",
        link: "docs/guiaconsular/Libro1Capitulo5Bis2018.pdf",
      },
      {
        id: "l1c6",
        name: "Capítulo 6",
        description:
          "De las actas de matrimonio expedidas en una oficina consular",
        link: "docs/guiaconsular/Libro1Capitulo6.pdf",
      },
      {
        id: "l1c7",
        name: "Capítulo 7",
        description:
          "De las actas de defunción expedidas en una oficina consular",
        link: "docs/guiaconsular/Libro1Capitulo7.pdf",
      },
      {
        id: "l1c8",
        name: "Capítulo 8",
        description: "De las cartillas del Servicio Militar Nacional",
        link: "docs/guiaconsular/Libro1Capitulo8.pdf",
      },
      {
        id: "l1c9",
        name: "Capítulo 9",
        description:
          "De la expedición de copias certificadas de actos del Registro Civil realizados en Territorio Nacional",
        link: "docs/guiaconsular/Libro1Capitulo9.pdf",
      },
      {
        id: "l1c9A1",
        name: "Capítulo 9 A1",
        description:
          "Formato de Solicitud de Copias Certificadas de Actas de Nacimiento expedida en la República Mexicana",
        link: "docs/guiaconsular/Libro1Capitulo9anexo1.pdf",
      },
      {
        id: "l1c10",
        name: "Capítulo 10",
        description: "De las solicitudes para tramitar credenciales de elector",
        link: "docs/guiaconsular/Libro1Capitulo102018.pdf",
      },
    ],
  },
  {
    id: "libro2",
    name: "Libro 2",
    description: "Certificados",
    caps: [
      {
        id: "l2c1",
        name: "Capítulo 1",
        description: "Certificado a lista de menaje de casa a mexicanos",
        link: "docs/guiaconsular/Libro2Cap1.pdf",
      },
      {
        id: "l2c2",
        name: "Capítulo 2",
        description: "Certificado a lista de menaje de casa a extranjeros",
        link: "docs/guiaconsular/Libro2Cap2.pdf",
      },
      {
        id: "l2c3",
        name: "Capítulo 3",
        description:
          "Certificado para acreditar la supervivencia física de los pensionistas del Gobierno Mexicano",
        link: "docs/guiaconsular/Libro2Cap3.pdf",
      },
      {
        id: "l2c3A1",
        name: "Capítulo 3 A1",
        description:
          "Manual para el uso del Sistema de Revista de Supervivencia",
        link: "docs/guiaconsular/Libro2Cap3Anexo1.pdf",
      },
      {
        id: "l2c3A2",
        name: "Capítulo 3 A2",
        description:
          "Guía para el enrolamiento de militares retirados y pensionados",
        link: "docs/guiaconsular/Libro2Cap3Anexo2.pdf",
      },
      {
        id: "l2c3A3",
        name: "Capítulo 3 A3",
        description: "Guía para el pase de revista de supervivencia",
        link: "docs/guiaconsular/Libro2Cap3Anexo3.pdf",
      },
      {
        id: "l2c3A4",
        name: "Capítulo 3 A4",
        description: "Protocolo de Operación",
        link: "docs/guiaconsular/Libro2Cap3Anexo4.pdf",
      },
      {
        id: "l2c3A5",
        name: "Capítulo 3 A5",
        description: "Formato de transferencia",
        link: "docs/guiaconsular/Libro2Cap3Anexo5.pdf",
      },
      {
        id: "l2c4",
        name: "Capítulo 4",
        description:
          "Certificado para la importación de estupefacientes, sustancias psicotrópicas y sustancias precursoras",
        link: "docs/guiaconsular/Libro2Cap4.pdf",
      },
      {
        id: "l2c4A1",
        name: "Capítulo 4 A1",
        description: "Ejemplos del formato físico y digital",
        link: "docs/guiaconsular/Libro2Cap5.pdf",
      },
      {
        id: "l2c5",
        name: "Capítulo 5",
        description: "Certificado a petición de parte",
        link: "docs/guiaconsular/Libro2Cap5.pdf",
      },
      {
        id: "l2c6",
        name: "Capítulo 6",
        description: "Certificado para estampar visa en pasaportes extrajeros",
        link: "docs/guiaconsular/Libro2Cap6.pdf",
      },
      {
        id: "l2c7",
        name: "Capítulo 7",
        description: "Certificado de Presunción de Nacionalidad",
        link: "docs/guiaconsular/Libro2Cap7.pdf",
      },
      {
        id: "l2c8",
        name: "Capítulo 8",
        description: "Certificado de constitución de sociedades extranjeras",
        link: "docs/guiaconsular/Libro2Cap8.pdf",
      },
      {
        id: "l2c9",
        name: "Capítulo 9",
        description: "Certificado de Leyes Mexicanas",
        link: "docs/guiaconsular/Libro2Cap9.pdf",
      },
      {
        id: "l2c10",
        name: "Capítulo 10",
        description:
          "Certificado a lista de menaje de casa para miembros del Servicio Exterior Mexicano (SEM)",
        link: "docs/guiaconsular/Libro2Cap10.pdf",
      },
      {
        id: "l2c11",
        name: "Capítulo 11",
        description: "Certificado a Cotejo de Documentos",
        link: "docs/guiaconsular/Libro2Cap11.pdf",
      },
      {
        id: "l2c12",
        name: "Capítulo 12",
        description:
          "Facilidades en materia de equipaje personal, franquicia y herramientas de trabajo a mexicanos repatriados desde Estados Unidos de América, y Autorización para la importación de menaje de casa que se encuentre en el extranjero de personas fallecidas",
        link: "docs/guiaconsular/Libro2Cap12.pdf",
      },
      {
        id: "l2c12A1",
        name: "Capítulo 12 A1",
        description: "Resolutivo de la Regla General de Comercio Exterior",
        link: "docs/guiaconsular/Libro2Cap12Anexo1.pdf",
      },
      {
        id: "l2c12A2",
        name: "Capítulo 12 A2",
        description: "Oficio de canalización",
        link: "docs/guiaconsular/Libro2Cap12Anexo2.docx.pdf",
      },
      {
        id: "l2c12A3",
        name: "Capítulo 12 A3",
        description: "Inventario de mercancias",
        link: "docs/guiaconsular/Libro2Cap12Anexo3.docx.pdf",
      },
      {
        id: "l2c12A4",
        name: "Capítulo 12 A4",
        description: "Carta compromiso",
        link: "docs/guiaconsular/Libro2Cap12Anexo4.docx.pdf",
      },
    ],
  },
  {
    id: "libro3",
    name: "Libro 3",
    description: "Visado a Documentos",
    caps: [
      {
        id: "l3c1",
        name: "Capítulo 1",
        description: "Visado a Certificado de Análisis",
        link: "docs/guiaconsular/Libro3Cap1.pdf",
      },
      {
        id: "l3c2",
        name: "Capítulo 2",
        description:
          "Visado a Certificado de Tránsito de Restos y a Certificado de Embalsamamiento",
        link: "docs/guiaconsular/Libro3Cap2.pdf",
      },
      {
        id: "l3c3",
        name: "Capítulo 3",
        description: "Visado a Certificado de libre venta",
        link: "docs/guiaconsular/Libro3Cap3.pdf",
      },
      {
        id: "l3c4",
        name: "Capítulo 4",
        description: "Visado a Certificado Médico",
        link: "docs/guiaconsular/Libro3Cap4.pdf",
      },
      {
        id: "l3c5",
        name: "Capítulo 5",
        description: "Visado a Certificado de Origen",
        link: "docs/guiaconsular/Libro3Cap5.pdf",
      },
    ],
  },
  {
    id: "libro4",
    name: "Libro 4",
    description: "Legalización y Apostilla de firmas y/o sellos",
    caps: [
      {
        id: "l4c1",
        name: "Capítulo 1",
        description:
          "Legalización de Firmas y/o Sellos de documentos públicos extranjeros",
        link: "docs/guiaconsular/Libro4Cap1.pdf",
      },
      {
        id: "l4c2",
        name: "Capítulo 2",
        description: "Apostilla de documentos",
        link: "docs/guiaconsular/Libro4Cap2.pdf",
      },
    ],
  },
  {
    id: "libro5",
    name: "Libro 5",
    description: "Marina Mercante",
    caps: [
      {
        id: "l5c1",
        name: "Capítulo Único",
        description: "Marina Mercante",
        link: "docs/guiaconsular/Libro5unico.pdf",
      },
      {
        id: "l5c1A1",
        name: "Capítulo único A1",
        description: "Anexo 1 Formato para Acta de Abanderamiento",
        link: "docs/guiaconsular/Libro5Anexo1.pdf",
      },
      {
        id: "l5c1A2",
        name: "Capítulo único A2",
        description: "Anexo 2 Formato para Dimisión de Bandera",
        link: "docs/guiaconsular/Libro5Anexo2.pdf",
      },
    ],
  },
  {
    id: "libro6",
    name: "Libro 6",
    description: "Funciones Notariales y otras Certificaciones",
    caps: [
      {
        id: "l6c1",
        name: "Capítulo único",
        description: "Actos Notariales expedidos en una Oficina Consular",
        link: "docs/guiaconsular/Libro6Cap1.pdf",
      },
    ],
  },
  {
    id: "libro7",
    name: "Libro 7",
    description: "Nacionalidad",
    caps: [
      {
        id: "l7n1",
        name: "Notice 1",
        description:
          "Circular ASJ 34385 en Materia de Nacionalidad (17-Oct-16)",
        link: "docs/guiaconsular/Libro7notice1.pdf",
      },
      {
        id: "l7n2",
        name: "Notice 2",
        description:
          "Circular ASJ 34353 - Recuperación de Nacionalidad Mexicana por Nacimiento (vigente a partir de 17-0ct-16)",
        link: "docs/guiaconsular/Libro7oficio1.pdf",
      },
      {
        id: "l7o1",
        name: "Oficio 1",
        description:
          "Circular ASJ 34354 - Constancia de Renuncia a la Nacionalidad Mexicana en materia de Nacionalidad (vigente a partir de 17-Oct-16)",
        link: "docs/guiaconsular/Libro7oficio2.pdf",
      },
      {
        id: "l7o2",
        name: "Oficio 2",
        description:
          "Circular ASJ 34354 - Formato de Escrito de Renuncia a la Nacionalidad Mexicana (vigente a partir de 17-Oct-16)",
        link: "docs/guiaconsular/Libro7oficio2anexo1.pdf",
      },
    ],
  },
];

const formatos = [
  {
    id: "f1",
    name: "Actas administrativas Circunstanciadas",
    description: "",
    link: "docs/formatos/actaadministrativa.pdf",
  },
  {
    id: "f2",
    name: "Constancia de Identidad",
    description: "",
    link: "docs/formatos/Constancia_de_identidad_2019.pdf",
  },
  {
    id: "f3",
    name: "Quitar apellido de casada",
    description: "",
    link: "docs/formatos/apellidocasada.pdf",
  },
  {
    id: "f4",
    name: "OP-5",
    description: "",
    link: "docs/formatos/OP5_VERSION_2018.pdf",
  },
  {
    id: "f5",
    name: "OP-7/I",
    description: "",
    link: "docs/formatos/OP7I_VERSION_2018.pdf",
  },
  {
    id: "f6",
    name: "OP-7/II",
    description: "",
    link: "docs/formatos/OP7II_VERSION_2018.pdf",
  },
  {
    id: "f7",
    name: "OP-8/A",
    description: "",
    link: "docs/formatos/OP8A_VERSION_2018.pdf",
  },
  {
    id: "f8",
    name: "OP-8/B",
    description: "",
    link: "docs/formatos/OP8B_VERSION_2018.pdf",
  },
  {
    id: "f9",
    name: "Solicitud de visa",
    description: "",
    link: "docs/formatos/Solicitud_de_visa_Español_CNTSE_2018.pdf",
  },
  {
    id: "f10",
    name: "Declaratoria de nacionalidad",
    description: "",
    link: "docs/formatos/SolicitudDNMN.pdf",
  },
  {
    id: "f11",
    name: "Solicitud de copias certificadas de documentos de nacionalidad",
    description: "",
    link: "docs/formatos/DNN-4.pdf",
  },
];
</script>
