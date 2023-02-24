import { defineStore } from 'pinia';
import { api } from "boot/axios";

export const useRemitenteStore = defineStore('remitente', {
  state: () => ({
    remitentes: [],
  }),
  getters: {
  },
  actions: {
    async fetch () {
      try {
        const query = await api.get("/remitente");
        this.remitentes = query.data;
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    },
    async addRemitente (data) {
      try {
        const response = await api.post("/remitente", data);
        data.id = response.data.insertId;
        this.remitentes.push(data);
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    },
    async updRemitente (id, data) {
      try {
        const response = await api.put(`/remitente/${id}`, data);
        if (response) {
          this.remitentes.push(data);
        }
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    },
    async delRemitente (id) {
      try {
        const response = await api.delete(`/remitente/${id}`);
        data.id = response.id;
        this.remitentes.push(data);
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    }
  },
});
