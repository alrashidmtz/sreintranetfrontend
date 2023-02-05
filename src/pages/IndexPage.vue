<template>
  <q-page padding>
    <p class="text-h4">Intranet del Consulado de México en Filadelfia</p>
    <q-item-label header> Aplicaciones </q-item-label>
    <div class="row q-gutter-md">
      <!-- <q-card class="card_app">
        <img src="images/suet_logo.png" alt="" class="suet q-pa-lg" />
      </q-card> -->
      <q-card class="card_app">
        <q-img src="images/fondofooter3.svg" class="q-pa-lg"> </q-img>
        <div class="text-h5 absolute-top text-center q-mt-lg text-white">
          <q-btn
            flat
            icon="post_add"
            label="Minutario"
            size="md"
            to="/minutario"
          />
        </div>
      </q-card>
      <q-card class="card_app">
        <q-img src="images/fondofooter3.svg" class="q-pa-lg"> </q-img>
        <div class="text-h5 absolute-top text-center q-mt-lg text-white">
          <q-btn
            flat
            icon="beach_access"
            label="Vacaciones"
            size="md"
            to="/vacaciones"
          />
        </div>
      </q-card>
      <!-- <q-card class="card_app">
        <q-img src="images/fondofooter3.svg" class="q-pa-lg"> </q-img>
        <div class="text-h5 absolute-top text-center q-mt-lg text-white">
          <q-btn
            flat
            icon="holiday_village"
            label="C. Móvil"
            size="md"
            to="/conmovil"
          />
        </div>
      </q-card> -->
    </div>
    <q-item-label header class="q-mt-lg"> Comunicados </q-item-label>
    <div class="row q-gutter-md">
      <q-card class="my-card">
        <div class="logo_mexico">
          <q-img src="images/banner/2023_Francisco_Villa.png"></q-img>
        </div>
        <q-list bordered separator>
          <q-item
            clickable
            v-ripple
            @click="
              showDialogFn(
                'Manual de identidad',
                'docs/index/GMX_MANUAL_DE_USOS_2023.pdf'
              )
            "
          >
            <q-item-section>Manual de uso</q-item-section>
          </q-item>
          <q-item
            clickable
            v-ripple
            @click="Download('docs/index/Membretada_Relex_2023.docx')"
          >
            <q-item-section>Membretada 2023 (word)</q-item-section>
            <q-item-section side>
              <q-avatar>
                <q-icon name="download"></q-icon>
              </q-avatar>
            </q-item-section>
          </q-item>
          <!-- <q-item
            clickable
            v-ripple
            @click="Download('docs/index/RELEX_PPT_plantilla_2023.pptx')"
          >
            <q-item-section>Plantilla presentación</q-item-section>
            <q-item-section side>
              <q-avatar>
                <q-icon name="download"></q-icon>
              </q-avatar>
            </q-item-section>
          </q-item> -->
        </q-list>
      </q-card>
      <q-card class="my-card">
        <div class="q-pa-sm">
          <q-img src="images/banner/cambiopassword.jpg"> </q-img>
        </div>
        <q-list bordered separator>
          <q-item
            clickable
            v-ripple
            @click="
              showDialogFn(
                'Comunicado seguridad',
                'docs/index/ComunicadoDGTI.pdf'
              )
            "
          >
            <q-item-section>Comunicado seguridad</q-item-section>
          </q-item>

          <q-item
            clickable
            v-ripple
            @click="
              showDialogFn(
                'Guia cambio contraseña',
                'docs/index/CambiarpasswordOWA.pdf'
              )
            "
          >
            <q-item-section>
              <q-item-label>Guía cambio contraseña</q-item-label>
            </q-item-section>
          </q-item>
        </q-list>
      </q-card>
      <q-card class="my-card">
        <div class="q-pa-md">
          <q-img src="images/banner/espaciocorreoslide.jpg"></q-img>
        </div>
        <q-list bordered separator>
          <q-item
            clickable
            v-ripple
            @click="
              showDialogFn(
                'Boletín informativo',
                'docs/index/boletinInformativo.pdf'
              )
            "
          >
            <q-item-section>Boletin informativo</q-item-section>
          </q-item>

          <q-item
            clickable
            v-ripple
            @click="
              showDialogFn(
                'Manual de Outlook',
                'docs/index/Manual-de-Outlook.pdf'
              )
            "
          >
            <q-item-section>
              <q-item-label>Manual de Outlook</q-item-label>
            </q-item-section>
          </q-item>
        </q-list>
        <q-card-actions>
          <q-space></q-space>
          <q-btn
            flat
            tag="a"
            color="primary"
            label="Ir a Outlook"
            target="_blank"
            href="https://outlook.office365.com/mail/"
          >
          </q-btn>
        </q-card-actions>
      </q-card>
      <q-card class="my-card">
        <div class="q-pa-lg logo_mexico">
          <q-img src="images/logoheadergobmex.svg"></q-img>
        </div>
        <q-list bordered separator>
          <q-item
            clickable
            v-ripple
            @click="
              showDialogFn('Manual de identidad', 'docs/index/GOB_Manual_.pdf')
            "
          >
            <q-item-section>Manual de identidad</q-item-section>
          </q-item>
          <q-item
            clickable
            v-ripple
            @click="Download('docs/index/SRE_membretada_modelo_esp.docx')"
          >
            <q-item-section>SRE memb. ESP (word)</q-item-section>
            <q-item-section side>
              <q-avatar>
                <q-icon name="download"></q-icon>
              </q-avatar>
            </q-item-section>
          </q-item>
          <q-item
            clickable
            v-ripple
            @click="Download('docs/index/SRE_membretada_modelo_ing.docx')"
          >
            <q-item-section>SRE memb. ING (word)</q-item-section>
            <q-item-section side>
              <q-avatar>
                <q-icon name="download"></q-icon>
              </q-avatar>
            </q-item-section>
          </q-item>
        </q-list>
      </q-card>
    </div>
    <div class="row q-gutter-md">
      <q-item-label header class="q-mt-lg"> Calendario </q-item-label>
    </div>
    <div class="row">
      <div class="col-3">
        <q-date landscape color="primary" v-model="date" :events="events" />
      </div>
      <div class="col"></div>
    </div>
    <q-dialog v-model="showDialog" :maximized="$q.screen.lt.md">
      <q-card
        class="no-scroll"
        style="min-width: 80vw; min-height: 80vh; width: 100%; height: 100%"
      >
        <q-bar>
          <h6 class="text-brand-text">{{ title }}</h6>
          <q-space></q-space>
          <q-btn
            color="white"
            flat
            icon="close"
            @click="showDialog = false"
          ></q-btn>
        </q-bar>

        <div class="fit">
          <q-pdfviewer type="html5" :src="src" />
        </div>
      </q-card>
    </q-dialog>
    <iframe id="my_iframe" style="display: none"></iframe>
  </q-page>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useQuasar } from "quasar";
