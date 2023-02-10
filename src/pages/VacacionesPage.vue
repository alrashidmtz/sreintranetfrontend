<template>
  <q-page padding>
    <p class="text-h4">Vacaciones</p>
    <DocumentEditor
      id="docEditor"
      documentServerUrl="http://192.168.39.132"
      :config="config"
    />
  </q-page>
</template>

<script setup>
import { DocumentEditor } from "@onlyoffice/document-editor-vue";

const config = {
  document: {
    fileType: "docx",
    key: "2bd4d559d0",
    title: "Example Document Title.docx",
    url: "http://192.168.39.31/intranet/images/general/SRE_membretada_modelo_esp.docx",
  },
  documentType: "word",
  editorConfig: {
    callbackUrl: "http://192.168.39.132",
  },
};
</script>
