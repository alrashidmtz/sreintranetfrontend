import { defineStore } from 'pinia';
import { api } from "boot/axios";

export const useCalendarioStore = defineStore('calendario', {
  state: () => ({
    calendario: [],
  }),
  getters: {
  },
  actions: {
    async fetch () {
      try {
        const query = await api.get("/calendario");
        this.calendario = query.data;
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    },
    async addFolio (data) {
      try {
        const response = await api.post("/calendario", data);
        data.id = response.data.insertId;
        this.calendario.push(data);
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    },
    async updFolio (id, data) {
      try {
        const response = await api.put(`/calendario/${id}`, data);
        if (response) {
          this.folios.push(data);
        }
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    },
    async delFolio (id) {
      try {
        const response = await api.delete(`/calendario/${id}`);
        data.id = response.id;
        this.calendario.push(data);
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    }
  },
});
