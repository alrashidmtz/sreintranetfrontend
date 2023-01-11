<template>
  <q-card
    class="no-scroll"
    style="min-width: 80vw; min-height: 80vh; width: 100%; height: 100%"
  >
    <q-bar>
      <h7 class="text-brand-text">{{ title }}</h7>
      <q-space></q-space>
      <q-btn color="white" flat icon="close"></q-btn>
    </q-bar>

    <div class="fit">
      <q-pdfviewer type="html5" :src="src" />
    </div>
  </q-card>
</template>

<script setup>
const props = defineProps([
  { title: String },
  {
    src: String,
  },
]);
</script>
