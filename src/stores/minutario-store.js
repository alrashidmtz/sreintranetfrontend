import { defineStore } from 'pinia';
import axios from "axios";

export const useMinutarioStore = defineStore('minutario', {
  state: () => ({
    folios: 0,
  }),
  getters: {
  },
  actions: {
    async fetchFolios () {
      try {
        const query = await axios.get("https://localhost:3000/minutario");
        this.folios = query.data;
      } catch (err) {
        console.log(err.message);
        throw new Error(err.message);
      }
    },
    addFolio () {
    },
    updFolio () {
    },
    delFolio () {
    }
  },
});
