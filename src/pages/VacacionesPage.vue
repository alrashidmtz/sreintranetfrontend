<template>
  <q-page>
    <DocumentEditor
      id="docEditor"
      height="600px"
      documentServerUrl="http://192.168.39.155"
      :config="config"
    />
  </q-page>
</template>

<script setup>
import { DocumentEditor } from "@onlyoffice/document-editor-vue";

const config = {
  document: {
    fileType: "docx",
    key: "secret",
    title: "SOLICITUD DE VISA ESPAÑOL",
    url: "http://192.168.39.228:3000/editor?fileName=new.docx",
    height: "100%",
    type: "desktop",
    width: "100%",
  },
  documentType: "word",
  editorConfig: {
    callbackUrl: "http://192.168.39.228:3000/track?fileName=new.docx",
  },
};
</script>