import {
  QCalendarMonth,
  addToDate,
  parseDate,
  parseTimestamp,
  today,
} from "@quasar/quasar-ui-qcalendar/src/index.js";
import "@quasar/quasar-ui-qcalendar/src/QCalendarVariables.sass";
import "@quasar/quasar-ui-qcalendar/src/QCalendarTransitions.sass";
import "@quasar/quasar-ui-qcalendar/src/QCalendarMonth.sass";

const $q = useQuasar();
const showDialog = ref(false);
const title = ref("");
const src = ref("");
const date = ref("");

const CURRENT_DAY = new Date();
function getCurrentDay(day) {
  const newDay = new Date(CURRENT_DAY);
  newDay.setDate(day);
  const tm = parseDate(newDay);
  return tm.date;
}

const selectedDate = today();
const events = [
  {
    id: 1,
    title: "1st of the Month",
    details: "Everything is funny as long as it is happening to someone else",
    date: getCurrentDay(1),
    bgcolor: "orange",
  },
  {
    id: 2,
    title: "Sisters Birthday",
    details: "Buy a nice present",
    date: getCurrentDay(4),
    bgcolor: "green",
    icon: "fas fa-birthday-cake",
  },
  {
    id: 3,
    title: "Meeting",
    details: "Time to pitch my idea to the company",
    date: getCurrentDay(10),
    time: "10:00",
    duration: 120,
    bgcolor: "red",
    icon: "fas fa-handshake",
  },
  {
    id: 4,
    title: "Lunch",
    details: "Company is paying!",
    date: getCurrentDay(10),
    time: "11:30",
    duration: 90,
    bgcolor: "teal",
    icon: "fas fa-hamburger",
  },
  {
    id: 5,
    title: "Visit mom",
    details: "Always a nice chat with mom",
    date: getCurrentDay(20),
    time: "17:00",
    duration: 90,
    bgcolor: "grey",
    icon: "fas fa-car",
  },
  {
    id: 6,
    title: "Conference",
    details: "Teaching Javascript 101",
    date: getCurrentDay(22),
    time: "08:00",
    duration: 540,
    bgcolor: "blue",
    icon: "fas fa-chalkboard-teacher",
  },
  {
    id: 7,
    title: "Girlfriend",
    details: "Meet GF for dinner at Swanky Restaurant",
    date: getCurrentDay(22),
    time: "19:00",
    duration: 180,
    bgcolor: "teal",
    icon: "fas fa-utensils",
  },
  {
    id: 8,
    title: "Rowing",
    details: "Stay in shape!",
    date: getCurrentDay(27),
    bgcolor: "purple",
    icon: "rowing",
    days: 2,
  },
  {
    id: 9,
    title: "Fishing",
    details: "Time for some weekend R&R",
    date: getCurrentDay(27),
    bgcolor: "purple",
    icon: "fas fa-fish",
    days: 2,
  },
  {
    id: 10,
    title: "Vacation",
    details:
      "Trails and hikes, going camping! Don't forget to bring bear spray!",
    date: getCurrentDay(29),
    bgcolor: "purple",
    icon: "fas fa-plane",
    days: 5,
  },
];

function badgeClasses(event, type) {
  return {
    [`text-white bg-${event.bgcolor}`]: true,
    "rounded-border": true,
  };
}

function badgeStyles(day, event) {
  const s = {};
  // s.left = day.weekday === 0 ? 0 : (day.weekday * this.parsedCellWidth) + '%'
  // s.top = 0
  // s.bottom = 0
  // s.width = (event.days * this.parsedCellWidth) + '%'
  return s;
}

onMounted(async () => {
  date.value = CURRENT_DAY.toISOString().substring(0, 10).replace(/-/g, "/");
  events.value = [
    "2023/01/14",
    "2023/01/28",
    "2023/01/29",
    "2023/02/11",
    "2023/02/12",
    "2023/02/25",
    "2023/03/11",
    "2023/03/12",
    "2023/03/25",
    "2023/04/15",
    "2023/04/16",
    "2023/04/29",
    "2023/01/14",
    "2023/01/14",
    "2023/01/14",
    "2023/01/14",
  ];
});

const showDialogFn = (xtitle, xsrc) => {
  title.value = xtitle;
  src.value = xsrc;
  showDialog.value = true;
};

function Download(url) {
  document.getElementById("my_iframe").src = url;
}
</script>

<style lang="sass" scoped>
.my-card
  width: 100%
  max-width: 250px
.card_app
  width: 100%
  max-width: 200px

.suet
  background-color: #691B30

.logo_mexico
  background-color: #681B2F
</style>
