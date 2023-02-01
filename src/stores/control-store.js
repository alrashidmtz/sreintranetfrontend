import { defineStore } from 'pinia';
import { api } from "boot/axios";

export const useControlStore = defineStore('control', {
  state: () => ({
    foliosControl: [],
    rowsNumber: 0,
  }),
  getters: {
  },
  actions: {
    async getRowsNumber () {
      try {
        const query = await api.get("/control/rows");
        this.rowsNumber = query.data[0].RowsNumber;
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    },
    async fetchFoliosControl () {
      try {
        const query = await api.get("/control");
        this.foliosControl = query.data.data;
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    },
    async addFolio (data) {
      try {
        const response = await api.post("/control", data);
        data.id = response.data.insertId;
        this.foliosControl.push(data);
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    },
    async updFolio (id, data) {
      try {
        const response = await api.put(`/control/${id}`, data);
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
        const response = await api.delete(`/control/${id}`);
        data.id = response.id;
        this.foliosControl.push(data);
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    }
  },
});
