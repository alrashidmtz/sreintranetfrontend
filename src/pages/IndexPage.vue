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
            icon="holiday_village"
            label="C. Móvil"
            size="md"
            to="/conmovil"
          />
        </div>
      </q-card>
    </div>
    <q-item-label header class="q-mt-lg"> Comunicados </q-item-label>
    <div class="row q-gutter-md">
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
          <q-item clickable v-ripple>
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
        <q-date v-model="date" landscape />
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
import { ref } from "vue";
import { useQuasar } from "quasar";

const $q = useQuasar();
const showDialog = ref(false);
const title = ref("");
const src = ref("");
const date = ref(Date.now("yyyy/MM/dd"));

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
  max-width: 150px

.suet
  background-color: #691B30

.logo_mexico
  background-color: #681B2F
</style>
