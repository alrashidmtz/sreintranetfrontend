import { defineStore } from 'pinia';
import { api } from "boot/axios";

export const useSEMStore = defineStore('sem', {
  state: () => ({
    SEM: [],
  }),
  getters: {
  },
  actions: {
    async fetchSEM () {
      try {
        const query = await api.get("/sem");
        this.SEM = query.data.data;
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    },
    async addFolio (data) {
      try {
        const response = await api.post("/sem", data);
        data.id = response.data.insertId;
        this.SEM.push(data);
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    },
    async updFolio (id, data) {
      try {
        const response = await api.put(`/sem/${id}`, data);
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
        const response = await api.delete(`/sem/${id}`);
        data.id = response.id;
        this.SEM.push(data);
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    }
  },
});
