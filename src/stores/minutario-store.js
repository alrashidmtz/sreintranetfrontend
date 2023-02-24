import { defineStore } from 'pinia';
import { api } from "boot/axios";

export const useMinutarioStore = defineStore('minutario', {
  state: () => ({
    folios: [],
    rowsNumber: 0,
  }),
  getters: {
  },
  actions: {
    async getRowsNumber () {
      try {
        const query = await api.get("/minutario/rows");
        this.rowsNumber = query.data[0].RowsNumber;
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    },
    async fetchFolios (page,
      fetchCount,
      filter,
      sortBy,
      descending) {
      try {
        const query = `/minutario `;
        const result = await api.get(query);
        console.log(result.data);
        this.folios = result.data;
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    },
    async addFolio (data) {
      try {
        const response = await api.post("/minutario", data);
        data.id = response.data.insertId;
        console.log(data);
        this.folios.push(data);
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    },
    async updFolio (id, data) {
      try {
        const response = await api.put(`/minutario/${id}`, data);
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
        const response = await api.delete(`/minutario/${id}`);
        data.id = response.id;
        this.folios.push(data);
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    }
  },
});
