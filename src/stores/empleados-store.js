import { defineStore } from 'pinia';
import { api } from "boot/axios";

export const useEmpleadosStore = defineStore('empleado', {
  state: () => ({
    empleados: [],
  }),
  getters: {
  },
  actions: {
    async fetch () {
      try {
        const query = await api.get("/empleados");
        this.empleados = query.data;
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    },
    async add (data) {
      console.log(data);
      try {
        const response = await api.post("/empleados", data);
        data.id = response.data.insertId;
        this.empleados.push(data);
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    },
    async upd (id, data) {
      try {
        const response = await api.put(`/empleados/${id}`, data);
        if (response) {
          this.folios.push(data);
        }
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    },
    async del (id) {
      try {
        const response = await api.delete(`/empleados/${id}`);
        data.id = response.id;
        this.empleados.push(data);
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    }
  },
});
