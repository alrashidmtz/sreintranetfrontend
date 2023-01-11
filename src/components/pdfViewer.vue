<template>
  <q-card
    class="no-scroll"
    style="min-width: 80vw; min-height: 80vh; width: 100%; height: 100%"
  >
    <div class="fit">
      <q-pdfviewer type="html5" :src="src" />
    </div>
  </q-card>
</template>

<script setup>
const props = defineProps([
  {
    src: String,
  },
]);
</script>
