import { defineStore } from 'pinia';
import { api } from "boot/axios";

export const useCadidoStore = defineStore('cadido', {
  state: () => ({
    cadidos: [],
  }),
  getters: {
  },
  actions: {
    async fetchCadido () {
      try {
        const query = await api.get("/cadido");
        this.cadidos = query.data.data;
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    },
    async addFolio (data) {
      try {
        const response = await api.post("/cadido", data);
        data.id = response.data.insertId;
        this.cadidos.push(data);
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    },
    async updFolio (id, data) {
      try {
        const response = await api.put(`/cadido/${id}`, data);
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
        const response = await api.delete(`/cadido/${id}`);
        data.id = response.id;
        this.cadidos.push(data);
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    }
  },
});
