import { defineStore } from 'pinia';
import { api } from "boot/axios";

export const useUsuariosStore = defineStore('usuarios', {
  state: () => ({
    usuarios: [],
    rowsNumber: 0,
    currentUser: {},
  }),
  getters: {
  },
  actions: {
    async login (data) {
      try {
        const query = await api.get("/usuarios/login");
        if (query.token) {
          this.currentUser = query.token;
        }
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    },

    async logout () {
      this.currentUser = {};
    },

    async getRowsNumber () {
      try {
        const query = await api.get("/usuarios/rows");
        this.rowsNumber = query.data[0].RowsNumber;
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    },

    async fetchUsuarios (startRow,
      fetchCount,
      filter,
      sortBy,
      descending) {
      try {

        const query = `/usuarios?filter=${filter}&sortby=${sortBy}&descending=${descending}&fetchcount=${fetchCount}&startrow=${startRow}`
        const result = await api.get(query);
        this.usuarios = result.data.data;
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    },
    async addUsuario (data) {
      try {
        const response = await api.post("/usuarios", data);
        data.id = response.data.insertId;
        this.usuarios.push(data);
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    },
    async updUsuario (id, data) {
      try {
        const response = await api.put(`/usuarios/${id}`, data);
        if (response) {
          this.usuarios.push(data);
        }
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    },
    async delUsuario (id) {
      try {
        const response = await api.delete(`/usuarios/${id}`);
        data.id = response.id;
        this.usuarios.push(data);
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    }
  },
});
