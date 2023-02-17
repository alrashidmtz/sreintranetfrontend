import { defineStore } from 'pinia';
import { api } from "boot/axios";

export const useGestionStore = defineStore('gestion', {
  state: () => ({
    foliosGestion: [],
    rowsNumber: 0,
  }),
  getters: {
  },
  actions: {
    async getRowsNumber () {
      try {
        const query = await api.get("/Gestion/rows");
        this.rowsNumber = query.data[0].RowsNumber;
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    },
    async fetch () {
      try {
        const query = await api.get("/Gestion");
        this.foliosGestion = query.data.data;
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    },
    async addFolio (data) {
      try {
        const response = await api.post("/Gestion", data);
        data.id = response.data.insertId;
        this.foliosGestion.push(data);
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    },
    async updFolio (id, data) {
      try {
        const response = await api.put(`/Gestion/${id}`, data);
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
        const response = await api.delete(`/Gestion/${id}`);
        data.id = response.id;
        this.foliosGestion.push(data);
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    }
  },
});
