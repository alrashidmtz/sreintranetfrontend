import { defineStore } from 'pinia';
import { api } from "boot/axios";

export const useEmpleadosStore = defineStore('empleado', {
  state: () => ({
    empleados: [],
  }),
  getters: {
  },
  actions: {
    async fetchEmpleados () {
      try {
        const query = await api.get("/empleado");
        this.empleados = query.data.data;
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    },
    async addFolio (data) {
      try {
        const response = await api.post("/empleado", data);
        data.id = response.data.insertId;
        this.empleados.push(data);
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    },
    async updFolio (id, data) {
      try {
        const response = await api.put(`/empleado/${id}`, data);
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
        const response = await api.delete(`/empleado/${id}`);
        data.id = response.id;
        this.empleados.push(data);
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    }
  },
});
