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
    async fetchFolios (startRow,
      fetchCount,
      filter,
      sortBy,
      descending) {
      try {

        const query = `/minutario?filter=${filter}&sortby=${sortBy}&descending=${descending}&fetchcount=${fetchCount}&startrow=${startRow}`
        const result = await api.get(query);
        this.folios = result.data.data;
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    },
    async addFolio (data) {
      try {
        const response = await api.post("/minutario", data);
        data.id = response.data.insertId;
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
