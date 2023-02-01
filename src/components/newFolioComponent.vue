<template>
  <q-card style="width: 800px">
    <q-card-section class="row items-center q-pb-none">
      <div class="text-h6">{{ title }} Folio</div>
      <q-space />
      <q-btn icon="close" flat round v-close-popup />
    </q-card-section>
    <q-separator></q-separator>
    <q-card-section>
      <q-form @submit="onSubmit" class="q-gutter-md">
        <div class="row">
          <div class="col">
            <label for="folio.fecha">Fecha</label>
            <q-input
              id="folio.fecha"
              outlined
              dense
              type="date"
              v-model="form.fecha"
            >
            </q-input>
          </div>
          <div class="col q-ml-sm">
            <label for="form.tipo">Tipo documento</label>
            <q-select
              id="form.tipo"
              outlined
              dense
              v-model="form.tipo"
              :options="optionTipo"
            />
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="form.asunto">Asunto</label>
            <q-input
              id="form.asunto"
              outlined
              dense
              type="textarea"
              v-model="form.asunto"
              autofocus
            >
            </q-input>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="form.sicar">Clasificación archivística</label>
            <q-select
              id="form.sicar"
              outlined
              dense
              v-model="form.sicar"
              :options="clasification"
            />
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="form.referencia">Referencia</label>
            <q-input
              id="form.referencia"
              outlined
              dense
              v-model="form.referencia"
              placeholder="Si no tiene referencia dejar vacío"
            >
            </q-input>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="form.sem">Elaboró SEM</label>
            <q-select
              id="form.sem"
              outlined
              dense
              v-model="form.sem"
              :options="elaboroSEM"
            />
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="form.local">Elaboró PSPI</label>
            <q-select
              id="form.local"
              outlined
              dense
              v-model="form.local"
              :options="elaboroLocal"
            />
          </div>
        </div>
      </q-form>
    </q-card-section>
    <q-separator />
    <q-card-actions align="right">
      <q-btn
        label="Guardar"
        type="submit"
        color="primary"
        @click="onSubmit"
        v-close-popup
      />
    </q-card-actions>
  </q-card>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useQuasar } from "quasar";
import { useMinutarioStore } from "src/stores/minutario-store";

const $q = useQuasar();
const storeMinutario = useMinutarioStore();
let form = ref({
  id: "",
  asunto: "",
  fecha: new Date().toISOString().slice(0, 10),
  referencia: "",
  documento: "",
  sicar: "",
  sem: "",
  local: "",
});

const optionTipo = [
  "CARTA",
  "CORREO ELECTRÓNICO",
  "CORREOGRAMA VALIJA",
  "FAX",
  "NOTA",
  "OFICIO",
  "VALIJA DIPLOMÁTICA",
  "OTRO",
];

const clasification = ["1. aaa", "2. bbb"];

const elaboroSEM = ["RAÚL GARCÍA ZENTLAPAL", "SEBASTIAN ", "VALERIA"];

const elaboroLocal = [
  "AL RASHID MARTÍNEZ ARRIOLA",
  "KARLA GISELLE RIOS CALDERÓN",
  "PABLO VEGA CRUZ",
  "YAMILEX LÓPEZ",
];

const props = defineProps({
  title: {
    type: String,
    default: "",
  },
  folio: {
    type: Object,
    requiered: true,
  },
});

onMounted(() => {
  form.value = props.folio;
  console.log(form);
});

async function onSubmit() {
  try {
    let result = null;
    console.log(form.value);
    if (props.title === "Agregar") {
      result = await storeMinutario.addFolio(form.value);
    } else {
      result = await storeMinutario.updFolio(form.value);
    }
    if (result) {
      $q.notify({
        color: "positive",
        message:
          props.title === "Agregar"
            ? "folio agregado correctamente"
            : "folio modificado correctamente",
      });
    }
  } catch (error) {
    $q.notify({
      color: "negative",
      message: error.message,
    });
    console.log(error);
  }
}
</script>
